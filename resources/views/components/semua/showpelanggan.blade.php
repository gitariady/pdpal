<!-- Modal Reusable Pelanggan -->
<div class="modal fade" id="modalPelanggan" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Detail Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detailPelanggan">
                    <p>Memuat data...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).on('click', '.btn-pelanggan', function() {
            let id = $(this).data('id');
            $('#modalPelanggan').modal('show');
            $('#detailPelanggan').html('<p>Memuat data...</p>');

            $.ajax({
                url: "{{ url('pelanggan') }}/" + id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    if (!data || data.error) {
                        $('#detailPelanggan').html(
                            '<p class="text-danger">Data tidak ditemukan.</p>');
                        return;
                    }

                    let html = `
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>${data.id}</td></tr>
                        <tr><th>PDPAL ID</th><td>${data.pdpal_id ?? '-'}</td></tr>
                        <tr><th>PDAM ID</th><td>${data.pdam_id ?? '-'}</td></tr>
                        <tr><th>Nama</th><td>${data.nama ?? '-'}</td></tr>
                        <tr><th>KTP</th><td>${data.ktp ? `<img src="${data.ktp}" alt="KTP" class="img-fluid" style="max-width: 150px; object-fit: contain;">` : '-'}</td></tr>
                        <tr><th>Bangunan</th><td>${data.bangunan ?? '-'}</td></tr>
                        <tr><th>Kecamatan</th><td>${data.kecamatan ?? '-'}</td></tr>
                        <tr><th>Kelurahan</th><td>${data.kelurahan ?? '-'}</td></tr>
                        <tr><th>Alamat</th><td>${data.alamat ?? '-'}</td></tr>
                        <tr><th>Waktu</th><td>${data.waktu ? new Date(data.waktu).toLocaleString('id-ID', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' }) : '-'}</td></tr>
                        <tr><th>Status</th><td>${data.status ?? '-'}</td></tr>
                        <tr><th>Keterangan</th><td>${data.keterangan ?? '-'}</td></tr>
                    </table>
                `;
                    $('#detailPelanggan').html(html);
                },
                error: function(xhr) {
                    if (xhr.status === 401 || (xhr.responseText && xhr.responseText.includes(
                            '<!DOCTYPE'))) {
                        $('#detailPelanggan').html(
                            '<p class="text-danger">Sesi login habis, silakan login ulang.</p>');
                    } else {
                        $('#detailPelanggan').html('<p class="text-danger">Gagal memuat data.</p>');
                        console.error("Error Response:", xhr.responseText);
                    }
                }
            });
        });
    </script>
@endpush

