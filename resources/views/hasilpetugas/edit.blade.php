@extends('adminlte::page')
@section('title', 'Edit Hasil Kegiatan')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Hasil Kegiatan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('hasilpetugas.update' , $hasilpetuga->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="proses_petugas_id">Proses petugas</label>
                                <select name="proses_petugas_id" id="proses_petugas_id" class="form-control">
                                    @foreach ($prosespetugas as $prosespetugas)
                                        <option value="{{ $prosespetugas->id }}" {{ old('proses_petugas_id', $hasilpetuga->proses_petugas_id) == $prosespetugas->id ? 'selected' : '' }}>
                                            {{ $prosespetugas->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenis_layanan">Jenis layanan</label>
                                <select name="jenis_layanan" id="jenis_layanan" class="form-control">
                                    <option value="PENYEDOTAN" {{ old('jenis_layanan', $hasilpetuga->jenis_layanan) == 'PENYEDOTAN' ? 'selected' : '' }}>pelayanan penyedotan limbah</option>
                                    <option value="PERBAIKAN" {{ old('jenis_layanan', $hasilpetuga->jenis_layanan) == 'PERBAIKAN' ? 'selected' : '' }}>pelayanan perbaikan</option>
                                    <option value="PEMASANGAN" {{ old('jenis_layanan', $hasilpetuga->jenis_layanan) == 'PEMASANGAN' ? 'selected' : '' }}>pelayanan pemasangan</option>
                                    <option value="TERTAGIH BUKAN PELANGGAN" {{ old('jenis_layanan', $hasilpetuga->jenis_layanan) == 'TERTAGIH BUKAN PELANGGAN' ? 'selected' : '' }}>pelayanan tertagih bukan pelanggan</option>
                                </select>
                            </div>
                        <div class="form-group col-md-6">
                            <label for="tindak_lanjut">Tindak lanjut</label>
                            <input value="{{ old('tindak_lanjut', $hasilpetuga->tindak_lanjut) }}" type="text" class="form-control" name="tindak_lanjut" id="tindak_lanjut" placeholder="Masukkan tindak lanjut">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="masalah_ditemukan">Masalah ditemukan</label>
                            <input value="{{ old('masalah_ditemukan', $hasilpetuga->masalah_ditemukan) }}" type="text" class="form-control" name="masalah_ditemukan" id="masalah_ditemukan" placeholder="Masukkan masalah ditemukan">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kesimpulan">Kesimpulan</label>
                            <input value="{{ old('kesimpulan', $hasilpetuga->kesimpulan) }}" type="text" class="form-control" name="kesimpulan" id="kesimpulan" placeholder="Masukkan kesimpulan">
                        </div>
                            <div class="form-group col-md-6">
                                <label for="status_hasil">Status hasil</label>
                                <select class="form-control" name="status_hasil" id="status_hasil" required>
                                    <option value="">--Pilih Status Hasil--</option>
                                    <option value="Disetujui Dilaksanakan" {{ $hasilpetuga->status_hasil == 'Disetujui Dilaksanakan' ? 'selected' : '' }}>Disetujui Dilaksanakan</option>
                                    <option value="Tidak Disetujui" {{ $hasilpetuga->status_hasil == 'Tidak Disetujui' ? 'selected' : '' }}>Tidak Disetujui</option>
                                </select>
                            </div>
                            <div class="form-group my-1">
                                <label for="foto_hasil">Foto hasil</label>
                                @if ($hasilpetuga->foto_hasil && Storage::disk('public')->exists($hasilpetuga->foto_hasil))
                                    <div class="col-sm-3">
                                        <img src="{{ asset('storage/' . $hasilpetuga->foto_hasil) }}" class="img-thumbnail" width="100" height="100" alt="Foto Hasil">
                                    </div>
                                @endif
                                <input type="file" class="form-control-file" name="foto_hasil" id="foto_hasil" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('hasilpetugas.index') }}" class="btn btn-danger">Batal</a>
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

