@extends('layouts.master')

@section('content_header')
    <h1 class="m-0 text-dark">Laporan Penerimaan Barang</h1>
@endsection

@section('content_title', 'Laporan Penerimaan Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Data Penerimaan Barang</h4>
            <div class="float-right">
                <a href="{{ route('laporan.penerimaan-barang.semua') }}" class="text-success" target="_blank">
                    <i class="fa fa-print fa-2x ml-2"></i>
                </a>
            </div>
        </div>
            <div class="card-body">
                <table class="table table-sm" id="table2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Penerimaan</th>
                            <th>Nomor Faktur</th>
                            <th>Distributor</th>
                            <th>Tanggal Masuk</th>
                            <th>Petugas Penerima</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerimaanBarang as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nomor_penerimaan }}</td>
                                <td>{{ $item->nomor_faktur }}</td>
                                <td>{{ $item->distributor }}</td>
                                <td>{{ $item->tanggal_penerimaan }}</td>
                                <td>{{ $item->petugas_penerima }}</td>
                                <td>
                                    <a href="{{ route('laporan.penerimaan-barang.detail-laporan', $item->nomor_penerimaan) }}" class="text-primary mr-2">
                                        <i class="fa fa-eye fa-sm"></i>
                                    </a>
                                    <a href="{{ route('laporan.penerimaan-barang.penerimaan-barang.cetak', $item->nomor_penerimaan) }}" class="text-success" target="_blank">
                                        <i class="fa fa-print fa-sm"></i>
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
