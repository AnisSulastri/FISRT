<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat Role
        $pemilik = Role::create(['name' => 'pemilik']);
        $kasir = Role::create(['name' => 'kasir']);

        // Membuat Permission
        $editMenu = Permission::create(['name' => 'edit_menu']);
        $editUser = Permission::create(['name' => 'edit_user']);
        $viewMenu = Permission::create(['name' => 'view_menu']);

        // Assign permission ke role jika diperlukan
        $pemilik->givePermissionTo($editMenu);
        $pemilik->givePermissionTo($editUser);

        $kasir->givePermissionTo($viewMenu);
    }
}
