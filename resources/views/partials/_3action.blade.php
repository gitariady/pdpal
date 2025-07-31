{{-- ini _action.blade.php --}}
<div class="btn-group" role="group">
    <a href="{{ $url_show }}" class="btn btn-info btn-sm mr-2 d-flex align-items-center justify-content-center">
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ $url_edit }}" class="btn btn-primary btn-sm mr-2 d-flex align-items-center justify-content-center">
        <i class="fa fa-edit"></i>
    </a>
    <form action="{{ $url_destroy }}" method="POST" class="d-inline m-0 p-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
            <i class="fa fa-trash"></i>
        </button>
    </form>
</div>



