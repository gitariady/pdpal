<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Edukasi Sosial</title>
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

    <h4>Laporan Data Edukasi Sosial</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Petugas</th>
                <th>Nama Kegiatan</th>
                <th>Tempat</th>
                <th>Materi</th>
                <th>Point</th>
                <th>Orang</th>
                <th>Tanggapan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($edukasisosial as $key => $e)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $e->petugas_id }}</td>
                    <td>{{ $e->nama_kegiatan }}</td>
                    <td>{{ $e->tempat }}</td>
                    <td>{{ $e->materi }}</td>
                    <td>{{ $e->point }}</td>
                    <td>{{ $e->orang }}</td>
                    <td>{{ $e->tanggapan }}</td>
                    <td>{{ $e->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

