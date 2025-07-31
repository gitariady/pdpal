@extends('adminlte::page')

@section('title', 'Kinerja Petugas')

@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Kinerja Petugas</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('cetak.kinerjapetugas') }}" target="_blank" class="btn btn-success btn-md mr-2">
                        <i class="fas fa-file-pdf"></i> View Laporan
                    </a>
                    @include('kinerjapetugas.create') {{-- Modal Create --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="kinerjaTable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Petugas</th>
                                <th>Laporan</th>
                                <th>Kegiatan Kerja</th>
                                <th>Ketepatan Waktu</th>
                                <th>Kepuasan Masyarakat</th>
                                <th>Sikap Kerja</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDetailLaporan" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detailLaporanContent">
                Memuat data...
            </div>
        </div>
    </div>
</div>
@endsection



@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-theme@0.1.0-beta.10/dist/select2-bootstrap.min.css" rel="stylesheet" />
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {

    // --- DataTables ---
    $('#kinerjaTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        pageLength: 5,
        ajax: { url: "{{ route('get.kinerjapetugas') }}", type: 'GET' },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'nama_petugas', name: 'petugasPelayanan.nama'},
            {data: 'jenis_laporan', name: 'laporan.jenis_laporan'},
            {data: 'kegiatan_kerja', name: 'kegiatan_kerja'},
            {data: 'ketepatan_waktu', name: 'ketepatan_waktu'},
            {data: 'kepuasan_masyarakat', name: 'kepuasan_masyarakat'},
            {data: 'sikap_kerja', name: 'sikap_kerja'},
            {data: 'nilai_total', name: 'nilai_total'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    // --- Select2 untuk laporan ---
    $('#laporan_id').select2({
        theme: 'bootstrap',
        placeholder: '-- Cari Laporan --',
        minimumInputLength: 0,
        dropdownParent: $('#modal-add-kinerja-petugas'),
        ajax: {
            url: "{{ route('laporan.search') }}",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return { search: params.term || '', limit: 5 };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return { id: item.id, text: "ID : " + item.id + " - " + item.nama };
                    })
                };
            },
            cache: true
        },
        allowClear: true,
        width: '100%'
    });

    // --- Tombol Detail Laporan ---
    $(document).on('click', '#btn-detail-laporan', function() {
        let id = $('#laporan_id').val();
        if (!id) {
            alert('Pilih laporan terlebih dahulu!');
            return;
        }

        $.get("{{ url('/laporan') }}/" + id + "/detail", function (data) {
            $('#detailLaporanContent').html(`
                <ul class="list-group">
                    <li class="list-group-item"><strong>ID:</strong> ${data.id}</li>
                    <li class="list-group-item"><strong>Nama Laporan:</strong> ${data.nama ?? '-'}</li>
                    <li class="list-group-item"><strong>Jenis Laporan:</strong> ${data.jenis_laporan ?? '-'}</li>
                    <li class="list-group-item"><strong>Status:</strong> ${data.status_pelaporan ?? '-'}</li>
                    <li class="list-group-item"><strong>Keterangan:</strong> ${data.keterangan ?? '-'}</li>
                </ul>
            `);
            $('#modalDetailLaporan').modal('show');
        }).fail(function(xhr) {
            alert('Data tidak ditemukan!');
            console.error(xhr.responseText);
        });
    });
});
</script>
@endpush
