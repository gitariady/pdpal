<!-- Modal Reusable Laporan -->
<div class="modal fade" id="modalLaporan" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Detail Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detailLaporan">
                    <p>Memuat data...</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).on('click', '.btn-laporan', function() {
        let id = $(this).data('id');
        $('#modalLaporan').modal('show');
        $('#detailLaporan').html('<p>Memuat data...</p>');

        $.ajax({
            url: "{{ url('laporan') }}/" + id,
            method: "GET",
            dataType: "json",
            success: function(data) {
                if (!data || data.error) {
                    $('#detailLaporan').html('<p class="text-danger">Data tidak ditemukan.</p>');
                    return;
                }

                let html = `
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>${data.id}</td></tr>
                        <tr><th>Jenis Laporan</th><td>${data.jenis_laporan ?? '-'}</td></tr>
                        <tr><th>Status Pelaporan</th><td>${data.status_pelaporan ?? '-'}</td></tr>
                        <tr><th>Nama</th><td>${data.nama ?? '-'}</td></tr>
                        <tr><th>No HP</th><td>${data.no_hp ?? '-'}</td></tr>
                        <tr><th>Alamat</th><td>${data.alamat ?? '-'}</td></tr>
                        <tr>
                            <th>KTP</th>
                            <td>
                                ${data.ktp ? `<img src="${data.ktp}" alt="KTP" class="img-fluid" style="max-width: 150px; object-fit: contain;">` : '-'}
                            </td>
                        </tr>
                        <tr><th>Keterangan</th><td>${data.keterangan ?? '-'}</td></tr>
                        <tr><th>Tanggal</th><td>${data.created_at ? new Date(data.created_at).toLocaleString('id-ID', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' }) : '-'}</td></tr>
                    </table>
                `;
                $('#detailLaporan').html(html);
            },
            error: function(xhr) {
                if (xhr.status === 401 || (xhr.responseText && xhr.responseText.includes('<!DOCTYPE'))) {
                    $('#detailLaporan').html('<p class="text-danger">Sesi login habis, silakan login ulang.</p>');
                } else {
                    $('#detailLaporan').html('<p class="text-danger">Gagal memuat data.</p>');
                    console.error("Error Response:", xhr.responseText);
                }
            }
        });
    });
</script>
@endpush
