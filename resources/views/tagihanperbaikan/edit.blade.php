@extends('adminlte::page')

@section('title', 'Edit Data perbaikan')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Data perbaikan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tagihanperbaikan.update', $tagihanperbaikan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="proses_petugas_id">Proses Petugas</label>
                            <select class="form-control" name="proses_petugas_id" id="proses_petugas_id">
                                <option value="">--Pilih Proses Petugas--</option>
                                @foreach ($prosesPetugas as $prosesPetugas)
                                    <option value="{{ $prosesPetugas->id }}" {{ $prosesPetugas->id == $tagihanperbaikan->proses_petugas_id ? 'selected' : '' }}>
                                        {{ $prosesPetugas->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bukti_tagihan">Bukti Tagihan</label>
                            <input type="file" class="form-control-file" name="bukti_tagihan" id="bukti_tagihan" placeholder="Masukkan Bukti Tagihan">
                            @if ($tagihanperbaikan->bukti_tagihan)
                                <p><a href="{{ asset('storage/' . $tagihanperbaikan->bukti_tagihan) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $tagihanperbaikan->bukti_tagihan) }}" width="80" />
                                </a></p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="bukti_bayar">Bukti Bayar</label>
                            <input type="file" class="form-control-file" name="bukti_bayar" id="bukti_bayar" placeholder="Masukkan Bukti Tagihan">
                            @if ($tagihanperbaikan->bukti_bayar)
                                <p><a href="{{ asset('storage/' . $tagihanperbaikan->bukti_bayar) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $tagihanperbaikan->bukti_bayar) }}" width="80" />
                                </a></p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="metode">Metode Pembayaran</label>
                            <select class="form-control" name="metode" id="Metode">
                                <option value="">--Pilih Metode Bayar--</option>
                                <option value="Virtual Akun" {{ $tagihanperbaikan->metode == 'Virtual Akun' ? 'selected' : '' }}>Virtual Akun</option>
                                <option value="Bayar Cash" {{ $tagihanperbaikan->metode == 'Bayar Cash' ? 'selected' : '' }}>Bayar Cash</option>
                                <option value="Transfer Antar Bank" {{ $tagihanperbaikan->metode == 'Transfer Antar Bank' ? 'selected' : '' }}>Transfer Antar Bank</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total">Total Pembayaran</label>
                            <input type="number" class="form-control" name="total" id="total" value="{{ $tagihanperbaikan->total }}" placeholder="Masukkan Total" min="1">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Total">{{ $tagihanperbaikan->keterangan }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('tagihanperbaikan.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

