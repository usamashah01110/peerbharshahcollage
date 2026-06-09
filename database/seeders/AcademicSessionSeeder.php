<?php

namespace Database\Seeders;

use App\Models\AcademicSession;
use Illuminate\Database\Seeder;

class AcademicSessionSeeder extends Seeder
{
    public function run(): void
    {
        AcademicSession::updateOrCreate(
            ['name' => '2026-27'],
            [
                'session_type'          => 'fall',
                'start_date'            => '2026-09-01',
                'end_date'              => '2027-06-30',
                'is_current'            => true,
                'is_admissions_open'    => true,
                'admissions_open_date'  => '2026-05-01',
                'admissions_close_date' => '2026-08-15',
            ]
        );
    }
}
