<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $collection = collect([
            'User',
            'Role',
            'Permission',
            'Post'
        ]);

        $subPermission = collect([
            'view',
            'create',
            'edit',
            'delete',
        ]);

        $collection->each(function ($item, $key) use ($subPermission) {
            Permission::updateOrCreate(
                ['name' => 'manage' . $item],
                ['guard_name' => 'web', 'name' => 'manage' . $item]
            );
            $subPermission->each(function ($subItem, $subKey) use ($item) {
                Permission::updateOrCreate(
                    ['name' => 'manage' . $item . '-' . $subItem],
                    ['guard_name' => 'web', 'name' => 'manage' . $item . '-' . $subItem]
                );
            });
        });

        // Membuat atau memperbarui pengguna admin
        $userAdmin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Unique identifier
            [
                'name' => 'Administrator',
                'password' => bcrypt('password'), // Hanya update password jika perlu
            ]
        );

        // Membuat atau memperbarui role superadmin
        $roleAdmin = Role::updateOrCreate(['name' => 'superadmin']);
        $roleAdmin->givePermissionTo(Permission::all()); // Memberikan semua permission kepada superadmin
        $userAdmin->assignRole($roleAdmin);

        // Membuat atau memperbarui pengguna guru
        $userTeacher = User::updateOrCreate(
            ['email' => 'guru@gmail.com'], // Unique identifier
            [
                'name' => 'Guru',
                'password' => bcrypt('password'), // Hanya update password jika perlu
            ]
        );


        // Membuat atau memperbarui role guru
        $roleTeacher = Role::updateOrCreate(['name' => 'guru']);

        // Memberikan permission tertentu untuk guru
        $roleTeacher->givePermissionTo(Permission::whereIn('id', ['16', '17'])->get());
        $userTeacher->assignRole($roleTeacher);
    }
}
