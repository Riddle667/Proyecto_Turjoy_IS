<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();

        User::create([
            'name' => 'Ítalo Donoso Barraza',
            'email' => 'italo.donoso@ucn.cl',
            'password' => 'Turjoy91',
        ])->roles()->attach($adminRole);
    }
}
