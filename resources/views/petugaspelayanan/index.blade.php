@extends('adminlte::page')
@section('title', 'petugas pelayanan')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark">Data petugas pelayanan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                    @include('petugaspelayanan._create')
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table id="petugasTable" class="table table-bordered table-striped w-100">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIP</th>
                                <th>Nama petugas</th>
                                {{-- <th>Jabatan</th> --}}
                                <th>Bidang</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Alamat</th>
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
        $('#petugasTable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,          // scroll horizontal
            scrollY: '300px',       // tinggi area scroll vertikal
            scrollCollapse: true,   // tetap aktif walau data < 5
            responsive: true,
            autoWidth: false,
                ajax: {
                    url: "{{ route('get.petugaspelayanan') }}",
                    type: 'GET'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nip', name: 'nip'},
                    {data: 'nama', name: 'nama'},
                    // {data: 'jabatan', name: 'jabatan'},
                    {data: 'bidang', name: 'bidang'},
                    {data: 'no_hp', name: 'no_hp'},
                    {data: 'email', name: 'email'},
                    {data: 'alamat', name: 'alamat'},
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
