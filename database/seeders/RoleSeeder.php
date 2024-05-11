<?php

namespace Database\Seeders;

use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        /**
         * Admin => all
         * Tutor => view, create, update
         * Student => view
         */

        // $admin = Role::create(['name' => 'admin']);
        // $tutor = Role::create(['name' => 'tutor']);
        // $student = Role::create(['name' => 'student']);

        // Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $tutor]);
        // Permission::create(['name' => 'tutors.index'])->syncRoles([$admin, $tutor]);
        // Permission::create(['name' => 'tutors.show'])->syncRoles([$admin, $tutor]);
        // Permission::create(['name' => 'tutors.create'])->syncRoles([$admin, $tutor]);
        // Permission::create(['name' => 'tutors.store'])->syncRoles([$admin, $tutor]);;
        // Permission::create(['name' => 'tutors.edit'])->syncRoles([$admin, $tutor]);;
        // Permission::create(['name' => 'tutors.update'])->syncRoles([$admin, $tutor]);;
        // Permission::create(['name' => 'tutors.destroy'])->syncRoles([$admin]);;





        
    }
}
