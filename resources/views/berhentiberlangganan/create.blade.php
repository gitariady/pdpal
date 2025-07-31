<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalCreateBerhenti">
    Tambah Baru
</button>
<div class="modal fade" id="modalCreateBerhenti" tabindex="-1" role="dialog" aria-labelledby="modalCreateBerhentiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateBerhentiLabel">Tambah Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('berhentiberlangganan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="petugas_id">Pilih Petugas : </label>
                    <select name="petugas_id" class="form-control"  required>
                        <option value="">--Pilih Petugas--</option>
                        @foreach ($petugaspelayanan as $petugaspelayanan)
                            <option value="{{ $petugaspelayanan->id }}">{{ $petugaspelayanan->nama }} - {{ $petugaspelayanan->bidang }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="bukti_berhenti">Bukti Berhenti</label>
                        <input type="file" class="form-control-file" name="bukti_berhenti" id="bukti_berhenti"
                            accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="bukti_pdam">Bukti Pdam</label>
                        <input type="file" class="form-control-file" name="bukti_pdam" id="bukti_pdam"
                            accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="ktp">Ktp</label>
                        <input type="file" class="form-control-file" name="ktp" id="ktp" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
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
    @endpush

