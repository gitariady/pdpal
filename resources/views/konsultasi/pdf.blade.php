<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Konsultasi</title>
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
    <h4>Laporan Data Konsultasi</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Nama Konsultasi</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Bangunan</th>
                <th>Luas Bangunan</th>
                <th>Jumlah Orang</th>
                <th>Pertanyaan</th>
                <th>Keterangan</th>
                {{-- <th>Bukti Konsultasi</th>
                <th>KTP</th> --}}
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($konsultasi as $key => $k)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $k->petugasPelayanan->nama }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->email }}</td>
                    <td>{{ $k->no_hp }}</td>
                    <td>{{ $k->bangunan }}</td>
                    <td>{{ $k->luas_bangunan }}</td>
                    <td>{{ $k->orang }}</td>
                    <td>{{ $k->pertanyaan }}</td>
                    <td>{{ $k->keterangan }}</td>
                    {{-- <td><img src="{{ asset('storage/' . $k->bukti_konsultasi) }}" width="50px" height="50px"></td>
                    <td><img src="{{ asset('storage/' . $k->ktp) }}" width="50px" height="50px"></td> --}}
                    <td>{{ $k->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

