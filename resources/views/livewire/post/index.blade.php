<div>
    <x-button  href="{{ route('post.create') }}" wire:navigate icon="plus" label="TAMBAH POST" />

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        TITLE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CONTENT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        AKSI
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->content }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            <button wire:click="destroy({{ $post->id }})"
                                class="btn btn-sm btn-danger">DELETE</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{ $posts->links() }}

    <br>

    <div class="mt-8">
        @php
            $users = App\Models\User::take(5)->get();
        @endphp

        <x-select label="Master user" :options="$users" option-label="name" option-value="id"
            wire:model="selectedUser" placeholder="Klik Untuk memilih" />
        <x-password label="Secret 🙈" value="I love WireUI ❤️" />
    </div>
</div>
