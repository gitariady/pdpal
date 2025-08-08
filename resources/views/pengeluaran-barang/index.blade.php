@extends('layouts.master')

@section('content_header')
    <h1 class="m-0 text-dark">Pengeluaran Barang/Transaksi</h1>
@stop

@section('content_title', 'penerimaan barang')

@section('content')
    <div class="card">
        <x-alert :errors='$errors' type="danger" />
        <form action="{{ route('pengeluaran-barang.store') }}" method="POST" id="form-pengeluaran-barang">
            @csrf
            <div id="data-hidden"></div>
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                <h4 class="h5">Data Pengeluaran Barang</h4>
            </div>
            <div class="card-body">

                <div class="d-flex align-items-center">
                    <div class="w-100">
                        <label for="">Produk</label>
                        <select name="select2" id="select2" class="form-control"></select>
                    </div>
                    <div class="w-30">
                        <label for="">Stok Produk</label>
                        <input type="number" id="current_stok" class="form-control mx-1" style="width: 100px" readonly>
                    </div>
                    <div class="w-35">
                        <label for="">Harga Produk</label>
                        <input type="number" id="harga_jual" class="form-control mx-1" style="width: 100px" readonly>
                    </div>
                    <div class="w-30">
                        <label for="">Qty</label>
                        <input type="number" id="qty" class="form-control mx-1" style="width: 100px" min="1">
                    </div>
                    <div style="padding-top: 33px;" class="w-auto">
                        <button type="button" class="btn btn-dark" id="btn-add">Tambahkan</button>
                    </div>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <table class="table table-sm" id="table-produk">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>harga</th>
                                <th>Sub Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="number" id="total" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Kembalian</label>
                        <input type="number" id="kembalian" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Bayar</label>
                        <input type="number" id="bayar" name="bayar" class="form-control" min="1">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Simpan Transaksi</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            let selectedProduct = {};

            function hitungTotal() {
                let total = 0;
                $('#table-produk tbody tr').each(function() {
                    const subTotal = parseInt($(this).find('td:eq(3)').text()) || 0;
                    total += subTotal;
                });
                $('#total').val(total);
            }
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
                minimumInputLength: 2,
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
                $.ajax({
                    type: "GET",
                    url: "{{ route('get-data.cek-harga') }}",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#harga_jual').val(response);
                    }
                });
            });
            $('#btn-add').on('click', function() {
                const selectedId = $('#select2').val();
                const selectedText = $('#select2 option:selected').text();
                const qty = Number($('#qty').val());
                const hargaJual = Number($('#harga_jual').val());
                const subTotal = qty * hargaJual;

                if (!selectedId || !qty || !hargaJual) {
                    alert('Harap pilih produk, qty, dan pastikan harga terisi');
                    return;
                }

                const currentStok = Number($('#current_stok').val());
                if (qty > currentStok) {
                    alert('Stok produk tidak mencukupi');
                    return;
                }

                let exist = false;
                $('#table-produk tbody tr').each(function() {
                    const rowProduk = $(this).find('td:first').text();
                    if (rowProduk === selectedText) {
                        let currentQty = Number($(this).find('td:eq(1)').text());
                        let newQty = currentQty + qty;
                        $(this).find('td:eq(1)').text(newQty);

                        const hargaSatuan = Number($(this).find('td:eq(2)').text());
                        let newSubTotal = newQty * hargaSatuan;
                        $(this).find('td:eq(3)').text(newSubTotal);

                        exist = true;
                        return false;
                    }
                });

                if (!exist) {
                    const row = `
        <tr data-id="${selectedId}">
            <td>${selectedText}</td>
            <td>${qty}</td>
            <td>${hargaJual}</td>
            <td>${subTotal}</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm btn-remove">
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </td>
        </tr>`;
                    $('#table-produk tbody').append(row);
                }

                $('#select2').val(null).trigger('change');
                $('#qty').val(null);
                $('#current_stok').val(null);
                $('#harga_jual').val(null);
                hitungTotal();
            });

            $('#table-produk').on('click', '.btn-remove', function() {
                $(this).closest('tr').remove();
                hitungTotal();
            });

            $("#form-pengeluaran-barang").on("submit", function() {
                $("#data-hidden").html("");
                $("#table-produk tbody tr").each(function(index, row) {
                    const namaProduk = $(row).find("td:eq(0)").text();
                    const qty = $(row).find("td:eq(1)").text();
                    const produkId = $(row).data("id");
                    const hargaJual = $(row).find("td:eq(2)").text();
                    const subTotal = $(row).find("td:eq(3)").text();

                    $("#data-hidden").append(`
            <input type="hidden" name="produk[${index}][produk_id]" value="${produkId}">
            <input type="hidden" name="produk[${index}][name]" value="${namaProduk}">
            <input type="hidden" name="produk[${index}][qty]" value="${qty}">
            <input type="hidden" name="produk[${index}][harga_jual]" value="${hargaJual}">
            <input type="hidden" name="produk[${index}][sub_total]" value="${subTotal}">
        `);
                });
            });
            $('#bayar').on('input', function() {
                const total = parseInt($('#total').val()) || 0;
                const bayar = parseInt($(this).val()) || 0;
                const kembalian = bayar - total;
                $('#kembalian').val(kembalian);
            });
        });
    </script>
@endpush

