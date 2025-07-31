<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EdukasiSosial extends Model
{
    use HasFactory;
    protected $table = 'edukasi_sosial';
    protected $fillable = [
        'petugas_id',
        'nama_kegiatan',
        'tempat',
        'materi',
        'point',
        'orang',
        'tanggapan',
        'absensi',
        'bukti_kegiatan',
        'keterangan',
    ];
    public function petugasPelayanan()
    {
        return $this->belongsTo(PetugasPelayanan::class,'petugas_id');
    }
}
