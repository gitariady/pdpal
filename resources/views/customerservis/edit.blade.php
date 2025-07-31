@extends('adminlte::page')

@section('title', 'Edit Customer Servis')

@section('content_header')
    <h1>Edit Customer Servis</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('customerservis.update', $customerservis->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="pelanggan_id">Pelanggan</label>
                            <select name="pelanggan_id" id="pelanggan_id" class="form-control" required>
                                <option value="">-- Pilih Pelanggan --</option>
                                @foreach ($pelanggans as $p)
                                    <option value="{{ $p->id }}" {{ old('pelanggan_id', $customerservis->pelanggan_id) == $p->id ? 'selected' : '' }}>
                                        {{ $p->nama }} - {{ $p->pdpal_id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="servisable_type">Jenis Servis</label>
                            <select name="servisable_type" id="servisable_type" class="form-control" required>
                                <option value="TagihanPerbaikan" {{ old('servisable_type', $customerservis->servisable_type) == 'TagihanPerbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                <option value="BerhentiBerlangganan" {{ old('servisable_type', $customerservis->servisable_type) == 'BerhentiBerlangganan' ? 'selected' : '' }}>Berhenti Berlangganan</option>
                                <option value="TagihanPemasangan" {{ old('servisable_type', $customerservis->servisable_type) == 'TagihanPemasangan' ? 'selected' : '' }}>Pemasangan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="servisable_id">ID Servis</label>
                            <input type="number" class="form-control" name="servisable_id" id="servisable_id"
                                   value="{{ old('servisable_id', $customerservis->servisable_id) }}" min="1" required>
                        </div>

                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" name="catatan" id="catatan">{{ old('catatan', $customerservis->catatan) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('customerservis.index') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

