<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengingatPerbaikanBulanan extends Mailable
{
    use Queueable, SerializesModels;

    public $petugas;

    public function __construct($petugas)
    {
        $this->petugas = $petugas;
    }

    public function build()
    {
        return $this->subject('Pengingat Perbaikan Bulanan')
                    ->view('emails.pengingat');
    }
}
