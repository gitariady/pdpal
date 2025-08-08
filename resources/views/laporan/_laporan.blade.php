<!DOCTYPE html>
<html>
<head>
    <title>Laporan Permintaan Pelayanan</title>
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

    <h4>Laporan Data Pelayanan</h4>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Laporan</th>
                <th>Status</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Tanggal</th>
                <th>Alamat</th>
                <th>KTP</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->jenis_laporan }}</td>
                <td>{{ $item->status_pelaporan }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->alamat }}</td>
                <td>
                    @if($item->ktp)
                        <img src="@php
                            $path = public_path('storage/' . $item->ktp);
                            echo file_exists($path)
                                ? 'data:image/png;base64,' . base64_encode(file_get_contents($path))
                                : null;
                        @endphp" style="max-width: 100px;">
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
                </td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
