@extends('adminlte::page')
@section('title', 'tagihan pemasangan')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark">Data Tagihan Pemasangan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                    <a href="{{ route('cetak.tagihanpemasangan') }}" target="_blank" class="btn btn-success btn-md mr-2">
                        <i class="fas fa-file-pdf"></i> View Laporan
                    </a>
                    {{-- <a  class="btn btn-success btn-md mr-2">
                        <i class="fas fa-file-excel"></i> Export Excel
                        href="{{ route('tagihanpemasangan.exportExcel') }}"
                    </a> --}}
                    @include('tagihanpemasangan.create')
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Proses Petugas ID</th>
                                <th>Bukti Tagihan</th>
                                <th>Bukti Bayar</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
     {{-- Modal Detail Proses Petugas --}}
     <div class="modal fade" id="modalDetailProses" tabindex="-1" role="dialog" aria-labelledby="modalDetailProsesLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalDetailProsesLabel">Detail Proses Petugas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body" id="detailProsesContent">
                 <p>Memuat data...</p>
             </div>
         </div>
     </div>
 </div>
@stop

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
            scrollCollapse: true, // Aktifkan scroll collapse
            // paging: false,        // Matikan pagination (opsional)
                ajax: {
                    url: "{{ route('get.tagihanpemasangan') }}",
                    type: 'GET'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'proses_petugas_id', name: 'proses_petugas_id'},
                    {data: 'bukti_tagihan', name: 'bukti_tagihan'},
                    {data: 'bukti_bayar', name: 'bukti_bayar'},
                    {data: 'metode', name: 'metode'},
                    {data: 'total', name: 'total'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
             // Select2 untuk proses_petugas_id
        function initSelect2(selector, url, placeholder) {
            $(selector).select2({
                theme: 'bootstrap',
                placeholder: placeholder,
                minimumInputLength: 0,
                ajax: {
                    url: url,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return { search: params.term || '' };
                    },
                    processResults: function(data) {
                        return { results: data };
                    },
                    cache: true
                }
            });
        }
        initSelect2('#proses_petugas_id', "{{ route('prosespetugas.search') }}", '-- Cari ID Proses Petugas --');

        // Tombol Detail Proses
        $(document).on('click', '#btn-detail-proses', function () {
            let id = $('#proses_petugas_id').val();
            if (!id) {
                alert('Pilih Proses Petugas terlebih dahulu!');
                return;
            }

            $.get("{{ url('/prosespetugas') }}/" + id + "/detail", function (data) {
                $('#detailProsesContent').html(`
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> ${data.id}</li>
                        <li class="list-group-item"><strong>Petugas:</strong> ${data.petugaspelayanan?.nama ?? '-'}</li>
                        <li class="list-group-item"><strong>Laporan:</strong> ${data.laporan?.jenis_laporan ?? '-'}</li>
                        <li class="list-group-item"><strong>Status:</strong> ${data.status_proses ?? '-'}</li>
                        <li class="list-group-item"><strong>Tanggal Mulai:</strong> ${data.awal ?? '-'}</li>
                        <li class="list-group-item"><strong>Tanggal Selesai:</strong> ${data.akhir ?? '-'}</li>
                    </ul>
                `);
                $('#modalDetailProses').modal('show');
            }).fail(function () {
                alert('Data tidak ditemukan!');
            });
        });
    });
    </script>
@endpush
