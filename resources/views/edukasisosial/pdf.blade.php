<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Edukasi Sosial</title>
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
    <h2>Laporan Data Edukasi Sosial</h2>
    <table>
        <thead>
            <tr>
                <th>No id</th>
                <th>Petugas</th>
                <th>Nama Kegiatan</th>
                <th>Tempat</th>
                <th>Materi</th>
                <th>Point</th>
                <th>Orang</th>
                <th>Tanggapan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($edukasisosial as $key => $e)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $e->petugas_id }}</td>
                    <td>{{ $e->nama_kegiatan }}</td>
                    <td>{{ $e->tempat }}</td>
                    <td>{{ $e->materi }}</td>
                    <td>{{ $e->point }}</td>
                    <td>{{ $e->orang }}</td>
                    <td>{{ $e->tanggapan }}</td>
                    <td>{{ $e->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

