<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerhentiBerlangganan extends Model
{
    use HasFactory;

    protected $table = 'berhenti_berlangganan';
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'petugas_id',
    //     'bukti_berhenti',
    //     'bukti_pdam',
    //     'ktp',
    //     'keterangan',
    // ];

    /**
     * Relasi ke model Petugas
     */
    public function petugasPelayanan()
    {
        return $this->belongsTo(PetugasPelayanan::class, 'petugas_id');
    }
    public function customerServis()
    {
        return $this->morphMany(CustomerServis::class, 'servisable');
    }
}
