<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            DepartmentSeeder::class,
            AcademicSessionSeeder::class,
            TeacherSeeder::class,
            ProgramSeeder::class,
            NewsEventSeeder::class,
            ScholarshipSeeder::class,
        ]);
    }
}
