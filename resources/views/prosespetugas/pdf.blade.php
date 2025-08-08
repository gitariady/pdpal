<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Proses Petugas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .logo {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <img src="images/pd1.png" align="left" height="80" width="80" />
            <h3>
                PERUSAHAAN DAERAH PENGELOLA AIR LIMBAH
                <br></br>
                PD PAL KOTA BANJARMASIN
            </h3>
            <hr style="border: 2px solid black;"/>

    <h4>Laporan Data Proses Kegiatan</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Petugas</th>
                <th>Laporan</th>
                <th>Kendaraan</th>
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

