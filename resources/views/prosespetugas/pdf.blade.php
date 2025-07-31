<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Proses Petugas</title>
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
    <h2>Laporan Data Proses Kegiatan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Petugas ID</th>
                <th>Laporan ID</th>
                <th>Kendaraan ID</th>
                <th>Kendala</th>
                <th>Solusi</th>
                <th>Status Proses</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prosespetugas as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->petugasPelayanan->nama }}</td>
                    <td>{{ $p->laporan->jenis_laporan }}</td>
                    <td>{{ $p->kendaraan->nama }}</td>
                    <td>{{ $p->kendala }}</td>
                    <td>{{ $p->solusi }}</td>
                    <td>{{ $p->status_proses }}</td>
                    <td>{{ $p->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

