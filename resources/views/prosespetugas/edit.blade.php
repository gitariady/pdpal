@extends('adminlte::page')
@section('title', 'Edit Proses Petugas')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Proses Petugas</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('prosespetugas.update', $prosespetuga->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="petugas_id">Pilih Petugas :</label>
                                <select id="petugas_id" name="petugas_id" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih Petugas --</option>
                                    @foreach ($petugaspelayan as $petugaspelayan)
                                        <option value="{{ $petugaspelayan->id }}" {{ $prosespetuga->petugas_id == $petugaspelayan->id ? 'selected' : '' }}>
                                            {{ $petugaspelayan->nama }} - {{ $petugaspelayan->bidang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="laporan_id">Pilih Laporan :</label>
                                <select id="laporan_id" name="laporan_id" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih laporan --</option>
                                    <option value="{{ $prosespetuga->laporan_id }}" selected>
                                        {{ $prosespetuga->laporan->id ?? 'Laporan Lama' }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="kendaraan_id">Pilih Kendaraan</label>
                                <select name="kendaraan_id" class="form-control select2" id="kendaraanSelect" required>
                                    <option value="">-- Pilih Kendaraan --</option>
                                    @foreach ($kendaraan as $kendaraan)
                                        <option value="{{ $kendaraan->id }}" {{ $prosespetuga->kendaraan_id == $kendaraan->id ? 'selected' : '' }}>
                                            {{ $kendaraan->nama }} - {{ $kendaraan->kegunaan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="awal">Awal</label>
                                <input type="datetime-local" class="form-control" name="awal" id="awal"
                                    value="{{ $prosespetuga->awal }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="akhir">Akhir</label>
                                <input type="datetime-local" class="form-control" name="akhir" id="akhir"
                                    value="{{ $prosespetuga->akhir }}" required>
                            </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kendala">Kendala</label>
                                <textarea class="form-control" name="kendala" id="kendala" required>{{ $prosespetuga->kendala }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="solusi">Solusi</label>
                                <textarea class="form-control" name="solusi" id="solusi" required>{{ $prosespetuga->solusi }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status_proses">Status Proses Kegiatan</label>
                                <select class="form-control" name="status_proses" id="status_proses" required>
                                    <option value="">-- Pilih Status Proses --</option>
                                    <option value="sudah selesai" {{ $prosespetuga->status_proses == 'sudah selesai' ? 'selected' : '' }}>Sudah Selesai</option>
                                    <option value="dilanjutkan nanti" {{ $prosespetuga->status_proses == 'dilanjutkan nanti' ? 'selected' : '' }}>Dilanjutkan Nanti</option>
                                    <option value="dibatalkan" {{ $prosespetuga->status_proses == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bukti">Bukti</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Lihat</span>
                                    </div>
                                    <a href="{{ asset('storage/' . $prosespetuga->bukti) }}" target="_blank" class="form-control">
                                        {{ $prosespetuga->bukti }}
                                    </a>
                                </div>
                                <input type="file" class="form-control-file" name="bukti" id="bukti" accept="image/*">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="keterangan">Keterangan</label>
                                <textarea type="text" class="form-control" name="keterangan" id="keterangan"
                                    required>{{ $prosespetuga->keterangan }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('prosespetugas.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-theme@0.1.0-beta.10/dist/select2-bootstrap.min.css" rel="stylesheet" />
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            function initSelect2(selector, url, placeholder) {
                $(selector).select2({
                    theme: 'bootstrap',
                    placeholder: placeholder,
                    minimumInputLength: 0,
                    ajax: {
                        url: url,
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return { search: params.term || '' };
                        },
                        processResults: function(data) {
                            return { results: data };
                        },
                        cache: true
                    }
                });
            }

            // Petugas
            initSelect2('#petugas_id', "{{ route('petugaspelayanan.search') }}", '-- Pilih Petugas --');

            // Laporan
            initSelect2('#laporan_id', "{{ route('laporan.search') }}", '-- Pilih Laporan --');
        });
    </script>
@endpush


