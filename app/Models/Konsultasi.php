<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
    protected $fillable = [
        'petugas_id',
        'nama',
        'email',
        'no_hp',
        'bangunan',
        'luas_bangunan',
        'orang',
        'pertanyaan',
        'keterangan',
        'bukti_konsultasi',
        'ktp',
        'status',
    ];
    public function petugasPelayanan()
{
    return $this->belongsTo(PetugasPelayanan::class, 'petugas_id');
}


}
