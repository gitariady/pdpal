@extends('layouts.master')

@section('content_header')
    <h1 class="m-0 text-dark">Laporan Pengeluaran Barang</h1>
@endsection

@section('content_title', 'Laporan Pengeluaran Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Data Pengeluaran Barang</h4>
            <div class="float-right">
            <a href="{{ route('laporan.pengeluaran-barang.semua') }}" class="text-success" target="_blank">
                <i class="fa fa-print fa-2x ml-2"></i>
            </a>
        </div>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="table2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Pengeluaran</th>
                        <th>Tanggal Trnsaksi</th>
                        <th>Total Harga</th>
                        <th>Total Bayar</th>
                        <th>Kembalian</th>
                        <th>nama petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nomor_pengeluaran }}</td>
                            <td>{{ $item->tanggal_transaksi }}</td>
                            <td>Rp.{{ number_format($item->total_harga) }}</td>
                            <td>Rp.{{ number_format($item->bayar) }}</td>
                            <td>Rp.{{ number_format($item->kembalian) }}</td>
                            <td>{{ ucwords($item->nama_petugas) }}</td>
                            <td>
                                <a href="{{ route('laporan.pengeluaran-barang.detail-laporan', $item->nomor_pengeluaran) }}" class="text-primary mr-2">
                                    <i class="fa fa-eye fa-sm" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('laporan.pengeluaran-barang.cetak.pengeluaran-barang', $item->nomor_pengeluaran) }}" class="text-success" target="_blank">
                                    <i class="fa fa-print fa-sm" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
