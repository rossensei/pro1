<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1= User::create([
            'name' => 'admin',
            'email' => 'ross@dev.xyz',
            'password' => bcrypt('password123'), // password
        ]);

        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'create-item']);
        Permission::create(['name' => 'view-item']);
        Permission::create(['name' => 'edit-item']);
        Permission::create(['name' => 'delete-item']);

        $admin->givePermissionTo(Permission::all());
        $editor->givePermissionTo(['create-item', 'view-item', 'edit-item']);
        $user->givePermissionTo(['view-item']);

        $user1->assignRole('admin');
    }
}
