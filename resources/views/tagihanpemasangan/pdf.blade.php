<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Tagihan Pemasangan</title>
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
    <h2>Laporan Data Tagihan Pemasangan</h2>
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
            @foreach($tagihanpemasangan as $key => $t)
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

