@extends('adminlte::page')
@section('title', 'laporan Masuk')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark">Data Permintaan Pelayanan </h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"> <div class="d-flex justify-content-end">
                    <a href="{{ route('cetak.laporan') }}" target="_blank" class="btn btn-success btn-md mr-2">
                        <i class="fas fa-file-pdf"></i> View Laporan
                    </a>
                    <a href="{{ route('laporan.exportExcel') }}" class="btn btn-success btn-md mr-2">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </a>
                    @include('laporan._create')
                </div>
                <div class="card-body">
                    <x-alert :errors='$errors' type="warning" />
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table id="laporanTable" class="table table-bordered table-striped w-100">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Jenis Laporan</th>
                                <th>Status Pelaporan</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>KTP</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
<script>
    $(document).ready(function() {
        $('#laporanTable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,          // scroll horizontal
            scrollY: '300px',       // tinggi area scroll vertikal
            scrollCollapse: true,   // tetap aktif walau data < 5
            responsive: true,
            autoWidth: false,      // Matikan pagination (opsional)
            ajax: {
                url: "{{ route('get.laporan') }}",
                type: 'GET'
            },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'jenis_laporan', name: 'jenis_laporan'},
                    {data: 'status_pelaporan', name: 'status_pelaporan'},
                    {data: 'nama', name: 'nama'},
                    {data: 'no_hp', name: 'no_hp'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'ktp', name: 'ktp'},
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
@include('components.semua.laporan')

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
