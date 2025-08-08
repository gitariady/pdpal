<button type="button mb-3" class="btn btn-warning" data-toggle="modal" data-target="#modalCreate">
    Kritik Saran
</button>
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateLabel">Form Kritik Saran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kritiksaran.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Masukkan Nama" required maxlength="50">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Masukkan Email" required maxlength="50">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">No HP</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                            placeholder="Masukkan No HP" required maxlength="15">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <input type="text" class="form-control" name="subject" id="subject"
                            placeholder="Masukkan Subjek" required maxlength="225">
                        @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea class="form-control" name="message" id="message" placeholder="Masukkan Pesan" rows="3" required
                            maxlength="225"></textarea>
                        @error('message')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
