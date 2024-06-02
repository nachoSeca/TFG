<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Roles y permisos
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('student');
        });
        // Usuarios base


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('password'),
        // ]);
    }
}
