@extends('layouts.master')

@section('content_header')
    <h1 class="m-0 text-dark">Product</h1>
@endsection

@section('content_title', 'Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Product</h5>
            <div class="d-flex justify-content-end mb-2">
                <x-product.form-product />
            </div>
        </div>
        <div class="card-body">
            <x-alert :errors='$errors' type="warning" />
            <table class="table table-sm " id="table2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Product</th>
                        <th>SKU</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Stok</th>
                        <th>Produk Aktif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>Rp.{{ number_format($product->harga_jual) }}</td>
                            <td>RP.{{ number_format($product->harga_beli) }}</td>
                            <td>{{ number_format($product->stok) }}</td>
                            <td>
                                <p class="badge {{ $product->is_active ? 'badge-success' : 'badge-danger' }}">
                                    {{ $product->is_active ? 'Aktif' : 'Tidak Aktif' }} </p>
                            </td>
                            <td>
                                <div class="d-flex align-item-center">
                                    <x-product.form-product :id="$product->id" />
                                    <form action="{{ route('master-data.product.destroy', $product->id) }}" method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-1">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
