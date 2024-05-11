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
        User::create([
            'name' => 'admin',
            'email' => 'prueba@prueba.es',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Nacho',
            'email' => 'nacho@nacho.es',
            'password' => bcrypt('password'),
        ])->assignRole('tutor');
    }
}
