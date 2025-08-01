<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $fillable = [
        'nama',
        'kegunaan'
    ];
    public function prosesPetugas()
    {
        return $this->hasMany(ProsesPetugas::class);
    }
}
