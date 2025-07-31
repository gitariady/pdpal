<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaanBarang extends Model
{
    protected $table = 'penerimaan_barang';

    protected $guarded = ['id'];
    public static function nomorPenerimaan(){
        //PBR-0001
        $max = self::max('id');
        $prefix = 'PBR-';
        $date = date('dmy');
        $nomor = $prefix . $date . str_pad($max + 1, 4, '0', STR_PAD_LEFT);
        return $nomor;
    }
    public function  items(){
        return $this->hasMany(ItemPenerimaanBarang::class, 'nomor_penerimaan', 'nomor_penerimaan');
    }
}
