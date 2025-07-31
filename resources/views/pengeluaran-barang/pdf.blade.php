<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengeluaran Barang</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        h3 { margin-bottom: 5px; }
        p { margin: 3px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
        th { background-color: #f5f5f5; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .total-row td { font-weight: bold; }
    </style>
</head>
<body></i> <strong>PERUSAHAAN DAERAH PENGELOLAAN AIR LIMBAH</strong>
    <h3>Laporan Pengeluaran Barang</h3>
    <p><strong>Nomor Pengeluaran:</strong> {{ $data->nomor_pengeluaran }}</p>
    <p><strong>nama Petugas:</strong> {{ $data->nama_petugas }} </p>
    <p><strong>Tanggal Transaksi:</strong> {{ $data->tanggal_transaksi }}</p>

    <b>Total Harga : </b>Rp.{{number_format ($data->total_harga) }}<br>
    <b>Total Bayar : </b>Rp.{{number_format ($data->bayar) }}<br>
    <b>Kembalian : </b>Rp.{{number_format ($data->kembalian) }}<br>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 30px;">No</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->items as $i => $item)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ number_format($item->qty) }} pcs</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->sub_total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="4" class="text-right">Total Harga</td>
                <td>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
