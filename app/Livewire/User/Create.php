<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{

    // Data
    public $roles;

    /**
     * define public variable
     */
    public $name;
    public $email;
    public $password;
    public $role;

    public function mount()
    {
        // get roles
        $this->roles = Role::pluck('name', 'name')->all();
    }

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'name'   => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name'     => $this->name,
            'email'   => $this->email,
            'password' => $this->password
        ]);

        $user->assignRole($this->role);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        //redirect
        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
