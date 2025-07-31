<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanNoPelanggan extends Model
{
    use HasFactory;

    protected $table = 'tagihan_no_pelanggan';
    protected $fillable = [
        'proses_petugas_id',
        'bukti_tagihan',
        'metode',
        'total',
        'keterangan',
    ];
    public function prosesPetugas()
    {
        return $this->belongsTo(ProsesPetugas::class, 'proses_petugas_id');
    }
}
