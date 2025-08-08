<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kinerja Petugas</title>
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

    <h4>Laporan Data Kinerja Setiap Petugas</h4>
    {{-- <h4>nilai : 5 = Sangat Baik, 4 = Baik, 3 = Cukup, 2 = Buruk, 1 = Sangat Buruk</h4> --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Petugas </th>
                <th>Laporan </th>
                <th>Kegiatan Kerja</th>
                <th>Ketepatan Waktu</th>
                <th>Kepuasan Masyarakat</th>
                <th>Sikap Kerja</th>
                <th>Nilai Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kinerjapetugas as $key => $kp)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $kp->petugasPelayanan->nama }}</td>
                    <td>{{ $kp->laporan->jenis_laporan }}</td>
                    <td>{{ $kp->kegiatan_kerja }}</td>
                    <td>{{ $kp->ketepatan_waktu_label }}</td>
                    <td>{{ $kp->kepuasan_masyarakat_label }}</td>
                    <td>{{ $kp->sikap_kerja_label }}</td>
                    <td>{{ $kp->nilai_total }}  ({{ $kp->nilai_label }})</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

