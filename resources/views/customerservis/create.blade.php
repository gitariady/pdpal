<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalTambahCustomerServis">
    Tambah Baru
</button>

<div class="modal fade" id="modalTambahCustomerServis" tabindex="-1" role="dialog" aria-labelledby="modalTambahCustomerServisLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahCustomerServisLabel">Tambah Customer Servis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customerservis.store') }}" method="POST">
                    @csrf

                    {{-- Pilih Pelanggan --}}
                    <div class="form-group">
                        <label for="pelanggan_id">Pelanggan</label>
                        <select name="pelanggan_id" id="pelanggan_id" class="form-control" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach ($pelanggans as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }} - {{ $p->pdpal_id }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Pilih Jenis Servis --}}
                    <div class="form-group">
                        <label for="servisable_type">Jenis Servis</label>
                        <select name="servisable_type" id="servisable_type" class="form-control" required>
                            <option value="">-- Pilih Jenis Servis --</option>
                            <option value="TagihanPerbaikan">Perbaikan</option>
                            <option value="TagihanPemasangan">Pemasangan</option>
                            <option value="BerhentiBerlangganan">Berhenti Berlangganan</option>
                        </select>
                    </div>

                    {{-- Pilih ID Servis --}}
                    <div class="form-group">
                        <label for="servisable_id">ID Servis</label>
                        <select name="servisable_id" id="servisable_id" class="form-control select2" min="1" required>
                        </select>
                    </div>

                    {{-- Catatan --}}
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" id="catatan" class="form-control" rows="3" required></textarea>
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
    $(document).ready(function () {
        // Load data servis berdasarkan jenis servis
        $('#servisable_type').change(function() {
            var type = $(this).val();
            $('#servisable_id').html('<option value="">Memuat data...</option>');
            $.ajax({
                url: "{{ route('get.servis.by.type') }}",
                type: 'GET',
                data: { type: type },
                success: function(response) {
                    let options = '<option value="">-- Pilih ID Servis --</option>';
                    if (response.data.length > 0) {
                        response.data.forEach(item => {
                            options += `<option value="${item.id}">${item.id} ${item.nama ? '- ' + item.nama : ''}</option>`;
                        });
                    } else {
                        options = '<option value="">Tidak ada data servis</option>';
                    }
                    $('#servisable_id').html(options);
                },
                error: function() {
                    alert('Gagal memuat data servis!');
                    $('#servisable_id').html('<option value="">-- Pilih ID Servis --</option>');
                }
            });
        });
    });
</script>
@endpush

