<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KinerjaPetugas extends Model
{
    use HasFactory;
    protected $table = 'kinerja_petugas';
    protected $fillable = [
        'petugas_id',
        'laporan_id',
        'kegiatan_kerja',
        'ketepatan_waktu',
        'kepuasan_masyarakat',
        'sikap_kerja',
        'nilai_total'
    ];
    public function petugasPelayanan()
    {
        return $this->belongsTo(PetugasPelayanan::class, 'petugas_id');
    }
    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }
    public function getNilaiLabelAttribute()
    {
        $rata = ( $this->ketepatan_waktu + $this->kepuasan_masyarakat + $this->sikap_kerja) / 4;

        if ($rata >= 4.5) return 'Sangat Baik';
        if ($rata >= 3.5) return 'Baik';
        if ($rata >= 2.5) return 'Cukup';
        if ($rata >= 1.5) return 'Buruk';
        return 'Sangat Buruk';
    }


    public function getKetepatanWaktuLabelAttribute()
    {
        return $this->getLabelByScore($this->ketepatan_waktu);
    }

    public function getKepuasanMasyarakatLabelAttribute()
    {
        return $this->getLabelByScore($this->kepuasan_masyarakat);
    }

    public function getSikapKerjaLabelAttribute()
    {
        return $this->getLabelByScore($this->sikap_kerja);
    }

    private function getLabelByScore($score)
    {
        if ($score == 5) return 'Sangat Baik';
        if ($score == 4) return 'Baik';
        if ($score == 3) return 'Cukup';
        if ($score == 2) return 'Kurang';
        return 'Buruk';
    }

}
