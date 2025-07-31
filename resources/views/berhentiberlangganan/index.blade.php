@extends('adminlte::page')
@section('title', 'Berhenti berlangganan')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark">Data Berhenti berlangganan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('cetak.berhentiberlangganan') }}" target="_blank" class="btn btn-success btn-md mr-2">
                            <i class="fas fa-file-pdf"></i> View Laporan
                        </a>
                        @include('berhentiberlangganan.create')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Petugas</th>
                                <th>Bukti Berhenti</th>
                                <th>Bukti PDAM</th>
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
        var table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollY: '300px',     // Tinggi area scroll (sesuaikan)
            scrollCollapse: true, // Aktifkan scroll collapse
            // paging: false,        // Matikan pagination (opsional)
            ajax: {
                    url: "{{ route('get.berhentiberlangganan') }}",
                    type: 'GET'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nama_petugas', name: 'petugaspelayanan.nama'}, // tampilkan nama petugas
                    {data: 'bukti_berhenti', name: 'bukti_berhenti'},
                    {data: 'bukti_pdam', name: 'bukti_pdam'},
                    {data: 'ktp', name: 'ktp'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush
