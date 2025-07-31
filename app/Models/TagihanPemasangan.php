<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanPemasangan extends Model
{
    use HasFactory;
    protected $table = 'tagihan_pemasangan';
    protected $fillable = [
        'proses_petugas_id',
        'bukti_tagihan',
        'bukti_bayar',
        'metode',
        'total',
        'keterangan',

    ];
    public function prosesPetugas()
    {
        return $this->belongsTo(ProsesPetugas::class, 'proses_petugas_id');
    }
    public function customerServis()
    {
        return $this->morphMany(CustomerServis::class, 'servisable');
    }
}
