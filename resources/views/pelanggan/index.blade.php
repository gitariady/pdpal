@extends('adminlte::page')
@section('title', 'Pelanggan')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark">Data Pelanggan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('cetak.pelanggan') }}" target="_blank" class="btn btn-success btn-md mr-2">
                            <i class="fas fa-file-pdf"></i> View Laporan
                        </a>
                        <a href="{{ route('pelanggan.export.excel') }}" class="btn btn-success btn-md mr-2">
                            <i class="fa fa-file-excel"></i> Export Excel
                        </a>
                        @include('pelanggan.create')
                    </div>
                </div>
                <div class="card-body">
                    <x-alert :errors='$errors' type="warning" />
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table id="pelangganTable" class="table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>PDPAL ID</th>
                                    <th>Nama</th>
                                    <th>Bangunan</th>
                                    <th>Alamat</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
<script>
    $(document).ready(function() {
        $('#pelangganTable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,          // scroll horizontal
            scrollY: '300px',       // tinggi area scroll vertikal
            scrollCollapse: true,   // tetap aktif walau data < 5
            responsive: true,
            autoWidth: false,      // Matikan pagination (opsional)
            ajax: {
                    url: "{{ route('get.pelanggan') }}",
                    type: 'GET'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'pdpal_id', name: 'pdpal_id'},
                    {data: 'nama', name: 'nama'},
                    {data: 'bangunan', name: 'bangunan'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'waktu', name: 'waktu'},
                    {data: 'status', name: 'status'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
            language: {
                paginate: {
                    previous: "<",
                    next: ">"
                }
            }
        });
    });
</script>
@endpush
{{-- Panggil modal reusable --}}
@include('components.semua.showpelanggan')

@push('css')
<style>
    /* Pastikan hanya tabel yang bisa di-scroll */
    .dataTables_wrapper {
        overflow-x: hidden;
    }

    .table-responsive {
        overflow-x: auto;
    }

    /* Styling pagination & search agar tetap rapi */
    .dataTables_length,
    .dataTables_filter {
        margin-bottom: 10px;
    }
</style>
@endpush
