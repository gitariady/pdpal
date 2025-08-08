{{-- ini _action.blade.php --}}

    @if(auth()->check() && auth()->user()->level === 'supervisor')
        <form action="{{ $url_destroy }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">
                Hapus
            </button>
        </form>
    @endif
</div>


