<!-- Tombol untuk membuka modal create -->
<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalCreateTagihan">
    Tambah Baru
</button>

<!-- Modal Create Tagihan -->
<div class="modal fade" id="modalCreateTagihan" tabindex="-1" role="dialog" aria-labelledby="modalCreateTagihanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTagihanLabel">Tambah Tagihan No Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tagihannopelanggan.store') }}" method="POST" enctype="multipart/form-data">
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

                    {{-- Bukti Tagihan --}}
                    <div class="form-group">
                        <label for="bukti_tagihan">Berkas Data (Bukti Tagihan)</label>
                        <input type="file" class="form-control-file" name="bukti_tagihan"
                        id="bukti_tagihan" accept="image/*,application/pdf" required>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div class="form-group">
                        <label for="metode">Metode Pembayaran</label>
                        <select class="form-control" name="metode" id="metode" required>
                            <option value="">--Pilih Metode Pembayaran--</option>
                            <option value="Virtual Akun">Virtual Akun</option>
                            <option value="Bayar Cash">Bayar Cash</option>
                            <option value="Transfer Antar Bank">Transfer Antar Bank</option>
                        </select>
                    </div>

                    {{-- Total --}}
                    <div class="form-group">
                        <label for="total">Total Pengembalian Tagihan</label>
                        <input type="number" class="form-control" name="total" id="total" placeholder="Masukkan Total" min="1" required>
                    </div>

                    {{-- Keterangan --}}
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" required></textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
