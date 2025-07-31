@extends('adminlte::page')

@section('title', 'edit tagihan Penyedotan')

@section('content_header')
    <h1 class="m-0 text-dark">Data tagihan Penyedotan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('tagihanpenyedotan.update' , $tagihanpenyedotan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="proses_petugas_id">Proses Petugas</label>
                            <select class="form-control" name="proses_petugas_id" id="proses_petugas_id">
                                <option value="">--Pilih Proses Petugas--</option>
                                @foreach ($prosesPetugas as $prosesPetugas)
                                    <option value="{{ $prosesPetugas->id }}" {{ $prosesPetugas->id == $tagihanpenyedotan->proses_petugas_id ? 'selected' : '' }}>
                                        {{ $prosesPetugas->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Bangunan</label>
                            <select class="form-control" name="bangunan_id" id="bangunan_id">
                                <option value="">--Pilih Proses Bangunan--</option>
                                @foreach ($bangunan as $bangunan)
                                    <option value="{{ $bangunan->id }}" {{ $bangunan->id == $tagihanpenyedotan->bangunan_id ? 'selected' : '' }}>
                                        {{ $bangunan->nama_bangunan }} -{{ $bangunan->biaya }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Bukti Tagihan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Lihat</span>
                                </div>
                                <a href="{{ asset('storage/' . $tagihanpenyedotan->bukti_tagihan) }}" target="_blank" class="form-control">
                                    {{ $tagihanpenyedotan->bukti_tagihan }}
                                </a>
                            </div>
                            <input type="file" class="form-control-file" name="bukti_tagihan" id="bukti_tagihan" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="">Bukti Bayar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Lihat</span>
                                </div>
                                <a href="{{ asset('storage/' . $tagihanpenyedotan->bukti_bayar) }}" target="_blank" class="form-control">
                                    {{ $tagihanpenyedotan->bukti_bayar }}
                                </a>
                            </div>
                            <input type="file" class="form-control-file" name="bukti_bayar" id="bukti_bayar" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="">Metode Pembayaran</label>
                            <select class="form-control" name="metode" id="Metode" required>
                                <option value="">--Pilih Metode Bayar--</option>
                                <option value="Virtual Akun" {{ $tagihanpenyedotan->metode == 'Virtual Akun' ? 'selected' : '' }}>Virtual Akun</option>
                                <option value="Bayar Cash" {{ $tagihanpenyedotan->metode == 'Bayar Cash' ? 'selected' : '' }}>Bayar Cash</option>
                                <option value="Transfer Antar Bank" {{ $tagihanpenyedotan->metode == 'Transfer Antar Bank' ? 'selected' : '' }}>Transfer Antar Bank</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Total Pembayaran</label>
                            <input type="number" class="form-control" name="total" id="total" placeholder="Masukkan Total" value="{{ $tagihanpenyedotan->total }}" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Total" required>{{ $tagihanpenyedotan->keterangan }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('tagihanpenyedotan.index') }}" class="btn btn-danger">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
