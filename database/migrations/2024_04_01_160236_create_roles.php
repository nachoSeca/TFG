<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'tutor']);
        $role3 = Role::create(['name' => 'student']);

        Permission::create(['name' => 'total'])->syncRoles([$role1]);

        Permission::create(['name' => 'tutors.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'tutors.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tutors.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'tutors.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'tutors.show'])->syncRoles([$role2]);

        Permission::create(['name' => 'students.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'students.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'students.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'students.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'students.show'])->syncRoles([$role3]);

        Permission::create(['name' => 'companies.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'companies.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'companies.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'companies.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'companies.show'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'tracking.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tracking.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tracking.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tracking.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tracking.show'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'courses.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'courses.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'courses.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'courses.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'covers.index'])->syncRoles([$role1, $role2, $role3]);




        

        


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
