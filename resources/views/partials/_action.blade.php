{{-- ini _action.blade.php --}}
    <a href="{{ $url_edit }}" class="btn btn-primary btn-sm mr-2 ">
        <i class="fa fa-edit"></i>
    </a>
    <form action="{{ $url_destroy }}" method="POST" class="d-inline m-0 p-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
            <i class="fa fa-trash"></i>
        </button>
    </form>
</div>


