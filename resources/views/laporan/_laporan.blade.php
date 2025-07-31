<!DOCTYPE html>
<html>
<head>
    <title>Laporan Masuk</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 6px; text-align: left; }
    </style>
</head>
<div style="text-align: center;">
    <h2 class="d-flex align-items-center mb-0">
        <i class=""></i> <strong style="border-bottom: 2px solid;">PERUSAHAAN DAERAH PENGELOLAAN AIR LIMBAH</strong>
    </h2>
</div>
<body>
    <h2 >Laporan Data Pelayanan</h2>

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
                        <img src="{{ asset('storage/' . $item->ktp) }}" style="max-width: 100px;">
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
