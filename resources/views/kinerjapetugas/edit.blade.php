@extends('adminlte::page')
@section('title', 'Edit Kinerja Petugas')
@section('content_header')
    <h1>Edit Kinerja Petugas</h1>
@stop

@section('content')
<div class="card col-md-12">
    <div class="card-body">
        <form action="{{ route('kinerjapetugas.update', $kinerjapetuga->id) }}" method="POST" id="form-kinerja-petugas">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="petugas_id">Pilih Petugas :</label>
                    <select id="petugas_id" name="petugas_id" class="form-control select2" style="width: 100%;">
                        <option value="">-- Pilih Petugas --</option>
                        @foreach ($petugaspelayanan as $petugaspelayan)
                            <option value="{{ $petugaspelayan->id }}" {{ $kinerjapetuga->petugas_id == $petugaspelayan->id ? 'selected' : '' }}>
                                {{ $petugaspelayan->nama }} - {{ $petugaspelayan->bidang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="laporan_id">Pilih Laporan :</label>
                    <select id="laporan_id" name="laporan_id" class="form-control select2" style="width: 100%;">
                        <option value="">-- Pilih laporan --</option>
                        <option value="{{ $kinerjapetuga->laporan_id }}" selected>
                            {{ $kinerjapetuga->laporan->id ?? 'Laporan Lama' }}
                        </option>
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="kegiatan_kerja">Kegiatan yang dilakukan oleh Petugas Kerja</label>
                    <textarea name="kegiatan_kerja" id="kegiatan_kerja" class="form-control" placeholder="Masukkan kegiatan kerja">{{ old('kegiatan_kerja', $kinerjapetuga->kegiatan_kerja) }}</textarea>
                </div>

                @php
                    $nilaiOptions = [
                        1 => 'Sangat Buruk (1)',
                        2 => 'Buruk (2)',
                        3 => 'Cukup (3)',
                        4 => 'Baik (4)',
                        5 => 'Sangat Baik (5)',
                    ];
                @endphp

                <div class="form-row">
                    @foreach ([
                        'ketepatan_waktu' => 'Ketepatan Waktu',
                        'kepuasan_masyarakat' => 'Kepuasan Masyarakat',
                        'sikap_kerja' => 'Sikap Kerja'
                    ] as $field => $label)
                        <div class="form-group col-md-4">
                            <label>{{ $label }}</label>
                            <select name="{{ $field }}" class="form-control">
                                @foreach($nilaiOptions as $val => $text)
                                    <option value="{{ $val }}"
                                        {{ old($field, $kinerjapetuga->$field) == $val ? 'selected' : '' }}>
                                        {{ $text }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kinerjapetugas.index') }}" class="btn btn-danger">Batal</a>
        </form>
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

