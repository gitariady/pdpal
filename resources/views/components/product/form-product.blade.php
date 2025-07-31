<div>
    <button type="button" class="{{ $id ? 'btn btn-warning' : 'btn btn-primary' }}" data-toggle="modal"
    data-target="#formProduct{{ $id ?? '' }}">
    @if ($id)
    <i class="fas fa-edit"></i>
@else
Produk baru
    @endif
</button>
      <div class="modal fade" id="formProduct{{$id ?? ''}}">
        <form action="{{ route('master-data.product.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{ $id ? 'Form Edit Product' : 'Form Tambah Product' }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group my-1">
                    <label for="">Nama Produk</label>
                    <input type="text" name="name" id="name" class="form-control"
                    value="{{$id ? $name : old('$name')}}">
                </div>
                <div class="form-group my-1">
                    <label for="">Kategori Produk</label>
                    <select name="kategori_id" id="kategori_id" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $item)
                        <option value="{{$item->id}}" {{ $kategori_id == $item->id || old('kategori_id') == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-1">
                    <label for="">Harga Jual</label>
                    <input type="number" name="harga_jual" id="harga_jual" class="form-control"
                    value="{{$id ? $harga_jual : old('$harga_jual')}}">
                </div>
                <div class="form-group my-1">
                    <label for="">Harga Beli</label>
                    <input type="number" name="harga_beli" id="harga_beli" class="form-control"
                    value="{{$id ? $harga_beli : old('$harga_beli')}}">
                </div>
                <div class="form-group my-1">
                    <label for="">Stok Tersedia</label>
                    <input type="number" name="stok" id="stok" class="form-control"
                    value="{{$id ? $stok : old('$stok')}}" min="1">
                </div>
                <div class="form-group my-1">
                    <label for="">Stok Minimal</label>
                    <input type="number" name="stok_min" id="stok_min" cols="30" rows="10" class="form-control"
                    value= "{{$id ? $stok_min : old('$stok_min')}}" min="1">
                </div>
                  <div class="form-group my-1">
                      <label for="">Produk Aktif ?</label>&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="is_active" id="is_active"
                      {{ old('is_active', $id ? $is_active :false)? 'checked' : ''}}>
                    <small class="d-block mt-1">Jika Aktif maka produk dapat dijual</small>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </form>
      </div>
      <!-- /.modal -->
    </div>