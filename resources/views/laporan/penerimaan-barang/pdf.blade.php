<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Detail Penerimaan Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 20px;
        }
        h3 {
            margin-bottom: 5px;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .text-bold { font-weight: bold; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 6px 8px;
        }
        table th {
            background-color: #f5f5f5;
        }
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        .company-title {
            font-size: 14px;
            font-weight: bold;
        }
        .info-section {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        .info-block {
            width: 45%;
        }
    </style>
</head>
<body>

    <div class="header-section">
        <img src="images/pd1.png" align="left" height="80" width="80" />
        <h4>
            PERUSAHAAN DAERAH PENGELOLA AIR LIMBAH
            <br></br>
            PD PAL KOTA BANJARMASIN
        </h4>
        <br>
        <hr style="border: 2px solid black;margin-top: 0px;"/>

        <h3>Laporan Detail Penerimaan Barang</h3>

            <small>{{ $data->tanggal_penerimaan }}</small>
        </div>
    </div>

    <div class="info-section">
        <div class="info-block">
            <b>Distributor :</b> {{ $data->distributor }}<br>
            <b>Nomor Faktur :</b> {{ $data->nomor_faktur }}<br>
        </div>
        <div class="info-block">
            <b>Petugas Penerima Barang :</b> {{ $data->petugas_penerima }}<br>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 30px;">No</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ number_format($item->qty) }} pcs</td>
                    <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($item->sub_total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right text-bold">Total Pembelian</td>
                <td class="text-bold">Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>

