<div>
    <a href="{{ route('user.create') }}" class="btn btn-md btn-success mb-3">TAMBAH USER</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">USER</th>
                <th scope="col">EMAIL</th>
                <th scope="col">PASSWORD</th>
                <th scope="col">ROLE</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>
                   @if ($user->getRoleNames())
                     {{ $user->getRoleNames()[0] }}
                   @endif
                </td>
                <td class="text-center">
                    {{-- <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a> --}}
                    <button wire:click="destroy({{ $user->id }})" class="btn btn-sm btn-danger">DELETE</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
