<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Customer Servis</title>
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

    <h4>Laporan Data Customer Servis</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID/Nama Pelanggan</th>
                <th>Status</th>
                <th>Servis ID</th>
                <th>Servis Type</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customerservis as $key => $cs)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $cs->pelanggan->pdpal_id }} - {{ $cs->pelanggan->nama }}</td>
                    <td>{{ $cs->pelanggan->status }}</td>
                    <td>{{ $cs->servisable_id }}</td>
                    <td>{{ $cs->servisable_type }}</td>
                    <td>{{ $cs->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
