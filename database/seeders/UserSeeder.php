<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'pemilik',
            'email' => 'pemilik@gmail.com',
        ])->assignRole('pemilik')
        ->givePermissionTo(['edit_menu','edit_user']);
        
        User::factory()->create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
        ])->assignRole('kasir')->givePermissionTo('view_menu');

        
    }
}