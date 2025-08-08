<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalCreateUser">
    Pelayanan
</button>
<div class="modal fade" id="modalCreateUser" tabindex="-1" role="dialog" aria-labelledby="modalCreateUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateUserLabel">Form Permintaan Pelayanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-group my-1">
                        <label for="jenis_laporan">Jenis Laporan</label>
                        <select class="form-control" id="jenis_laporan" name="jenis_laporan" >
                            <option value="">Pilih Jenis Laporan</option>
                            <option value="Penyedotan">Penyedotan</option>
                            <option value="Perbaikan">Perbaikan</option>
                            <option value="Pemasangan">Pemasangan</option>
                            <option value="Konsultasi">Konsultasi</option>
                        </select>
                        @error('jenis_laporan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-1">
                        <input type="hidden" class="form-control" id="status_pelaporan" name="status_pelaporan" value="Baru" >

                    </div>
                    <div class="form-group my-1">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required maxlength="50">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-1">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required maxlength="15">
                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-1">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required maxlength="225"></textarea>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-1">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required maxlength="225"></textarea>
                        @error('keterangan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

