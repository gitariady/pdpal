<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalCreateUser">
    Tambah Baru
</button>
<div class="modal fade" id="modalCreateUser" tabindex="-1" role="dialog" aria-labelledby="modalCreateUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateUserLabel">Tambah Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-1">
                        <label for="jenis_laporan">Jenis Laporan</label>
                        <select class="form-control" id="jenis_laporan" name="jenis_laporan" required>
                            <option value="">Pilih Jenis Laporan</option>
                            <option value="Penyedotan">Penyedotan</option>
                            <option value="Perbaikan">Perbaikan</option>
                            <option value="Pemasangan">Pemasangan</option>
                            <option value="Salah Tagihan">Salah Tagihan</option>
                        </select>
                    </div>
                    <div class="form-group my-1">
                        <label for="status_pelaporan">Status Pelaporan</label>
                        <select class="form-control" id="status_pelaporan" name="status_pelaporan" required>
                            <option value="">Pilih Status pelaporan</option>
                            <option value="Baru">Baru</option>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group my-1">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required maxlength="50">
                    </div>
                    <div class="form-group my-1">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required maxlength="15">
                    </div>
                    <div class="form-group my-1">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="form-group my-1">
                        <label for="ktp">Ktp</label>
                        <input type="file" class="form-control-file" name="ktp" id="ktp" accept="image/*" >
                    </div>
                    <div class="form-group my-1">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

