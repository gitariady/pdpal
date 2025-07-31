<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = [
        'pdpal_id',
        'pdam_id',
        'nama',
        'ktp',
        'bangunan',
        'kecamatan',
        'kelurahan',
        'alamat',
        'waktu',
        'status',
        'keterangan',
    ];
    public function customerServis()
    {
        return $this->hasMany(CustomerServis::class);
    }

}
