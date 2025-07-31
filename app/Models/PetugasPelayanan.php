<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasPelayanan extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'petugas_pelayanan';
    protected $guarded = ['id'];
    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'bidang',
        'no_hp',
        'email',
        'alamat',
    ];
    public function kinerjaPetugas()
    {
        return $this->hasMany(KinerjaPetugas::class);
    }
    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class);
    }
    public function berhentiBerlangganan()
    {
        return $this->hasMany(BerhentiBerlangganan::class);
    }
    public function prosesPetugas()
    {
        return $this->hasMany(ProsesPetugas::class);
    }
    public function edukasiSosial()
    {
        return $this->hasMany(EdukasiSosial::class);
    }
}
