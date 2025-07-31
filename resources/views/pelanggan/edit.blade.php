@extends('adminlte::page')
@section('title', 'Edit Pelanggan')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Pelanggan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group my-1">
                            <label for="pdam_id">PdPal ID</label>
                            <input type="number" class="form-control" name="pdpal_id" id="pdpal_id" placeholder="Masukkan Pdpal ID" value="{{ $pelanggan->pdpal_id }}" min="1" required>
                        </div>
                        <div class="form-group my-1">
                            <label for="pdam_id">Pdam ID</label>
                            <input type="number" class="form-control" name="pdam_id" id="pdam_id" placeholder="Masukkan Pdam ID" value="{{ $pelanggan->pdam_id }}" min="1" required>
                        </div>
                        <div class="form-group my-1">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $pelanggan->nama }}" required>
                        </div>
                        <div class="form-group my-1">
                            <label for="ktp">Ktp</label>
                            <input type="file" class="form-control-file" name="ktp" id="ktp" accept="image/*">
                            <img src="{{ asset('storage/' . $pelanggan->ktp) }}" width="100" height="100" alt="Ktp">
                        </div>
                        <div class="form-group my-1">
                            <label for="bangunan">Bangunan</label>
                            <input type="text" class="form-control" name="bangunan" id="bangunan" placeholder="Masukkan Bangunan" value="{{ $pelanggan->bangunan }}" required>
                        </div>
                        <div class="form-group my-1">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Masukkan Kecamatan" value="{{ $pelanggan->kecamatan }}" required>
                        </div>
                        <div class="form-group my-1">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Masukkan Kelurahan" value="{{ $pelanggan->kelurahan }}" required>
                        </div>
                        <div class="form-group my-1">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="{{ $pelanggan->alamat }}" required>
                        </div>
                        <div class="form-group my-1">
                            <label for="waktu">Waktu</label>
                            <input type="date" class="form-control" name="waktu" id="waktu" placeholder="Masukkan Waktu" value="{{ $pelanggan->waktu }}" required>
                        </div>
                        <div class="form-group my-1">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="">--Pilih Status--</option>
                                <option value="Aktif" {{ $pelanggan->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ $pelanggan->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group my-1">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" value="{{ $pelanggan->keterangan }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

