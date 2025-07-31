@extends('adminlte::page')

@section('title', 'Edit tagihan no pelanggan')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Data tagihan no pelanggan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('tagihannopelanggan.update' , $tagihannopelanggan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group my-1">
                            <label for="proses_petugas_id">Proses Petugas</label>
                            <select class="form-control" name="proses_petugas_id" id="proses_petugas_id">
                                <option value="">--Pilih Proses Petugas--</option>
                                @foreach ($prosespetugas as $prosespetugas)
                                    <option value="{{ $prosespetugas->id }}" {{ $tagihannopelanggan->proses_petugas_id == $prosespetugas->id ? 'selected' : '' }}>{{ $prosespetugas->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-1">
                            <label for="bukti_tagihan">Bukti Tagihan</label>
                            @if ($tagihannopelanggan->bukti_tagihan && Storage::disk('public')->exists($tagihannopelanggan->bukti_tagihan))
                                <p><a href="{{ asset('storage/' . $tagihannopelanggan->bukti_tagihan) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $tagihannopelanggan->bukti_tagihan) }}" width="80" />
                                </a></p>
                            @endif
                            <input type="file" class="form-control" name="bukti_tagihan" id="bukti_tagihan" placeholder="Masukkan Bukti Tagihan" value="{{ $tagihannopelanggan->bukti_tagihan }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="metode">Metode Pembayaran</label>
                            <select class="form-control" name="metode" id="metode" required>
                                <option value="">--Pilih Metode--</option>
                                <option value="Virtual Akun" {{ $tagihannopelanggan->metode == 'Virtual Akun' ? 'selected' : '' }}>Virtual Akun</option>
                                <option value="Bayar Cash" {{ $tagihannopelanggan->metode == 'Bayar Cash' ? 'selected' : '' }}>Bayar Cash</option>
                                <option value="Transfer Antar Bank" {{ $tagihannopelanggan->metode == 'Transfer Antar Bank' ? 'selected' : '' }}>Transfer Antar Bank</option>
                            </select>
                        </div>
                        <div class="form-group my-1">
                            <label for="total">Total</label>
                            <input value="{{ $tagihannopelanggan->total }}" type="number" class="form-control" name="total" id="total" placeholder="Masukkan Total" min="1">
                        </div>
                        <div class="form-group my-1">
                            <label for="keterangan">Keterangan</label>
                            <input value="{{ $tagihannopelanggan->keterangan }}" type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('tagihannopelanggan.index') }}" class="btn btn-danger">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

