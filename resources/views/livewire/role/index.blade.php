<div>
    <a href="{{ route('role.create') }}" class="btn btn-md btn-success mb-3">TAMBAH ROLE</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">PERMISSIONS</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach ($role->permissions as $permission)
                            <span class="badge text-white bg-primary"> {{ $permission->name }} </span>
                        @endforeach
                    </td>
                    <td class="text-center">
                        <button wire:click="destroy({{ $role->id }})" class="btn btn-sm btn-danger">DELETE</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $roles->links() }}
</div>
