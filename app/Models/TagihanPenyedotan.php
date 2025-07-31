<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanPenyedotan extends Model
{
    use HasFactory;

    protected $table = 'tagihan_penyedotan';
    protected $fillable = [
        'proses_petugas_id',
        'bangunan_id',
        'bukti_tagihan',
        'bukti_bayar',
        'metode',
        'total',
        'keterangan',
    ];
    public function bangunan()
    {
        return $this->belongsTo(Bangunan::class, 'bangunan_id');
    }

    public function prosesPetugas()
    {
        return $this->belongsTo(ProsesPetugas::class, 'proses_petugas_id');
    }

}
