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
                <form action="{{ route('kendaraan.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Kendaran</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Jenis kendaran">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kegunaan">kegunaan</label>
                        <textarea type="text" class="form-control" name="kegunaan" id="kegunaan" placeholder="Masukkan kegunaan"></textarea>
                        @error('kegunaan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

