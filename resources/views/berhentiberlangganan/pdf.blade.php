<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Berhenti Berlangganan</title>
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
            <h4>
                PERUSAHAAN DAERAH PENGELOLA AIR LIMBAH
                <br></br>
                PD PAL KOTA BANJARMASIN
            </h4>
            <hr style="border: 2px solid black;"/>

    <h3>Laporan Data Berhenti Berlangganan</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Petugas</th>
                <th>Bukti Berhenti</th>
                <th>Bukti PDAM</th>
                <th>KTP</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berhentiberlangganan as $key => $b)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $b->petugasPelayanan->nama }}</td>
                    <td>
                        @php
                            $buktiBerhentiPath = public_path('storage/' . $b->bukti_berhenti);
                            $buktiBerhentiImg = file_exists($buktiBerhentiPath)
                                ? 'data:image/png;base64,' . base64_encode(file_get_contents($buktiBerhentiPath))
                                : null;

                            $buktiPdamPath = public_path('storage/' . $b->bukti_pdam);
                            $buktiPdamImg = file_exists($buktiPdamPath)
                                ? 'data:image/png;base64,' . base64_encode(file_get_contents($buktiPdamPath))
                                : null;

                            $ktpPath = public_path('storage/' . $b->ktp);
                            $ktpImg = file_exists($ktpPath)
                                ? 'data:image/png;base64,' . base64_encode(file_get_contents($ktpPath))
                                : null;
                        @endphp

                        @if ($buktiBerhentiImg)
                            <img src="{{ $buktiBerhentiImg }}" style="max-width: 50px;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </td>
                    <td>
                        @if ($buktiPdamImg)
                            <img src="{{ $buktiPdamImg }}" style="max-width: 100px;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </td>
                    <td>
                        @if ($ktpImg)
                            <img src="{{ $ktpImg }}" style="max-width: 100px;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </td>
                    <td>{{ $b->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
