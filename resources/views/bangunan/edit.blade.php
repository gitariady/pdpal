@extends('adminlte::page')
@section('title', 'bangunan')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark">Bangunan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Bangunan</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('bangunan.update', $bangunan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama bangunan</label>
                        <input type="text" class="form-control" name="nama_bangunan" id="nama_bangunan"
                        placeholder="Masukkan Nama bangunan" value="{{ $bangunan->nama_bangunan ?? old('nama_bangunan') }}">
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <input type="number" class="form-control" name="biaya" id="biaya" placeholder="Masukkan Biaya"
                        value="{{ $bangunan->biaya ?? old('biaya') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('bangunan.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
