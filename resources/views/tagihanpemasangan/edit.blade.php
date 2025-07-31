@extends('adminlte::page')
@section('title', 'Edit Tagihan Pemasangan')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Tagihan Pemasangan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tagihanpemasangan.update', $tagihanpemasangan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="proses_petugas_id">Proses Petugas</label>
                            <select class="form-control" name="proses_petugas_id" id="proses_petugas_id">
                                <option value="">--Pilih Proses Petugas--</option>
                                @foreach ($prosespetugas as $prosespetugas)
                                    <option value="{{ $prosespetugas->id }}" {{ $tagihanpemasangan->proses_petugas_id == $prosespetugas->id ? 'selected' : '' }}>{{ $prosespetugas->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bukti_tagihan">Bukti Tagihan</label>
                            <input type="file" class="form-control-file" name="bukti_tagihan" id="bukti_tagihan" placeholder="Masukkan Bukti Tagihan">
                            @if($tagihanpemasangan->bukti_tagihan)
                                <img src="{{ asset('storage/' . $tagihanpemasangan->bukti_tagihan) }}" alt="Bukti Tagihan" style="width: 80px;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="bukti_bayar">Bukti Bayar</label>
                            <input type="file" class="form-control-file" name="bukti_bayar" id="bukti_bayar" placeholder="Masukkan Bukti Bayar">
                            @if($tagihanpemasangan->bukti_bayar)
                                <img src="{{ asset('storage/' . $tagihanpemasangan->bukti_bayar) }}" alt="Bukti Bayar" style="width: 80px;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="status">Metode Pembayaran</label>
                            <select class="form-control" name="metode" id="metode" >
                                <option value="">--Pilih Status--</option>
                                <option value="Virtual Akun" {{ $tagihanpemasangan->metode == 'Virtual Akun' ? 'selected' : '' }}>Virtual Akun</option>
                                <option value="Bayar Cash" {{ $tagihanpemasangan->metode == 'Bayar Cash' ? 'selected' : '' }}>Bayar Cash</option>
                                <option value="Transfer Antar Bank" {{ $tagihanpemasangan->metode == 'Transfer Antar Bank' ? 'selected' : '' }}>Transfer Antar Bank</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total">Total Pengembalian</label>
                            <input type="number" class="form-control" name="total" id="total" min="1" placeholder="Masukkan Total" min="1" value="{{ $tagihanpemasangan->total }}" >
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" required>{{ $tagihanpemasangan->keterangan }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('tagihanpemasangan.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

