<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pelanggan</title>
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
            <h4>
                PERUSAHAAN DAERAH PENGELOLA AIR LIMBAH
                <br></br>
                PD PAL KOTA BANJARMASIN
            </h4>
            <hr style="border: 2px solid black;"/>

    <h3 >Laporan Data Pelanggan</h3>

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
