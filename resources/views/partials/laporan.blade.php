<div class="btn-group" role="group" aria-label="Actions">
    {{-- Tombol Detail Modal --}}
    <button type="button"
        class="btn btn-sm btn-info btn-laporan d-flex align-items-center justify-content-center"
        data-id="{{ $model->id }}">
        <i class="fa fa-eye"></i>
    </button>

    {{-- Tombol Edit --}}
    <a href="{{ $url_edit }}" class="btn btn-sm btn-primary d-flex align-items-center justify-content-center">
        <i class="fa fa-edit"></i>
    </a>

    {{-- Tombol Hapus --}}
    <form action="{{ $url_destroy }}" method="POST" class="d-inline m-0 p-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center justify-content-center" onclick="return confirm('Yakin hapus?')">
            <i class="fa fa-trash"></i>
        </button>
    </form>
</div>
