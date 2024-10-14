<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

        /**
     * destroy function
     */
    public function destroy($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('livewire.user.index', [
            'users' => User::latest()->paginate(5)
        ]);
    }
}
