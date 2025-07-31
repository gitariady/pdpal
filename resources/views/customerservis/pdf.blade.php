<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Customer Servis</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
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
    <h2>Laporan Data Customer Servis</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan ID</th>
                <th>Servis ID</th>
                <th>Servis Type</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customerservis as $key => $cs)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $cs->pelanggan_id }} - {{ $cs->pelanggan->nama }}</td>
                    <td>{{ $cs->servisable_id }}</td>
                    <td>{{ $cs->servisable_type }}</td>
                    <td>{{ $cs->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
