<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Computer Science', 'code' => 'CS',   'description' => 'Department of Computer Science offering programming, software and computing studies.'],
            ['name' => 'English',          'code' => 'ENG',  'description' => 'Department of English Language & Literature.'],
            ['name' => 'Zoology',          'code' => 'ZOO',  'description' => 'Department of Zoology — the scientific study of the animal kingdom.'],
            ['name' => 'Botany',           'code' => 'BOT',  'description' => 'Department of Botany — plant biology and ecological systems.'],
            ['name' => 'Chemistry',        'code' => 'CHEM', 'description' => 'Department of Chemistry — substances, reactions and matter.'],
            ['name' => 'Physics',          'code' => 'PHY',  'description' => 'Department of Physics — the laws governing matter and energy.'],
            ['name' => 'Mathematics',      'code' => 'MATH', 'description' => 'Department of Mathematics — pure and applied mathematical theory.'],
        ];

        foreach ($departments as $dept) {
            Department::updateOrCreate(
                ['code' => $dept['code']],
                array_merge($dept, [
                    'established_date' => '2003-01-01',
                    'is_active'        => true,
                ])
            );
        }
    }
}
