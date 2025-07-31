<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pelanggan</title>
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
    <h2>Laporan Data Pelanggan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>PDPAL ID</th>
                <th>Pelanggan Pdam ID</th>
                <th>Nama</th>
                <th>Bangunan</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Alamat</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggan as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->pdpal_id }}</td>
                    <td>{{ $p->pdam_id }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->bangunan }}</td>
                    <td>{{ $p->kecamatan }}</td>
                    <td>{{ $p->kelurahan }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->waktu }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

