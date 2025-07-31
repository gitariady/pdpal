<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PetugasPelayanan;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengingatPerbaikanBulanan;

class KirimPengingatPerbaikan extends Command
{
    protected $signature = 'pengingat:perbaikan';// artisan pemanggilan
    protected $description = 'Kirim email pengingat perbaikan bulanan ke petugas';

    public function handle()
    {
        // Ambil data petugas, bisa filter sesuai kebutuhan
        $petugas = PetugasPelayanan::all();

        foreach ($petugas as $p) {
            if (!empty($p->email)) {
                Mail::to($p->email)->send(new PengingatPerbaikanBulanan($p));
            }
        }

        $this->info('Notifikasi perbaikan bulanan berhasil dikirim.');
    }
}
