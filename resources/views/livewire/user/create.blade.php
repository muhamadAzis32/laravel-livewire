<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="form-group">
                    <label>NAME</label>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan name">
                    @error('name')
                        <span class="invalid-feedback">
                                {{ $message }}
                         </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>EMAIL</label>
                   <textarea wire:model="email" class="form-control @error('email') is-invalid @enderror" rows="4" placeholder="Masukkan Konten"></textarea>
                   @error('email')
                        <span class="invalid-feedback">
                                {{ $message }}
                         </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="text" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan name">
                    @error('password')
                        <span class="invalid-feedback">
                                {{ $message }}
                         </span>
                    @enderror
                </div>

                <div class="form-group">
                    <select wire:model="role" class="form-control">
                        <option value="">Pilih</option>
                        @foreach($roles as $role)
                            <option value="{{$role}}">{{$role}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</div>
