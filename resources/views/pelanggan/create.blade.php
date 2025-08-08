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
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="form-group my-1">
                                <label for="pdpal_id">PD PAL ID</label>
                                <input type="number" class="form-control" name="pdpal_id" id="pdpal_id" placeholder="Masukkan Pdam ID" min="1" required>
                                @error('pdpal_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="pdam_id">PDAM ID</label>
                                <input type="number" class="form-control" name="pdam_id" id="pdam_id" placeholder="Masukkan Pdam ID" min="1" required>
                                @error('pdam_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="ktp">Ktp</label>
                                <input type="file" class="form-control-file" name="ktp" id="ktp" accept="image/*" required>
                                {{-- @error('ktp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror --}}
                            </div>
                            <div class="form-group my-1">
                                <label for="bangunan">Bangunan</label>
                                <input type="text" class="form-control" name="bangunan" id="bangunan" placeholder="Masukkan Bangunan" required>
                                @error('bangunan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group my-1">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Masukkan Kecamatan" required>
                            @error('kecamatan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Masukkan Kelurahan" required>
                            @error('kelurahan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" required>
                            @error('alamat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <label for="waktu">Waktu</label>
                            <input type="date" class="form-control" name="waktu" id="waktu" placeholder="Masukkan Waktu" required>
                            @error('waktu')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="">--Pilih Status--</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan">
                            @error('keterangan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

