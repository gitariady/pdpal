
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran Barang</title>
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

    <h1>Laporan Pengeluaran Barang</h1>
    <h4>Data Pengeluaran Barang</h4>
    <p style="text-align: right; font-size: 11px;">Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Pengeluaran</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
                <th>Total Bayar</th>
                <th>Kembalian</th>
                <th>Nama Petugas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengeluaranBarang as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nomor_pengeluaran }}</td>
                    <td>{{ $item->tanggal_transaksi }}</td>
                    <td>Rp.{{ number_format($item->total_harga) }}</td>
                    <td>Rp.{{ number_format($item->bayar) }}</td>
                    <td>Rp.{{ number_format($item->kembalian) }}</td>
                    <td>{{ ucwords($item->nama_petugas) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer" style="position: fixed; bottom: 0; width: 100%; text-align: center;">
        Halaman <span class="page-number"></span>
    </div>
</body>
</html>
```