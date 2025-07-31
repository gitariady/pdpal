<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPetugas extends Model
{
    use HasFactory;
    protected $table = 'hasil_petugas';
    protected $fillable = [
        'proses_petugas_id',
        'jenis_layanan',
        'foto_hasil',
        'tindak_lanjut',
        'masalah_ditemukan',
        'kesimpulan',
        'status_hasil',
    ];
    public function prosesPetugas()
    {
        return $this->belongsTo(ProsesPetugas::class);
    }

}
