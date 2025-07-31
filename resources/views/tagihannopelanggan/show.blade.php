@extends('adminlte::page')

@section('title', 'Detail Tagihan No Pelanggan')

@section('content_header')
    <h1>Detail Tagihan No Pelanggan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $tagihannopelanggan->id }}</td>
                </tr>
                <tr>
                    <th>ID Proses Petugas</th>
                    <td>
                        {{ $tagihannopelanggan->proses_petugas_id }}
                        <button class="btn btn-sm btn-info ml-2 btn-proses-petugas"
                            data-id="{{ $tagihannopelanggan->proses_petugas_id }}">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <th>Bukti Tagihan</th>
                    <td>
                        @if ($tagihannopelanggan->bukti_tagihan)
                            <button class="btn btn-link" onclick="window.open('{{ asset('storage/' . $tagihannopelanggan->bukti_tagihan) }}', '_blank')">Lihat Gambar</button>
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Metode</th>
                    <td>{{ $tagihannopelanggan->metode }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ $tagihannopelanggan->total }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $tagihannopelanggan->keterangan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>
                        @if ($tagihannopelanggan->created_at)
                            {{ $tagihannopelanggan->created_at->translatedFormat('l, d F Y H:i') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Diperbarui Pada</th>
                    <td>
                        @if ($tagihannopelanggan->updated_at)
                            {{ $tagihannopelanggan->updated_at->translatedFormat('l, d F Y H:i') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('tagihannopelanggan.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('tagihannopelanggan.edit', $tagihannopelanggan->id) }}" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Edit
                </a>
            </div>
        </div>
    </div>
@stop
{{-- Panggil partial modal --}}
@include('components.prosespetugas')