

<!-- Modal -->
<div class="modal fade" id="modalEditAdmin" tabindex="-1" role="dialog" aria-labelledby="modalEditAdminLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditAdminLabel">Form Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('users.ganti-password' , $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group my-1">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="old_password" id="password" >
                    </div>
                    @error('old_password')
                    <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                    <div class="form-group my-1">
                        <label for="password">Password baru</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                    </div>
                    @error('password')
                    <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                    <div class="form-group my-1">
                        <label for="password_confirmation">Konfirmasi Password *</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukkan Konfirmasi Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
