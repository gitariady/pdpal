<div>
    <button type="button" class="{{ $id ? 'btn btn-warning' : 'btn btn-primary' }}" data-toggle="modal"
        data-target="#formKategori{{ $id ?? '' }}">
        @if ($id)
        <i class="fas fa-edit"></i>
    @else
    Produk baru
        @endif    </button>
    <div class="modal fade" id="formKategori{{ $id ?? '' }}">
        <form action="{{ route('master-data.kategori.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $id ? 'Form Edit Kategori' : 'Form Tambah Kategori' }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                            value="{{$nama}}">
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"
                           > {{$deskripsi}}</textarea>
                           @error('deskripsi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </form>
    </div>
    <!-- /.modal -->
</div>
