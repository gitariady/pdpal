<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Barang</title>
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
<body>
    <h2>Laporan Data Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $key => $b)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->merk }}</td>
                    <td>{{ $b->tipe }}</td>
                    <td>{{ $b->satuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

