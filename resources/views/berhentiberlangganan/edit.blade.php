@extends('adminlte::page')
@section('title', 'Edit berhenti berlangganan')
@section('content_header')
    <h1 class="m-0 text-dark">Data berhenti berlangganan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('berhentiberlangganan.update' , $berhentiberlangganan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="petugas_id">Petugas Pelayanan</label>
                            <select class="form-control" name="petugas_id" required>
                                @foreach($petugaspelayan as $petugaspelayanan)
                                <option value="{{ $petugaspelayanan->id }}"
                                    {{ old('petugas_id', $berhentiberlangganan->petugas_id) == $petugaspelayanan->id ? 'selected' : '' }}>
                                    {{ $petugaspelayanan->nama }} - {{ $petugaspelayanan->jabatan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bukti_berhenti">Bukti Berhenti</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Lihat</span>
                                </div>
                                <a href="{{ asset('storage/' . $berhentiberlangganan->bukti_berhenti) }}" target="_blank" class="form-control">
                                    {{ $berhentiberlangganan->bukti_berhenti }}
                                </a>
                            </div>
                            <input type="file" class="form-control-file" name="bukti_berhenti" id="bukti_berhenti" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="bukti_pdam">Bukti Pdam</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Lihat</span>
                                </div>
                                <a href="{{ asset('storage/' . $berhentiberlangganan->bukti_pdam) }}" target="_blank" class="form-control">
                                    {{ $berhentiberlangganan->bukti_pdam }}
                                </a>
                            </div>
                            <input type="file" class="form-control-file" name="bukti_pdam" id="bukti_pdam" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="ktp">Ktp</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Lihat</span>
                                </div>
                                <a href="{{ asset('storage/' . $berhentiberlangganan->ktp) }}" target="_blank" class="form-control">
                                    {{ $berhentiberlangganan->ktp }}
                                </a>
                            </div>
                            <input type="file" class="form-control-file" name="ktp" id="ktp" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $berhentiberlangganan->keterangan }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('berhentiberlangganan.index') }}" class="btn btn-danger">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

