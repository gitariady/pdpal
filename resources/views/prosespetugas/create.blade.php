<!-- Tombol untuk membuka modal -->
<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-add-proses-petugas">
    Tambah Baru
</button>

<div class="modal fade" id="modal-add-proses-petugas" tabindex="-1" role="dialog" aria-labelledby="modal-add-proses-petugas-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-add-proses-petugas-label">Tambah Proses Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('prosespetugas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="petugas_id">Petugas:</label>
                            <select class="form-control select2" name="petugas_id">
                                <option value="">--Pilih Petugas--</option>
                                @foreach ($petugaspelayanan as $petugaspelayanan)
                                    <option value="{{ $petugaspelayanan->id }}">{{ $petugaspelayanan->nama }} - {{ $petugaspelayanan->bidang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="kendaraan_id">Pilih Kendaraan:</label>
                            <select name="kendaraan_id" class="form-control" required>
                                <option value="">-- Pilih Kendaraan --</option>
                                @foreach ($kendaraan as $kendaraan)
                                <option value="{{ $kendaraan->id }}">{{ $kendaraan->nama }} - {{ $kendaraan->kegunaan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-10">
                        <div class="form-group d-flex align-items-end">
                            <div class="flex-grow-1 mr-2">
                                <label for="laporan_id">Laporan:</label>
                                <select id="laporan_id" class="form-control select2" name="laporan_id" required>
                                    <option value="">-- Pilih Laporan --</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-info" id="btn-detail-laporan">Detail</button>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="awal">Awal</label>
                            <input type="datetime-local" class="form-control" name="awal" id="awal" placeholder="Masukkan Awal" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="akhir">Akhir</label>
                            <input type="datetime-local" class="form-control" name="akhir" id="akhir" placeholder="Masukkan Akhir" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status_proses">Status Kegiatan</label>
                            <select class="form-control" name="status_proses" id="status_proses" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="sudah selesai">Sudah Selesai</option>
                                <option value="dilanjutkan nanti">Dilanjutkan Nanti</option>
                                <option value="dibatalkan">Dibatalkan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kendala">Kendala</label>
                            <textarea class="form-control" name="kendala" id="kendala" placeholder="Masukkan Kendala" required></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="solusi">Solusi</label>
                            <textarea class="form-control" name="solusi" id="solusi" placeholder="Masukkan Solusi" required></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" required></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bukti">Bukti</label>
                            <input type="file" class="form-control-file" name="bukti" id="bukti" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

