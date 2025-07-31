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
                <form action="{{ route('edukasisosial.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="petugas_id">Pilih Petugas : </label>
                            <select name="petugas_id" class="form-control " required>
                                <option value="">--Pilih Petugas--</option>
                                @foreach ($petugaspelayan as $petugaspelayan)
                                    <option value="{{ $petugaspelayan->id }}">{{ $petugaspelayan->nama }} - {{ $petugaspelayan->bidang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tempat">Tempat</label>
                            <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Masukkan Tempat">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="materi">Materi</label>
                            <textarea class="form-control" name="materi" id="materi" placeholder="Masukkan Materi" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="point">Point</label>
                            <textarea type="text" class="form-control" name="point" id="point" placeholder="Masukkan Point"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="orang">Orang yang hadir</label>
                            <input type="number" class="form-control" name="orang" id="orang" placeholder="Masukkan Orang" min="1">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea class="form-control" name="tanggapan" id="tanggapan" placeholder="Masukkan Tanggapan" rows="3"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="absensi">Absensi</label>
                            <input type="file" class="form-control" name="absensi" id="absensi"
                                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                                onchange="validateFileSize(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bukti_kegiatan">Upload Bukti Kegiatan</label>
                            <input type="file" name="bukti_kegiatan" class="form-control"
                            accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                            onchange="validateFileSize(this)">
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
    function validateFileSize(input) {
        const file = input.files[0];
        if (file && file.size > 2 * 1024 * 1024) { // 2MB
            alert('Ukuran file tidak boleh lebih dari 2MB');
            input.value = ''; // reset input
        }
    }

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

