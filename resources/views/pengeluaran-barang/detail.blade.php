@extends('layouts.master')

@section('content_header')
    <h1 class="m-0 text-dark">Laporan Detail Pengeluaran Barang</h1>
@endsection

@section('content_title', 'Laporan Detail Pengeluaran Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-body">
                <div class="row invoice-info">

                    {{-- Kolom kiri: logo + tanggal --}}
                    <div class="col-sm-4 invoice-col">
                        <h4 class="d-flex align-items-center mb-0">
                            <i class=""></i> <strong>PERUSAHAAN DAERAH PENGELOLAAN AIR LIMBAH</strong>
                        </h4>
                    </div>
                    <div class="col-sm-4 offset-sm-4 text-right">
                        <small class="text-muted">{{ $data->tanggal_transaksi }}</small>
                    </div>

                    <div class="w-100 my-3"></div> {{-- garis baris baru --}}

                    {{-- Info kanan --}}
                    <div class="col-sm-4 invoice-col">
                        <b>Nomor Transaksi : </b>{{ $data->nomor_pengeluaran }}<br>
                        <b>Nama Petugas  : </b>{{ $data->nama_petugas }}<br>
                    </div>
                    {{-- Info kanan --}}
                    <div class="col-sm-4 invoice-col">
                        <b>Total Harga : </b>Rp.{{number_format ($data->total_harga) }}<br>
                        <b>Total Bayar : </b>Rp.{{number_format ($data->bayar) }}<br>
                        <b>Kembalian : </b>Rp.{{number_format ($data->kembalian) }}<br>
                        <br>
                    </div>
                </div><!-- /.row -->
                <div class="row mt-3">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th  class="text-center" style=" width: 20px;">No</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Total Jual</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->items as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ number_format($item->qty) }} <small>pcs</small></td>
                                <td>Rp. {{ number_format($item->harga) }}</td>
                                <td>Rp. {{ number_format($item->sub_total) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-bold text-right">Total Harga</td>
                                <td class="text-bold">Rp. {{number_format($data->total_harga)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.card-body -->

        @endsection
