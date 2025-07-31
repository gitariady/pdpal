@extends('adminlte::page')

@section('title', 'Konsultasi')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Konsultasi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('cetak.konsultasi') }}" target="_blank" class="btn btn-success btn-md mr-2">
                        <i class="fas fa-file-pdf"></i> View Laporan
                    </a>
                    @include('konsultasi.create')
                </div>

                <div class="card-body">
                    <x-alert :errors='$errors' type="warning" />
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table id="konsultasiTable" class="table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Petugas</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Bangunan</th>
                                    <th>Luas Bangunan</th>
                                    <th>Jumlah Penghuni</th>
                                    <th>Pertanyaan</th>
                                    <th>Keterangan</th>
                                    <th>Bukti konsultasi</th>
                                    <th>KTP</th>
                                    <th>Status</th>
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
        $('#konsultasiTable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,          // scroll horizontal
            scrollY: '500px',       // tinggi area scroll vertikal
            scrollCollapse: true,   // tetap aktif walau data < 5
            // paging: false,          // matikan pagination
            responsive: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('get.konsultasi') }}",
                type: 'GET'
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_petugas', name: 'petugasPelayanan.nama' },
                { data: 'nama', name: 'nama' },
                { data: 'email', name: 'email' },
                { data: 'no_hp', name: 'no_hp' },
                { data: 'bangunan', name: 'bangunan' },
                { data: 'luas_bangunan', name: 'luas_bangunan' },
                { data: 'orang', name: 'orang' },
                { data: 'pertanyaan', name: 'pertanyaan' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'bukti_konsultasi', name: 'bukti_konsultasi' },
                { data: 'ktp', name: 'ktp' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
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
