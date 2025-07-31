<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable =[
        'sku',
        'kategori_id',
        'name',
        'harga_jual',
        'harga_beli',
        'stok',
        'stok_min',
        'is_active',
    ];
    public static function nomorSku(){
        //sku-00001
        $prefix = 'SKU-';
        $maxid = self::max('id');
        return $prefix . str_pad($maxid + 1, 5, '0', STR_PAD_LEFT);
        return $sku;
    }
}
