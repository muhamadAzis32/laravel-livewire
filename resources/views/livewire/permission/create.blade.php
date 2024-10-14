<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="form-group">
                    <label>NAME</label>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukkan name">
                    @error('name')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</div>
