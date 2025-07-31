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
                <form action="{{ route('konsultasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="petugas_id">Pilih Petugas : </label>
                            <select name="petugas_id" class="form-control" required>
                                <option value="">--Pilih Petugas--</option>
                                @foreach ($petugaspelayan as $petugaspelayan)
                                    <option value="{{ $petugaspelayan->id }}">{{ $petugaspelayan->nama }} -
                                        {{ $petugaspelayan->bidang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama">Nama Konsultasi</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama Konsultasi" maxlength="50">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Masukkan Email" maxlength="35">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp"
                                placeholder="Masukkan No HP" maxlength="15">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bangunan">Bangunan</label>
                            <input type="text" class="form-control" name="bangunan" id="bangunan"
                                placeholder="Masukkan Bangunan" maxlength="35">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="luas_bangunan">luas bangunan</label>
                            <input type="text" class="form-control" name="luas_bangunan" id="luas_bangunan"
                                placeholder="Masukkan luas bangunan" maxlength="35">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="orang">Jumlah Penghuni</label>
                            <input type="number" class="form-control" name="orang" id="orang"
                                placeholder="Masukkan orang" min="1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pertanyaan">pertanyaan</label>
                            <textarea type="text" class="form-control" name="pertanyaan" id="pertanyaan"
                                placeholder="Masukkan pertanyaan" maxlength="35"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bukti_konsultasi">Upload Bukti Konsultasi</label>
                            <input type="file" name="bukti_konsultasi" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ktp">Upload KTP</label>
                            <input type="file" name="ktp" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Pilih status</option>
                                <option value="Menerima Lanjut Pemasangan">Menerima Lanjut Pemasangan</option>
                                <option value="Menunggu Tindak Lanjut">Menunggu Tindak Lanjut</option>
                                <option value="Memilih Opsi Pekerja Lain">Memilih Opsi Pekerja Lain</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {
        $('#petugasSelect').select2({
            placeholder: "Cari laporan berdasarkan bidang/nama",
            allowClear: true
        });
    });

</script>
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function () {
            $('#laporanSelect, #petugasSelect, #kendaraanSelect').select2({ allowClear: true });
        });
    </script>
@endpush
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@endpush

