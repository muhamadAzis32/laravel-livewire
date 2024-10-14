<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    // data
    public $permissions;

    /**
     * define public variable
     */
    public $name;
    public $Getpermissions = [];

    public function mount()
    {
        // get permission
        $this->permissions = Permission::all();
    }

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'name'   => 'required',
        ]);

        $role = Role::create([
            'name'     => $this->name,
        ]);

        // permission
        $permissions = Permission::whereIn('id', $this->Getpermissions)->get();
        $role->givePermissionTo($permissions);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        //redirect
        return redirect()->route('role.index');
    }

    public function render()
    {
        return view('livewire.role.create');
    }
}
