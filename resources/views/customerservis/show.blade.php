@extends('adminlte::page')

@section('title', 'Detail Customer Servis')

@section('content_header')
    <h1>Detail Customer Servis</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $customerservis->id }}</td>
                </tr>
                <tr>
                    <th>Data Pelanggan</th>
                    <td>No ID: {{ $customerservis->pelanggan->id ?? '-' }}  Nama : {{ $customerservis->pelanggan->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Servis</th>
                    <td>{{ $customerservis->servisable_type }}</td>
                </tr>
                <tr>
                    <th>ID Servis</th>
                    <td>{{ $customerservis->servisable_id }}</td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td>{{ $customerservis->catatan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>
                        @if ($customerservis->created_at)
                            {{ $customerservis->created_at->translatedFormat('l, d F Y H:i') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Diperbarui Pada</th>
                    <td>
                        @if ($customerservis->updated_at)
                            {{ $customerservis->updated_at->translatedFormat('l, d F Y H:i') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('customerservis.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('customerservis.edit', $customerservis->id) }}" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Edit
                </a>
            </div>
        </div>
    </div>
@stop
