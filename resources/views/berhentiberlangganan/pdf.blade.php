<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Berhenti Berlangganan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
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
    <h2>Laporan Data Berhenti Berlangganan</h2>
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
                    <td>{{ $b->petugas_id }}</td>
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
                            <img src="{{ $buktiBerhentiImg }}" style="max-width: 100px;">
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
