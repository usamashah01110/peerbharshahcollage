<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $byCode = Department::pluck('id', 'code');

        $teachers = [
            [
                'employee_id'    => 'EMP-001',
                'first_name'     => 'Asma',
                'last_name'      => 'Maqbool',
                'email'          => 'asma.maqbool@gpbsgcw.edu.pk',
                'dept'           => 'ZOO',
                'designation'    => 'professor',
                'qualification'  => 'PhD Zoology',
                'specialisation' => 'Principal & Head of Zoology',
                'profile_image'  => 'images/principal.jpeg',
                'bio'            => 'Principal of the college and Head of the Zoology Department, leading with over two decades of academic dedication.',
                'is_hod'         => true,
            ],
            [
                'employee_id'    => 'EMP-002',
                'first_name'     => 'Faiza',
                'last_name'      => 'Bukhari',
                'email'          => 'faiza.bukhari@gpbsgcw.edu.pk',
                'dept'           => 'ENG',
                'designation'    => 'assistant_professor',
                'qualification'  => 'MPhil English Literature',
                'specialisation' => 'Head of English Literature',
                'profile_image'  => null,
                'bio'            => 'Assistant Professor and Head of English Literature, passionate about language and critical thinking.',
                'is_hod'         => true,
            ],
            [
                'employee_id'    => 'EMP-003',
                'first_name'     => 'Shahnaz',
                'last_name'      => 'Ijaz',
                'email'          => 'shahnaz.ijaz@gpbsgcw.edu.pk',
                'dept'           => 'CS',
                'designation'    => 'assistant_professor',
                'qualification'  => 'MS Computer Science',
                'specialisation' => 'Head of Computer Science',
                'profile_image'  => null,
                'bio'            => 'Assistant Professor and Head of Computer Science, guiding students into modern computing careers.',
                'is_hod'         => true,
            ],
            [
                'employee_id'    => 'EMP-004',
                'first_name'     => 'Nadia',
                'last_name'      => 'Hussain',
                'email'          => 'nadia.hussain@gpbsgcw.edu.pk',
                'dept'           => 'CHEM',
                'designation'    => 'lecturer',
                'qualification'  => 'MSc Chemistry',
                'specialisation' => 'Organic Chemistry',
                'profile_image'  => null,
                'bio'            => 'Lecturer in Chemistry with a focus on practical, lab-based learning.',
                'is_hod'         => false,
            ],
            [
                'employee_id'    => 'EMP-005',
                'first_name'     => 'Sara',
                'last_name'      => 'Khan',
                'email'          => 'sara.khan@gpbsgcw.edu.pk',
                'dept'           => 'PHY',
                'designation'    => 'lecturer',
                'qualification'  => 'MSc Physics',
                'specialisation' => 'Mechanics & Optics',
                'profile_image'  => null,
                'bio'            => 'Lecturer in Physics committed to building strong scientific foundations.',
                'is_hod'         => false,
            ],
            [
                'employee_id'    => 'EMP-006',
                'first_name'     => 'Ayesha',
                'last_name'      => 'Malik',
                'email'          => 'ayesha.malik@gpbsgcw.edu.pk',
                'dept'           => 'MATH',
                'designation'    => 'associate_professor',
                'qualification'  => 'PhD Mathematics',
                'specialisation' => 'Applied Mathematics',
                'profile_image'  => null,
                'bio'            => 'Associate Professor of Mathematics with a passion for problem solving.',
                'is_hod'         => true,
            ],
        ];

        foreach ($teachers as $t) {
            $deptId = $byCode[$t['dept']] ?? null;
            if (! $deptId) {
                continue;
            }

            $teacher = Teacher::updateOrCreate(
                ['employee_id' => $t['employee_id']],
                [
                    'first_name'     => $t['first_name'],
                    'last_name'      => $t['last_name'],
                    'email'          => $t['email'],
                    'gender'         => 'female',
                    'department_id'  => $deptId,
                    'designation'    => $t['designation'],
                    'qualification'  => $t['qualification'],
                    'specialisation' => $t['specialisation'],
                    'joining_date'   => '2010-01-01',
                    'profile_image'  => $t['profile_image'],
                    'bio'            => $t['bio'],
                    'status'         => 'active',
                ]
            );

            if ($t['is_hod']) {
                Department::where('id', $deptId)->update(['hod_id' => $teacher->id]);
            }
        }
    }
}
