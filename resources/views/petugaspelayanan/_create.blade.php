<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalCreateUser">
    Tambah Baru
</button>
<div class="modal fade" id="modalCreateUser" tabindex="-1" role="dialog" aria-labelledby="modalCreateUserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateUserLabel">Tambah Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('petugaspelayanan.store') }}" method="POST">
                    @csrf
                    <div class="form-group my-1">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" name="nip" id="nip"
                            placeholder="Masukkan NIP" required>
                    </div>
                    <div class="form-group my-1">
                        <label for="nama">Nama petugas pelayanan</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Masukkan Nama petugas pelayanan" required>
                    </div>
                    {{-- <div class="form-group my-1">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan"
                            placeholder="Masukkan Jabatan">
                    </div> --}}
                    <div class="form-group my-1">
                        <label for="bidang">Bidang</label>
                        <input type="text" class="form-control" name="bidang" id="bidang"
                            placeholder="Masukkan Bidang" required>
                    </div>
                    <div class="form-group my-1">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp"
                            placeholder="Masukkan No HP" required>
                    </div>
                    <div class="form-group my-1">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group my-1">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat"
                            placeholder="Masukkan Alamat" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
