<!-- Modal Reusable Proses Petugas -->
<div class="modal fade" id="modalProsesPetugas" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Detail Proses Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detailProsesPetugas">
                    <p>Memuat data...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).on('click', '.btn-proses-petugas', function() {
            let id = $(this).data('id');
            $('#modalProsesPetugas').modal('show');
            $('#detailProsesPetugas').html('<p>Memuat data...</p>');

            $.ajax({
                url: "{{ url('proses-petugas') }}/" + id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    if (!data || data.error) {
                        $('#detailProsesPetugas').html(
                            '<p class="text-danger">Data tidak ditemukan.</p>');
                        return;
                    }

                    let html = `
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>${data.id}</td></tr>
                        <tr><th>Petugas ID</th><td>${data.petugas_id ?? '-'}</td></tr>
                        <tr><th>Laporan ID</th><td>${data.laporan_id ?? '-'}</td></tr>
                        <tr><th>Kendaraan ID</th><td>${data.kendaraan_id ?? '-'}</td></tr>
                        <tr><th>Awal</th><td>${data.awal ?? '-'}</td></tr>
                        <tr><th>Akhir</th><td>${data.akhir ?? '-'}</td></tr>
                        <tr><th>Kendala</th><td>${data.kendala ?? '-'}</td></tr>
                        <tr><th>Solusi</th><td>${data.solusi ?? '-'}</td></tr>
                        <tr><th>Status Proses</th><td>${data.status_proses ?? '-'}</td></tr>
                        <tr>
                        <th>Bukti</th>
                        <td>${data.bukti
                                ? `<img src="${data.bukti}" alt="Bukti" class="img-fluid" style="max-width: 150px;">`
                                : '-'}
                            </td>
                        </tr>
                        <tr>
                        <th>Keterangan</th><td>${data.keterangan ?? '-'}</td></tr>
                    </table>
                `;
                    $('#detailProsesPetugas').html(html);
                },
                error: function(xhr) {
                    if (xhr.status === 401 || (xhr.responseText && xhr.responseText.includes(
                            '<!DOCTYPE'))) {
                        $('#detailProsesPetugas').html(
                            '<p class="text-danger">Sesi login habis, silakan login ulang.</p>');
                    } else {
                        $('#detailProsesPetugas').html('<p class="text-danger">Gagal memuat data.</p>');
                        console.error("Error Response:", xhr.responseText);
                    }
                }
            });
        });
    </script>
@endpush
