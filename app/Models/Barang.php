<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';

    protected $fillable = ['nama_barang', 'merk', 'tipe', 'satuan'];

    // public function barangMasuk()
    // {
    //     return $this->hasMany(BarangMasukDetail::class);
    // }
}
