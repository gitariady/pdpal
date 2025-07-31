<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    use HasFactory;

    protected $table = 'bangunan';

    protected $fillable = [
        'nama_bangunan',
        'biaya',
    ];
    public function berhenti_berlangganan()
    {
        return $this->hasMany(BerhentiBerlangganan::class);
    }
}
