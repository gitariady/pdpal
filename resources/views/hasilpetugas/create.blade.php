<!-- Tombol untuk membuka modal -->
<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-add-hasil-petugas">
    Tambah Baru
</button>

<!-- Modal Create -->
<div class="modal fade" id="modal-add-hasil-petugas" tabindex="-1" role="dialog"
    aria-labelledby="modal-add-hasil-petugas-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-add-hasil-petugas-label">Tambah Hasil Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('hasilpetugas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Pilih Proses Petugas + Tombol Detail --}}
                    <div class="form-group my-1 d-flex align-items-center">
                        <div class="flex-grow-1">
                            <label for="proses_petugas_id">Proses Petugas :</label>
                            <select id="proses_petugas_id" class="form-control select2" name="proses_petugas_id" required>
                                <option value="">-- Pilih Proses Petugas --</option>
                            </select>
                        </div>
                        <div class="ml-2 mt-4">
                            <button type="button" class="btn btn-info" id="btn-detail-proses">
                                Detail
                            </button>
                        </div>
                    </div>

                    {{-- Jenis Layanan --}}
                    <div class="form-group my-1">
                        <label for="jenis_layanan">Jenis Layanan</label>
                        <select class="form-control" name="jenis_layanan" id="jenis_layanan" required>
                            <option value="">--Pilih Jenis Layanan--</option>
                            <option value="PENYEDOTAN">Pelayanan Penyedotan Limbah</option>
                            <option value="TERTAGIH BUKAN PELANGGAN">Pelayanan Tertagih Bukan Pelanggan</option>
                            <option value="PERBAIKAN">Pelayanan Perbaikan</option>
                            <option value="PEMASANGAN">Pelayanan Pemasangan</option>
                        </select>
                    </div>

                    {{-- Foto Hasil --}}
                    <div class="form-group my-1">
                        <label for="foto_hasil">Foto Hasil</label>
                        <input type="file" class="form-control" name="foto_hasil" id="foto_hasil" accept="image/*" required>
                    </div>

                    {{-- Tindak Lanjut --}}
                    <div class="form-group my-1">
                        <label for="tindak_lanjut">Tindak Lanjut</label>
                        <textarea class="form-control" name="tindak_lanjut" id="tindak_lanjut" rows="3" required></textarea>
                    </div>

                    {{-- Masalah Ditemukan --}}
                    <div class="form-group my-1">
                        <label for="masalah_ditemukan">Masalah Ditemukan</label>
                        <textarea class="form-control" name="masalah_ditemukan" id="masalah_ditemukan" rows="3" required></textarea>
                    </div>

                    {{-- Kesimpulan --}}
                    <div class="form-group my-1">
                        <label for="kesimpulan">Kesimpulan</label>
                        <textarea class="form-control" name="kesimpulan" id="kesimpulan" rows="3" required></textarea>
                    </div>

                    {{-- Status Hasil --}}
                    <div class="form-group my-1">
                        <label for="status_hasil">Status Hasil</label>
                        <select class="form-control" name="status_hasil" id="status_hasil" required>
                            <option value="">--Pilih Status Hasil--</option>
                            <option value="Disetujui Dilaksanakan">Disetujui Dilaksanakan</option>
                            <option value="Tidak Disetujui">Tidak Disetujui</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

