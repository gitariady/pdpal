@extends('adminlte::page')
@section('title', 'Edit Konsultasi')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Konsultasi</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('konsultasi.update', $konsultasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="petugas_id">Petugas Pelayanan</label>
                                <select class="form-control" name="petugas_id" required>
                                    @foreach($petugaspelayan as $petugaspelayanan)
                                    <option value="{{ $petugaspelayanan->id }}"
                                        {{ old('petugas_id', $konsultasi->petugas_id) == $petugaspelayanan->id ? 'selected' : '' }}>
                                        {{ $petugaspelayanan->nama }} - {{ $petugaspelayanan->jabatan }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input value="{{ old('nama', $konsultasi->nama) }}" type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input value="{{ old('email', $konsultasi->email) }}" type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="no_hp">No HP</label>
                                <input value="{{ old('no_hp', $konsultasi->no_hp) }}" type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No HP">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="bangunan">Bangunan</label>
                                <input value="{{ old('bangunan', $konsultasi->bangunan) }}" type="text" class="form-control" name="bangunan" id="bangunan" placeholder="Masukkan Bangunan">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="luas_bangunan">luas bangunan</label>
                                <input value="{{ old('luas_bangunan', $konsultasi->luas_bangunan) }}" type="text" class="form-control" name="luas_bangunan" id="luas_bangunan"
                                    placeholder="Masukkan luas bangunan" maxlength="35">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="orang">Jumlah Penghuni</label>
                                <input value="{{ old('orang', $konsultasi->orang) }}" type="number" class="form-control" name="orang" id="orang"
                                    placeholder="Masukkan orang" min="1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pertanyaan">pertanyaan</label>
                                <textarea type="text" class="form-control" name="pertanyaan" id="pertanyaan"
                                    placeholder="Masukkan pertanyaan" maxlength="35">{{ old('pertanyaan', $konsultasi->pertanyaan) }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan">{{ old('keterangan', $konsultasi->keterangan) }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bukti_konsultasi">Upload Bukti Konsultasi</label>
                                <input type="file" name="bukti_konsultasi" class="form-control">
                                @if($konsultasi->bukti_konsultasi)
                                <img src="{{ asset('storage/' . $konsultasi->bukti_konsultasi) }}" width="80">
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ktp">Upload KTP</label>
                                <input type="file" name="ktp" class="form-control">
                                @if($konsultasi->ktp)
                                <img src="{{ asset('storage/' . $konsultasi->ktp) }}" width="80">
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">Pilih status</option>
                                    <option value="Menerima Lanjut Pemasangan" {{ old('status', $konsultasi->status) == 'Menerima Lanjut Pemasangan' ? 'selected' : '' }}>Menerima Lanjut Pemasangan</option>
                                    <option value="Menunggu Tindak Lanjut" {{ old('status', $konsultasi->status) == 'Menunggu Tindak Lanjut' ? 'selected' : '' }}>Menunggu Tindak Lanjut</option>
                                    <option value="Memilih Opsi Pekerja Lain" {{ old('status', $konsultasi->status) == 'Memilih Opsi Pekerja Lain' ? 'selected' : '' }}>Memilih Opsi Pekerja Lain</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('konsultasi.index') }}" class="btn btn-danger">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

