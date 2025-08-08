@extends('adminlte::page')

@section('title', 'Edit laporan')

@section('content_header')
    <h1 class="m-0 text-dark">Data Edit laporan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('laporan.update' , $laporan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="jenis_laporan">Jenis Laporan</label>
                            <select class="form-control" id="jenis_laporan" name="jenis_laporan" required>
                                <option value="">Pilih Jenis Laporan</option>
                                <option value="Penyedotan" {{ old('jenis_laporan', $laporan->jenis_laporan) == 'Penyedotan' ? 'selected' : '' }}>Penyedotan</option>
                                <option value="Perbaikan" {{ old('jenis_laporan', $laporan->jenis_laporan) == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                <option value="Pemasangan" {{ old('jenis_laporan', $laporan->jenis_laporan) == 'Pemasangan' ? 'selected' : '' }}>Pemasangan</option>
                                <option value="Salah Tagihan" {{ old('jenis_laporan', $laporan->jenis_laporan) == 'Salah Tagihan' ? 'selected' : '' }}>Salah Tagih</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_pelaporan">Status Pelaporan</label>
                            <select class="form-control" id="status_pelaporan" name="status_pelaporan" required>
                                <option value="">Pilih Status Pelaporan</option>
                                <option value="Baru" {{ $laporan->status_pelaporan == 'Baru' ? 'selected' : '' }}>Baru</option>
                                <option value="Proses" {{ $laporan->status_pelaporan == 'Proses' ? 'selected' : '' }}>Proses</option>
                                <option value="Selesai" {{ $laporan->status_pelaporan == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required maxlength="50" value="{{ $laporan->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" required maxlength="15" value="{{ $laporan->no_hp }}">
                        </div>
                     </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $laporan->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="ktp">Ktp</label>
                        <input type="file" class="form-control-file" name="ktp" id="ktp" accept="image/*">
                        @if($laporan->ktp)
                            <div class="mt-2">
                                <p>Tampilkan Data:</p>
                                <img src="{{ asset('storage/' . $laporan->ktp) }}" alt="KTP" class="img-thumbnail" width="200">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $laporan->keterangan }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('laporan.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </div>
    </div></form>
@stop

