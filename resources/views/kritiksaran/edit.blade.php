@extends('adminlte::page')

@section('title', 'Edit barang')

@section('content_header')
    <h1 class="m-0 text-dark">Data barang</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('barang.update' , $barang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_barang">Nama barang</label>
                            <input value="{{$barang->nama_barang}}" type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama barang">
                        </div>
                        <div class="form-group">
                            <label for="merk">merk</label>
                            <input value="{{$barang->merk}}" type="text" class="form-control" name="merk" id="merk" placeholder="Masukkan merk">
                        </div>
                        <div class="form-group">
                            <label for="tipe">tipe</label>
                            <input value="{{$barang->tipe}}" type="text" class="form-control" name="tipe" id="tipe" placeholder="Masukkan tipe">
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input value="{{$barang->satuan}}" type="text" class="form-control" name="satuan" id="satuan" placeholder="Masukkan satuan">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('barang.index') }}" class="btn btn-danger">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
