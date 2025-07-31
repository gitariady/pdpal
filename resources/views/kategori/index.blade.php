@extends('layouts.master')
@section('content_title', 'kategori')
@section('content_header','Kategori')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Data Kategori</h4>
            <div class="d-flex justify-content-end mb-2">
                <x-kategori.form-kategori />
            </div>
        </div>
        <div class="card-body">
            <x-alert :errors='$errors' type="warning" />
            <table class="table table-sm " id='table2'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <div class="d-flex align-item-center">
                                    <x-kategori.form-kategori :id="$item->id" />
                                    <form action="{{ route('master-data.kategori.destroy', $item->id) }}" method="POST"
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
