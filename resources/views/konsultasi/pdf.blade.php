<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Konsultasi</title>
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
<body><div style="text-align: center;">
    <h2 class="d-flex align-items-center mb-0">
        <i class=""></i> <strong style="border-bottom: 2px solid;">PERUSAHAAN DAERAH PENGELOLAAN AIR LIMBAH</strong>
    </h2>
</div>
    <h2>Laporan Data Konsultasi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Petugas</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Bangunan</th>
                <th>Luas Bangunan</th>
                <th>Jumlah Orang</th>
                <th>Pertanyaan</th>
                {{-- <th>Keterangan</th> --}}
                <th>Bukti Konsultasi</th>
                <th>KTP</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($konsultasi as $key => $k)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $k->petugas_id }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->email }}</td>
                    <td>{{ $k->no_hp }}</td>
                    <td>{{ $k->bangunan }}</td>
                    <td>{{ $k->luas_bangunan }}</td>
                    <td>{{ $k->orang }}</td>
                    <td>{{ $k->pertanyaan }}</td>
                    {{-- <td>{{ $k->keterangan }}</td> --}}
                    <td><img src="{{ asset('storage/' . $k->bukti_konsultasi) }}" width="50px" height="50px"></td>
                    <td><img src="{{ asset('storage/' . $k->ktp) }}" width="50px" height="50px"></td>
                    <td>{{ $k->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

