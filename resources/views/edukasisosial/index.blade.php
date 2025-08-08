@extends('adminlte::page')
@section('title', 'edukasi sosial')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark">Data edukasi sosial</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('cetak.edukasisosial') }}" target="_blank" class="btn btn-success btn-md mr-2">
                            <i class="fas fa-file-pdf"></i> View Laporan
                        </a>
                        <a href="{{ route('edukasisosial.exportExcel') }}" class="btn btn-success btn-md mr-2">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>
                        @include('edukasisosial.create')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Petugas</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tempat acara</th>
                                    <th>Materi Pembelajaran</th>
                                    <th>Poin</th>
                                    <th>Mini Hadir 5</th>
                                    <th>Tanggapan</th>
                                    <th>Absen hadir</th>
                                    <th>Bukti Kegiatan</th>
                                    <th>Absensi Hadir</th>
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
            scrollX: true,          // scroll horizontal
            scrollY: '500px',       // tinggi area scroll vertikal
            scrollCollapse: true,   // tetap aktif walau data < 5
            // paging: false,          // matikan pagination
            responsive: true,
            autoWidth: false,       // Matikan pagination (opsional)
                ajax: {
                        url: "{{ route('get.edukasisosial') }}",
                        type: 'GET'
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'nama_petugas', name: 'petugasPelayanan.nama'},
                        { data: 'nama_kegiatan', name: 'nama_kegiatan' },
                        { data: 'tempat', name: 'tempat' },
                        { data: 'materi', name: 'materi' },
                        { data: 'point', name: 'point' },
                        { data: 'orang', name: 'orang' },
                        { data: 'tanggapan', name: 'tanggapan' },
                        { data: 'keterangan', name: 'keterangan' },
                        { data: 'bukti_kegiatan', name: 'bukti_kegiatan' },
                        { data: 'absensi', name: 'absensi' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
    @endpush
