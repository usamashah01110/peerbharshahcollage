<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $byCode = Department::pluck('id', 'code');

        $programs = [
            // Intermediate
            ['name' => 'FSc Pre-Medical',      'code' => 'FSC-PM', 'dept' => 'ZOO',  'degree_level' => 'intermediate', 'total_semesters' => 4, 'duration_years' => 2.0, 'fee_per_semester' => 15000, 'description' => 'Build a strong foundation in Biology, Chemistry, and Physics for medical and life-science careers.'],
            ['name' => 'FSc Pre-Engineering',  'code' => 'FSC-PE', 'dept' => 'PHY',  'degree_level' => 'intermediate', 'total_semesters' => 4, 'duration_years' => 2.0, 'fee_per_semester' => 15000, 'description' => 'Mathematics, Physics, and Chemistry curriculum tailored for engineering and technology aspirants.'],
            ['name' => 'ICS',                  'code' => 'ICS',    'dept' => 'CS',   'degree_level' => 'intermediate', 'total_semesters' => 4, 'duration_years' => 2.0, 'fee_per_semester' => 15000, 'description' => 'Computer studies, Mathematics and Statistics for future computing professionals.'],
            // Bachelor
            ['name' => 'BS Computer Science',  'code' => 'BSCS',   'dept' => 'CS',   'degree_level' => 'bachelor', 'total_semesters' => 8, 'duration_years' => 4.0, 'total_credit_hours' => 130, 'fee_per_semester' => 35000, 'description' => 'Four-year degree in algorithms, software and computing systems, recognized by HEC Pakistan.'],
            ['name' => 'BS English',           'code' => 'BSENG',  'dept' => 'ENG',  'degree_level' => 'bachelor', 'total_semesters' => 8, 'duration_years' => 4.0, 'total_credit_hours' => 126, 'fee_per_semester' => 30000, 'description' => 'Language, literature and linguistic theory across a four-year programme.'],
            ['name' => 'BS Chemistry',         'code' => 'BSCHEM', 'dept' => 'CHEM', 'degree_level' => 'bachelor', 'total_semesters' => 8, 'duration_years' => 4.0, 'total_credit_hours' => 132, 'fee_per_semester' => 32000, 'description' => 'Study of substances, reactions and matter through a four-year degree.'],
            ['name' => 'BS Zoology',           'code' => 'BSZOO',  'dept' => 'ZOO',  'degree_level' => 'bachelor', 'total_semesters' => 8, 'duration_years' => 4.0, 'total_credit_hours' => 132, 'fee_per_semester' => 32000, 'description' => 'Scientific study of the animal kingdom across a four-year degree.'],
            ['name' => 'BS Mathematics',       'code' => 'BSMATH', 'dept' => 'MATH', 'degree_level' => 'bachelor', 'total_semesters' => 8, 'duration_years' => 4.0, 'total_credit_hours' => 130, 'fee_per_semester' => 30000, 'description' => 'Pure and applied mathematical theory across a four-year degree.'],
        ];

        foreach ($programs as $p) {
            $deptId = $byCode[$p['dept']] ?? null;
            if (! $deptId) {
                continue;
            }

            Program::updateOrCreate(
                ['code' => $p['code']],
                [
                    'department_id'      => $deptId,
                    'name'               => $p['name'],
                    'degree_level'       => $p['degree_level'],
                    'total_semesters'    => $p['total_semesters'],
                    'duration_years'     => $p['duration_years'],
                    'total_credit_hours' => $p['total_credit_hours'] ?? null,
                    'description'        => $p['description'],
                    'fee_per_semester'   => $p['fee_per_semester'],
                    'is_active'          => true,
                ]
            );
        }
    }
}
