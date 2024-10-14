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

                <div class="form-group">
                    <label>PERMISSION</label>

                    @foreach($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" wire:model="Getpermissions"
                            value="{{ $permission->id }}">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $permission->name }}
                        </label>
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</div>
