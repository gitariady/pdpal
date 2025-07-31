<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengeluaranBarang extends Model
{
    protected $table = 'pengeluaran_barang';
    protected $guarded = ['id'];

    public static function nomorPengeluaran()
    {
        $maxId = self::max('id');
        $prefix = 'TRX-';
        $nomor = $prefix . date('dym') . str_pad($maxId + 1, 4, '0', STR_PAD_LEFT);
        return $nomor;
    }
    public function items(){
        return $this->hasMany(ItemPengeluaranBarang::class, 'nomor_pengeluaran', 'nomor_pengeluaran' );
    }
}
