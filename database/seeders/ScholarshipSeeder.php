<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        $adminId    = User::where('email', 'admin@gpbsgcw.edu.pk')->value('id');
        $programIds = Program::pluck('id')->all();
        $bsIds      = Program::where('degree_level', 'bachelor')->pluck('id')->all();

        $scholarships = [
            [
                'name'                   => 'Merit Excellence Scholarship',
                'description'            => 'Awarded to the highest-achieving students across all programs in recognition of outstanding academic performance. Covers a significant portion of tuition for high achievers who maintain their grades.',
                'type'                   => 'merit',
                'award_amount'           => 50000,
                'fee_waiver_percentage'  => 50,
                'duration_semesters'     => 2,
                'eligibility_criteria'   => "Minimum CGPA of 3.5. Open to currently enrolled students with no disciplinary record. Renewable each semester subject to maintaining the required CGPA.",
                'minimum_cgpa'           => 3.5,
                'eligible_program_ids'   => $programIds,
                'eligible_semesters'     => [1, 2, 3, 4],
                'application_open_date'  => now()->subDays(10),
                'application_close_date' => now()->addDays(30),
                'max_recipients'         => 20,
                'status'                 => 'open',
            ],
            [
                'name'                   => 'Need-Based Financial Aid',
                'description'            => 'Financial assistance for talented students from low-income families to ensure that financial hardship is never a barrier to quality education at our college.',
                'type'                   => 'need_based',
                'award_amount'           => 30000,
                'fee_waiver_percentage'  => 75,
                'duration_semesters'     => 4,
                'eligibility_criteria'   => "Combined family monthly income below Rs. 40,000. Applicants must submit an income certificate and supporting documents. Priority is given to first-generation college students.",
                'minimum_cgpa'           => 2.5,
                'maximum_family_income'  => 40000,
                'eligible_program_ids'   => $programIds,
                'eligible_semesters'     => [1, 2, 3, 4, 5, 6, 7, 8],
                'application_open_date'  => now()->subDays(5),
                'application_close_date' => now()->addDays(45),
                'max_recipients'         => 30,
                'status'                 => 'open',
            ],
            [
                'name'                   => 'Sports Achievement Award',
                'description'            => 'Recognises students who represent the college in regional or national sports competitions, supporting their academic journey alongside athletic excellence.',
                'type'                   => 'sports',
                'award_amount'           => 20000,
                'fee_waiver_percentage'  => 25,
                'duration_semesters'     => 2,
                'eligibility_criteria'   => "Active participation in college sports teams and proof of representation at inter-college level or above.",
                'eligible_program_ids'   => $bsIds,
                'application_open_date'  => now()->addDays(15),
                'application_close_date' => now()->addDays(60),
                'max_recipients'         => 10,
                'status'                 => 'draft',
            ],
            [
                'name'                   => 'BS Toppers Fee Waiver',
                'description'            => 'A semester fee waiver for the top three position holders in each BS program, awarded at the end of every academic session.',
                'type'                   => 'merit',
                'fee_waiver_percentage'  => 100,
                'duration_semesters'     => 1,
                'eligibility_criteria'   => "Secure a position in the top three of your BS program by CGPA at the end of the session.",
                'minimum_cgpa'           => 3.7,
                'eligible_program_ids'   => $bsIds,
                'application_open_date'  => now()->subDays(60),
                'application_close_date' => now()->subDays(10),
                'max_recipients'         => 15,
                'status'                 => 'closed',
            ],
        ];

        foreach ($scholarships as $s) {
            $s['slug']       = Str::slug($s['name']);
            $s['created_by'] = $adminId;

            Scholarship::updateOrCreate(['slug' => $s['slug']], $s);
        }
    }
}
