<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Hasil Petugas</title>
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

    <h4>Laporan Data Hasil Kegiatan</h4>
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

