@extends('layouts.master')
@section('content_header')
    <h1 class="m-0 text-dark">Laporan Detail Penerimaan Barang</h1>
@endsection
@section('content_title', 'Laporan Detail Penerimaan Barang')
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
                        <small class="text-muted">{{ $data->tanggal_penerimaan }}</small>
                    </div>

                    <div class="w-100 my-3"></div> {{-- garis baris baru --}}

                    {{-- Info kanan --}}
                    <div class="col-sm-4 invoice-col">
                        <b>Distrubutor : </b>{{ $data->distributor }}<br>
                        <b>Nomor Faktur : </b>{{ $data->nomor_faktur }}<br>
                    </div>
                    {{-- Info kanan --}}
                    <div class="col-sm-4 invoice-col">
                        <b>Petugas Penerima Barang : </b>{{ $data->petugas_penerima }}<br>
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
                                <th>Harga Beli</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->items as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ number_format($item->qty) }} <small>pcs</small></td>
                                <td>Rp. {{ number_format($item->harga_beli) }}</td>
                                <td>Rp. {{ number_format($item->sub_total) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-bold text-right">Total Pembelian</td>
                                <td class="text-bold">Rp. {{number_format($data->total)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.card-body -->

        @endsection
