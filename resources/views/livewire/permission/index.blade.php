<div>
    <a href="{{ route('permission.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PERMISSION</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td class="text-center">
                        <button wire:click="destroy({{ $permission->id }})" class="btn btn-sm btn-danger">DELETE</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $permissions->links() }} --}}
</div>
