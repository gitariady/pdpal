<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Tagihan Perbaikan</title>
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

    <h2>Laporan Data Tagihan Perbaikan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Proses Kegiatan ID</th>
                <th>Bukti Tagihan</th>
                <th>Bukti Bayar</th>
                <th>Metode</th>
                <th>Total</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihanperbaikan as $key => $t)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $t->proses_petugas_id }}</td>
                    <td>
                        @php
                            // Cek bukti tagihan
                            $buktiTagihanImg = null;
                            if (!empty($t->bukti_tagihan)) {
                                $buktiTagihanPath = public_path('storage/' . $t->bukti_tagihan);
                                if (file_exists($buktiTagihanPath)) {
                                    $buktiTagihanImg = 'data:image/png;base64,' . base64_encode(file_get_contents($buktiTagihanPath));
                                }
                            }

                            // Cek bukti bayar
                            $buktiBayarImg = null;
                            if (!empty($t->bukti_bayar)) {
                                $buktiBayarPath = public_path('storage/' . $t->bukti_bayar);
                                if (file_exists($buktiBayarPath)) {
                                    $buktiBayarImg = 'data:image/png;base64,' . base64_encode(file_get_contents($buktiBayarPath));
                                }
                            }
                        @endphp

                        {{-- Tampilkan gambar bukti tagihan --}}
                        @if ($buktiTagihanImg)
                            <img src="{{ $buktiTagihanImg }}" style="max-width: 60px;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </td>

                    <td>
                        {{-- Tampilkan gambar bukti bayar --}}
                        @if ($buktiBayarImg)
                            <img src="{{ $buktiBayarImg }}" style="max-width: 60px;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </td>

                    <td>{{ $t->metode }}</td>
                    <td>{{ $t->total }}</td>
                    <td>{{ $t->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

