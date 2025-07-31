@extends('layouts.master')
@section('content_title', 'Data Transaksi')
@section('content_header', 'Data Transaksi')
@section('content')
    <div class="row">
        <x-dashboard-card type="bg-info" icon="fas fa-shopping-cart" label="Total Order" value="{{ $totalOrder }}" />
        <x-dashboard-card type="bg-success" icon="fas fa-box-open" label="Total Produk" value="{{ $totalProduk }}" />
        <x-dashboard-card type="bg-primary" icon="fas fa-cart-plus" label="Total Pembelian" value="{{ $totalBeli }}" />
        <x-dashboard-card type="bg-warning" icon="fas fa-wallet" label="Total Pendapatan" value="{{ $totalPendapatan }}" />
    </div>

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transaksi Terakhir</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <th>Nomor Transaksi</th>
                                    <th>jumlah order</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestOrder as $item)
                                    <tr>
                                        <td>{{ $item->tanggal_transaksi }}</td>
                                        <td>{{ $item->nomor_pengeluaran }}</td>
                                        <td>{{ $item->items->count() }}<small>Item</small></td>
                                        <td>Rp.{{ number_format($item->total_harga) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        Menampilkan 5 Data Terakhir
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Produk Terlaris</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produkTerlaris as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>{{ $item->total_terjual }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
