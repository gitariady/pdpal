<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Hasil Petugas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body><div style="text-align: center;">
    <h2 class="d-flex align-items-center mb-0">
        <i class=""></i> <strong style="border-bottom: 2px solid;">PERUSAHAAN DAERAH PENGELOLAAN AIR LIMBAH</strong>
    </h2>
</div>
    <h2>Laporan Data Hasil Kegiatan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Proses Petugas ID</th>
                <th>Jenis Layanan</th>
                <th>Tindak Lanjut</th>
                <th>Masalah Ditemukan</th>
                <th>Kesimpulan</th>
                <th>Status Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilpetugas as $key => $h)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $h->proses_petugas_id }}</td>
                    <td>{{ $h->jenis_layanan }}</td>
                    <td>{{ $h->tindak_lanjut }}</td>
                    <td>{{ $h->masalah_ditemukan }}</td>
                    <td>{{ $h->kesimpulan }}</td>
                    <td>{{ $h->status_hasil }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

