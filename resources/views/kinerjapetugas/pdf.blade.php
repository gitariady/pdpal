<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kinerja Petugas</title>
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
    <h2>Laporan Data Kinerja Petugas</h2>
    <h4>nilai : 5 = Sangat Baik, 4 = Baik, 3 = Cukup, 2 = Buruk, 1 = Sangat Buruk</h4>
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

