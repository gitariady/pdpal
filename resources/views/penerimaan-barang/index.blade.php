@extends('layouts.master')
@section('content_header')
    <h1 class="m-0 text-dark">Penerimaan Barang</h1>
@stop
@section('content_title', 'penerimaan barang')
@section('content')
    <div class="card">
        <form action="{{ route('penerimaan-barang.store') }}" method="POST" id="form-penerimaan-barang">
            @csrf
            <div id="data-hidden"></div>
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                <h4 class="h5">Data Penerimaan Barang</h4>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan Penerimaan Barang</button>
                </div>
            </div>
            <div class="card-body">
                <div class="w-50">
                    <div class="form-group my-1">
                        <label for="">Distributor</label>
                        <input type="text" name="distributor" id="distributor" class="form-control"
                            value="{{ old('distributor') }}">
                        @error('distributor')
                            <small class="text-danger">{{ $massage }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-1">
                        <label for="">Nomor Faktur</label>
                        <input type="text" name="nomor_faktur" id="nomor_faktur" class="form-control"
                            value="{{ old('nomor_faktur') }}">
                        @error('distributor')
                            <small class="text-danger">{{ $massage }}</small>
                        @enderror
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="w-100">
                        <label for="">Produk</label>
                        <select name="select2" id="select2" class="form-control"></select>
                    </div>
                    <div class="w-30">
                        <label for="">Stok Produk</label>
                        <input type="number" id="current_stok" class="form-control mx-1" style="width: 100px" readonly>
                    </div>
                    <div class="w-30">
                        <label for="">Qty</label>
                        <input type="number" id="qty" class="form-control mx-1" style="width: 100px" min="1">
                    </div>
                    <div class="w-30">
                        <label for="">Harga Beli</label>
                        <input type="number" id="harga_beli" class="form-control mx-1" style="width: 350px" min="1">
                    </div>
                    <div style="padding-top: 33px;" class="w-auto">
                        <button type="button" class="btn btn-dark" id="btn-add">Tambahkan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-sm" id="table-produk">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            let selectedProduct = {};
            $('#select2').select2({
                theme: "bootstrap",
                placeholder: 'Cari Produk . . . . .',
                ajax: {
                    url: "{{ route('get-data.produk') }}",
                    dataType: 'json',
                    delay: 250,
                    data: (params) => {
                        return {
                            search: params.term
                        }
                    },
                    processResults: (data) => {
                        data.forEach((item) => {
                            selectedProduct[item.id] = item;
                        })
                        return {
                            results: data.map((item) => {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    },
                    cache: true
                },
                minimumInputLength: 4,
            })

            $('#select2').on('change', function(e) {
                let id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('get-data.cek-stok') }}",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#current_stok').val(response);
                    }
                });
            });
            $('#btn-add').on('click', function() {
                const selectedId = $('#select2').val();
                const selectedText = $('#select2 option:selected').text();
                const qty = Number($('#qty').val());
                const hargaBeli = Number($('#harga_beli').val()); // perbaikan nama variabel
                const subTotal = qty * hargaBeli;

                if (!selectedId || !qty || !hargaBeli) {
                    alert('Harap pilih produk dan isi jumlah serta harga beli');
                    return;
                }

                let exist = false;
                $('#table-produk tbody tr').each(function() {
                    const rowProduk = $(this).find('td:first').text();
                    if (rowProduk === selectedText) {
                        let currentQty = parseInt($(this).find('td:eq(1)').text());
                        let newQty = currentQty + qty;
                        let newSubTotal = newQty * hargaBeli;

                        $(this).find('td:eq(1)').text(newQty);
                        $(this).find('td:eq(3)').text(newSubTotal); // update subtotal juga
                        exist = true;
                        return false;
                    }
                });

                if (!exist) {
                    const row = `
        <tr data-id="${selectedId}">
            <td>${selectedText}</td>
            <td>${qty}</td>
            <td>${hargaBeli}</td>
            <td>${subTotal}</td>
            <td>
                <button class="btn btn-danger btn-sm btn-remove">
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </td>
        </tr>`;
                    $('#table-produk tbody').append(row);
                }

                // reset form
                $('#select2').val(null).trigger('change');
                $('#qty').val(null);
                $('#harga_beli').val(null);
                $('#current_stok').val(null);
            });

            // hapus baris
            $('#table-produk').on('click', '.btn-remove', function() {
                $(this).closest('tr').remove();
            });

            // saat submit, generate input tersembunyi
            $("#form-penerimaan-barang").on("submit", function() {
                if ($('#table-produk tbody tr').length === 0) {
                    alert('Data penerimaan barang harus disi');
                    return false;
                }
                $("#data-hidden").html("");

                $("#table-produk tbody tr").each(function(index, row) {
                    const namaProduk = $(row).find("td:eq(0)").text();
                    const qty = $(row).find("td:eq(1)").text();
                    const hargaBeli = $(row).find("td:eq(2)").text();
                    const subTotal = $(row).find("td:eq(3)").text();
                    const produkId = $(row).data("id");

                    $("#data-hidden").append(`
            <input type="hidden" name="produk[${index}][produk_id]" value="${produkId}">
            <input type="hidden" name="produk[${index}][name]" value="${namaProduk}">
            <input type="hidden" name="produk[${index}][qty]" value="${qty}">
            <input type="hidden" name="produk[${index}][harga_beli]" value="${hargaBeli}">
            <input type="hidden" name="produk[${index}][sub_total]" value="${subTotal}">
        `);
                });
            });
        });
    </script>
@endpush
