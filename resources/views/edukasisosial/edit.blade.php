@extends('adminlte::page')

@section('title', 'Edit Acara Edukasi Sosial')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Acara Edukasi Sosial</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('edukasisosial.update', $edukasisosial->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group my-1">
                            <label for="petugas_id">Petugas Pelayanan</label>
                            <select class="form-control" name="petugas_id" required>
                                @foreach($petugaspelayan as $petugaspelayanan)
                                <option value="{{ $petugaspelayanan->id }}"
                                    {{ old('petugas_id', $edukasisosial->petugas_id) == $petugaspelayanan->id ? 'selected' : '' }}>
                                    {{ $petugaspelayanan->nama }} - {{ $petugaspelayanan->jabatan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-1">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" value="{{ old('nama_kegiatan', $edukasisosial->nama_kegiatan) }}" placeholder="Masukkan Nama Kegiatan">
                        </div>
                        <div class="form-group my-1">
                            <label for="tempat">Tempat</label>
                            <input type="text" class="form-control" name="tempat" id="tempat" value="{{ old('tempat', $edukasisosial->tempat) }}" placeholder="Masukkan Tempat Hanya 50 Karakter" maxlength="50">
                        </div>
                        <div class="form-group my-1">
                            <label for="materi">Materi</label>
                            <textarea class="form-control" name="materi" id="materi" placeholder="Masukkan Materi" rows="3">{{ old('materi', $edukasisosial->materi) }}</textarea>
                        </div>
                        <div class="form-group my-1">
                            <label for="point">Point</label>
                            <textarea type="text" class="form-control" name="point" id="point" placeholder="Masukkan Point">{{ old('point', $edukasisosial->point) }}</textarea>
                        </div>
                        <div class="form-group my-1">
                            <label for="orang">Orang yang hadir</label>
                            <input type="number" class="form-control" name="orang" id="orang" value="{{ old('orang', $edukasisosial->orang) }}" placeholder="Masukkan Orang" min="1">
                        </div>
                        <div class="form-group my-1">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea class="form-control" name="tanggapan" id="tanggapan" placeholder="Masukkan Tanggapan" rows="3">{{ old('tanggapan', $edukasisosial->tanggapan) }}</textarea>
                        </div>
                        <div class="form-group my-1">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" rows="3">{{ old('keterangan', $edukasisosial->keterangan) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="absensi">Upload Absensi</label>
                            <input type="file" name="absensi" class="form-control">
                            @if($edukasisosial->absensi)
                            <img src="{{ asset('storage/' . $edukasisosial->absensi) }}" width="80">
                            @endif
                        </div>
                        <div class="form-group my-1">
                            <label for="bukti_kegiatan">Upload Bukti kegiatan</label>
                            <input type="file" name="bukti_kegiatan" class="form-control">
                            @if ($edukasisosial->bukti_kegiatan)
                                <br>
                                <img src="{{ asset('storage/' . $edukasisosial->bukti_kegiatan) }}" width="80">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('edukasisosial.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

