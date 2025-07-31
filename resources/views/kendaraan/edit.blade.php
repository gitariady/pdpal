@extends('adminlte::page')

@section('title', 'edit kendaraan')

@section('content_header')
    <h1 class="m-0 text-dark">Data kendaraan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('kendaraan.update' , $kendaraan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama kendaraan</label>
                            <input value="{{$kendaraan->nama}}" type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="kegunaan">kegunaan</label>
                            <input value="{{$kendaraan->kegunaan}}" type="text" class="form-control" name="kegunaan" id="kegunaan" placeholder="Masukkan kegunaan">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kendaraan.index') }}" class="btn btn-danger">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
