<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesPetugas extends Model
{
    use HasFactory;
    protected $table = 'proses_petugas';
    protected $guarded = ['id'];
    protected $fillable = [
        'petugas_id',
        'laporan_id',
        'kendaraan_id',
        'nomor_pk',
        'awal',
        'akhir',
        'kendala',
        'solusi',
        'status_proses',
        'bukti',
        'keterangan',
    ];
    public static function nomorPk()
    {
        $prefix = 'PK-';
        $maxid = self::max('id') ?? 0;
        return $prefix . ($maxid + 1);
    }
    public function petugasPelayanan()
    {
        return $this->belongsTo(PetugasPelayanan::class, 'petugas_id');
    }
    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }
    public function hasilPetugas()
    {
        return $this->hasMany(HasilPetugas::class);
    }
    public function tagihanPenyedotan()
    {
        return $this->hasMany(TagihanPenyedotan::class);
    }
    public function tagihanPemasangan()
    {
        return $this->hasMany(TagihanPemasangan::class);
    }
    public function tagihanNoPelanggan()
    {
        return $this->hasMany(TagihanNoPelanggan::class);
    }
}
