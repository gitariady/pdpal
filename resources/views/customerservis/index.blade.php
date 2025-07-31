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
@stop
{{-- @push('js')
    <script>
        $(document).ready(function() {
    $('.table').DataTable({
        processing: true,
        serverSide: true, --}}

@push('js')
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
});

    </script>
@endpush

