<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create(['nombre' => 'DAW']);
        Course::create(['nombre' => 'DAM']);
        Course::create(['nombre' => 'ASIR']);
        Course::create(['nombre' => 'SMR']);
        Course::create(['nombre' => 'DUAL']);
    }
}
