<?php

namespace App\Exports;

use App\Models\HasilPetugas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HasilPetugasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return HasilPetugas::select(
            'proses_petugas_id',
            'jenis_layanan',
            'foto_hasil',
            'tindak_lanjut',
            'masalah_ditemukan',
            'kesimpulan',
            'status_hasil',
        )->get();
    }

    public function headings(): array
    {
        return [
            'Proses Petugas ID',
            'Jenis Layanan',
            'Foto Hasil',
            'Tindak Lanjut',
            'Masalah Ditemukan',
            'Kesimpulan',
            'Status Hasil',
        ];
    }
}

