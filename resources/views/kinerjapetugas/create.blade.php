<!-- Tombol untuk membuka modal -->
<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-add-kinerja-petugas">
    Tambah Baru
</button>

<!-- Modal Create -->
<div class="modal fade" id="modal-add-kinerja-petugas" tabindex="-1" role="dialog"
    aria-labelledby="modal-add-kinerja-petugas-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-add-kinerja-petugas-label">Tambah Kinerja Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kinerjapetugas.store') }}" method="POST" id="form-kinerja-petugas">
                    @csrf

                    {{-- Pilih Petugas --}}
                    <div class="form-group">
                        <label for="petugas_id">Pilih Petugas :</label>
                        <select class="form-control select2" name="petugas_id" required>
                            <option value="">--Pilih Petugas--</option>
                            @foreach ($petugaspelayanan as $petugas)
                                <option value="{{ $petugas->id }}">{{ $petugas->nama }} - {{ $petugas->bidang }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Laporan & Tombol Detail --}}
                    <div class="form-group d-flex align-items-end">
                        <div class="flex-grow-1 mr-2">
                            <label for="laporan_id">Laporan :</label>
                            <select id="laporan_id" class="form-control select2" name="laporan_id" required>
                                <option value="">-- Pilih Laporan --</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-info" id="btn-detail-laporan">
                            Detail
                        </button>
                    </div>

                    {{-- Kegiatan Kerja --}}
                    <div class="form-group">
                        <label for="kegiatan_kerja">Kegiatan yang dilakukan oleh Petugas Kerja</label>
                        <textarea name="kegiatan_kerja" id="kegiatan_kerja" class="form-control"
                            placeholder="Masukkan kegiatan kerja" rows="3">{{ old('kegiatan_kerja') }}</textarea>
                    </div>

                    {{-- Nilai Penilaian --}}
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
                        <div class="form-group col-md-4">
                            <label>Ketepatan Waktu</label>
                            <select name="ketepatan_waktu" class="form-control">
                                @foreach ($nilaiOptions as $val => $text)
                                    <option value="{{ $val }}" {{ old('ketepatan_waktu') == $val ? 'selected' : '' }}>
                                        {{ $text }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kepuasan Masyarakat</label>
                            <select name="kepuasan_masyarakat" class="form-control">
                                @foreach ($nilaiOptions as $val => $text)
                                    <option value="{{ $val }}" {{ old('kepuasan_masyarakat') == $val ? 'selected' : '' }}>
                                        {{ $text }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Sikap Kerja</label>
                            <select name="sikap_kerja" class="form-control">
                                @foreach ($nilaiOptions as $val => $text)
                                    <option value="{{ $val }}" {{ old('sikap_kerja') == $val ? 'selected' : '' }}>
                                        {{ $text }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="form-kinerja-petugas">Simpan</button>
            </div>
        </div>
    </div>
</div>
