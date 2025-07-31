<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'jenis_laporan',
        'status_pelaporan',
        'nama',
        'no_hp',
        'alamat',
        'ktp',
        'keterangan',
    ];

    // public static function nomorLp()
    // {
    //     $prefix = 'LP-';
    //     $maxid = self::max('id') ?? 0;
    //     return $prefix . ($maxid + 1);
    // }
//     protected static function booted()
// {
//     static::creating(function ($laporan) {
//         if (empty($laporan->nomor_laporan)) {
//             $laporan->nomor_laporan = self::nomorLp();
//         }
//     });
// }
    public function kinerjaPetugas()
    {
        return $this->hasMany(KinerjaPetugas::class);
    }
    public function prosesPetugas()
    {
        return $this->hasMany(ProsesPetugas::class);
    }
}
