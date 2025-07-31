<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreateUser">
    Tambah Data
</button>
<div class="modal fade" id="modalCreateUser" tabindex="-1" role="dialog" aria-labelledby="modalCreateUserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateUserLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tagihanpenyedotan.store') }}" method="POST" enctype="multipart/form-data">
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

                    <div class="form-group">
                        <label for="">Bangunan</label>
                        <select class="form-control" name="bangunan_id" id="bangunan_id">
                            <option value="">--Pilih Proses Bangunan--</option>
                            @foreach ($bangunan as $bangunan)
                                <option value="{{ $bangunan->id }}">{{ $bangunan->nama_bangunan }}
                                    -{{ $bangunan->biaya }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Tagihan</label>
                        <input type="file" class="form-control-file" name="bukti_tagihan" id="bukti_tagihan"
                            placeholder="Masukkan Bukti Tagihan" required>
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Bayar</label>
                        <input type="file" class="form-control-file" name="bukti_bayar" id="bukti_bayar"
                            placeholder="Masukkan Bukti Tagihan" >
                    </div>
                    <div class="form-group">
                        <label for="">Metode Pembayaran</label>
                        <select class="form-control" name="metode" id="Metode" required>
                            <option value="">--Pilih Metode Bayar--</option>
                            <option value="Virtual Akun">Virtual Akun</option>
                            <option value="Bayar Cash">Bayar Cash</option>
                            <option value="Transfer Antar Bank">Transfer Antar Bank</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Total Pembayaran</label>
                        <input type="number" class="form-control" name="total" id="total"
                            placeholder="Masukkan Total" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Total" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
