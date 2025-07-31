<?php

namespace App\Exports;

use App\Models\ProsesPetugas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProsesPetugasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ProsesPetugas::select(
            'petugas_id',
            'laporan_id',
            'kendaraan_id',
            'awal',
            'akhir',
            'kendala',
            'solusi',
            'status_proses',
            'keterangan',
        )->get();
    }

    public function headings(): array
    {
        return [
            'Petugas ID',
            'Laporan ID',
            'Kendaraan ID',
            'Awal',
            'Akhir',
            'Kendala',
            'Solusi',
            'Status Proses',
            'Keterangan',
        ];
    }
}

