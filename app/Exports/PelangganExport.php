<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PelangganExport implements FromCollection, WithHeadings, WithStyles, WithTitle, WithDrawings
{
    public function collection()
    {
        return Pelanggan::select('pdpal_id', 'pdam_id', 'nama', 'bangunan', 'kecamatan',
        'kelurahan', 'alamat', 'waktu', 'status', 'keterangan')->get();
    }

    public function headings(): array
    {
        return [
            'PDPAL ID',
            'PDAM ID',
            'Nama',
            'Bangunan',
            'Kecamatan',
            'Kelurahan',
            'Alamat',
            'Waktu',
            'Status',
            'Keterangan',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Border semua kolom dan tulisan judul
        $sheet->getStyle('A1:J1')->getFont()->setBold(true);
        $sheet->getStyle('A1:J100')->getBorders()->getAllBorders()->setBorderStyle('thin');

        // Merge dan buat tulisan "Data Laporan Masyarakat"
        $sheet->mergeCells('A1:J1');
        $sheet->setCellValue('A1', 'Data Pelanggan');
        $sheet->getStyle('A1')->getFont()->setSize(14)->setBold(true);
        $sheet->getRowDimension('1')->setRowHeight(30);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        // Geser data ke baris bawah judul
        $sheet->fromArray($this->headings(), null, 'A2');
        return [];
    }

    public function title(): string
    {
        return 'Data Pelanggan';
    }

    public function drawings()
{
    $logoKiri = new Drawing();
    $logoKiri->setName('Logo PD PAL');
    $logoKiri->setDescription('Logo PD PAL');
    $logoKiri->setPath(public_path('vendor/adminlte/dist/img/pd1.png'));
    $logoKiri->setHeight(60);
    $logoKiri->setCoordinates('A1');

    $logoKanan = new Drawing();
    $logoKanan->setName('Logo Kota');
    $logoKanan->setDescription('Logo Kota Banjarmasin');
    $logoKanan->setPath(public_path('vendor/adminlte/dist/img/Kayuh_Baimbai.png')); // Ganti dengan file kamu
    $logoKanan->setHeight(60);
    $logoKanan->setCoordinates('J1'); // Kanan atas sesuai posisi kolom akhir

    return [$logoKiri, $logoKanan];
}
}

