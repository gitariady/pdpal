@extends('adminlte::page')
@section('title', 'Customer Servis')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark">Data Customer Servis</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                    <a href="{{ route('cetak.customerservis') }}" target="_blank" class="btn btn-success btn-md mr-2">
                        <i class="fas fa-file-pdf"></i> View Laporan</a>
                    <a href="{{ route('customerservis.exportExcel') }}" class="btn btn-success btn-md mr-2">
                        <i class="fas fa-file-excel"></i> Export Excel </a>
                    @include('customerservis.create')
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Pelanggan</th>
                                <th>ID Servis</th>
                                <th>Tipe Servis</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDetailPelanggan" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailLabel">Detail Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detailPelangganContent">
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
        var table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollY: '300px',     // Tinggi area scroll (sesuaikan)
            scrollCollapse: true,
        ajax: "{{ route('get.customerservis') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'pelanggan_nama', name: 'pelanggan.nama'},
            {data: 'servisable_id', name: 'servisable_id'},
            {data: 'servisable_type', name: 'servisable_type'},
            {data: 'catatan', name: 'catatan'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    // --- Select2 untuk pelanggan ---
    $('#pelanggan_id').select2({
        theme: 'bootstrap',
        placeholder: '-- Cari pelanggan --',
        minimumInputLength: 0,
        dropdownParent: $('#modalTambahCustomerServis'),
        ajax: {
            url: "{{ route('pelanggan.search') }}",
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

    // --- Tombol Detail pelanggan ---
    $(document).on('click', '#btn-detail-pelanggan', function() {
        let id = $('#pelanggan_id').val();
        if (!id) {
            alert('Pilih pelanggan terlebih dahulu!');
            return;
        }

        $.get("{{ url('/pelanggan') }}/" + id + "/detail", function (data) {
            $('#detailPelangganContent').html(`
                <ul class="list-group">
                    <li class="list-group-item"><strong>ID:</strong> ${data.id}</li>
                    <li class="list-group-item"><strong>PDPAL ID</strong> ${data.pdpal_id ?? '-'}</li>
                    <li class="list-group-item"><strong>Nama pelanggan:</strong> ${data.nama ?? '-'}</li>
                    <li class="list-group-item"><strong>Waktu Daftar:</strong> ${data.waktu ?? '-'}</li>
                    <li class="list-group-item"><strong>Status:</strong> ${data.status ?? '-'}</li>
                    <li class="list-group-item"><strong>Keterangan:</strong> ${data.keterangan ?? '-'}</li>
                </ul>
            `);
            $('#modalDetailPelanggan').modal('show');
        }).fail(function(xhr) {
            alert('Data tidak ditemukan!');
            console.error(xhr.responseText);
        });
    });
});
    </script>
@endpush

