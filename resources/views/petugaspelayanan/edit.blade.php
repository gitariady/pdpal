@extends('adminlte::page')
@section('title', 'edit petugas pelayanan')
@section('content_header')
    <h1 class="m-0 text-dark">Data petugas pelayanan</h1>
@stop

@section('content')
<form action="{{ route('petugaspelayanan.update', $petugaspelayanan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group my-1">
                        <label for="nip">NIP</label>
                        <input value="{{ $petugaspelayanan->nip }}" type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP">
                    </div>
                    <div class="form-group my-1">
                        <label for="nama">Nama petugas pelayanan</label>
                        <input value="{{ $petugaspelayanan->nama }}" type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama petugaspelayanan">
                    </div>
                    <div class="form-group my-1">
                        <label for="jabatan">Jabatan</label>
                        <input value="{{ $petugaspelayanan->jabatan }}" type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan">
                    </div>
                    <div class="form-group my-1">
                        <label for="bidang">Bidang</label>
                        <input value="{{ $petugaspelayanan->bidang }}" type="text" class="form-control" name="bidang" id="bidang" placeholder="Masukkan Bidang">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group my-1">
                        <label for="no_hp">No HP</label>
                        <input value="{{ $petugaspelayanan->no_hp }}" type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No HP">
                    </div>
                    <div class="form-group my-1">
                        <label for="email">Email</label>
                        <input value="{{ $petugaspelayanan->email }}" type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group my-1">
                        <label for="alamat">Alamat</label>
                        <input value="{{ $petugaspelayanan->alamat }}" type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('petugaspelayanan.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
