<?php

namespace App\Exports;

use App\Models\CustomerServis;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CustomerServisExport implements FromCollection, WithHeadings, WithStyles, WithTitle, WithDrawings
{
    public function collection()
    {
        return CustomerServis::select('pelanggan_id', 'servisable_id', 'servisable_type', 'catatan')->get();
    }

    public function headings(): array
    {
        return [
            'Pelanggan ID',  // Kolom A
            'Servis ID',     // Kolom B
            'Servis Type',   // Kolom C
            'Catatan',       // Kolom D
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Buat judul di baris 1 (A1:D1)
        $sheet->mergeCells('A1:D1');
        $sheet->setCellValue('A1', 'Data Customer Servis');
        $sheet->getStyle('A1')->getFont()->setSize(14)->setBold(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $sheet->getRowDimension('1')->setRowHeight(30);

        // Heading di baris 2 (A2:D2)
        $sheet->getStyle('A2:D2')->getFont()->setBold(true);

        // Border untuk semua data (dari A2 sampai data terakhir)
        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle("A2:D{$lastRow}")->getBorders()->getAllBorders()->setBorderStyle('thin');

        return [];
    }

    public function title(): string
    {
        return 'Customer Servis';
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
        $logoKanan->setPath(public_path('vendor/adminlte/dist/img/Kayuh_Baimbai.png'));
        $logoKanan->setHeight(60);
        $logoKanan->setCoordinates('D1');

        return [$logoKiri, $logoKanan];
    }
}
