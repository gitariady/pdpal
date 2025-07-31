<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penerimaan Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }
        @page {
            margin: 10px;
        }
        h1, h4 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            page-break-inside: auto;
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-primary {
            color: blue;
        }
        .text-success {
            color: green;
        }
    </style>
</head>
<body>

    <h1>Laporan Penerimaan Barang</h1>
    <h4>Data Penerimaan Barang</h4>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Penerimaan</th>
                <th>Nomor Faktur</th>
                <th>Distributor</th>
                <th>Tanggal Masuk</th>
                <th>Petugas Penerima</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerimaanBarang as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nomor_penerimaan }}</td>
                    <td>{{ $item->nomor_faktur }}</td>
                    <td>{{ $item->distributor }}</td>
                    <td>{{ $item->tanggal_penerimaan }}</td>
                    <td>{{ $item->petugas_penerima }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer" style="position: fixed; bottom: 0; width: 100%; text-align: center;">
        Halaman <span class="page-number"></span>
    </div>
</body>
</html>
