<?php

namespace Database\Seeders;

use App\Models\NewsEvent;
use Illuminate\Database\Seeder;

class NewsEventSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title'       => 'College website officially launched online',
                'description' => 'The new official website of the College is now live, providing students and staff with seamless access to academic resources, admissions information and announcements.',
                'event_date'  => '2026-04-04',
                'type'        => 'news',
            ],
            [
                'title'       => 'Admissions open for academic year 2026–27',
                'description' => 'Applications are invited for Intermediate and BS programs. Limited seats available — submit your application before the deadline of 15 August 2026.',
                'event_date'  => '2026-06-04',
                'type'        => 'news',
            ],
            [
                'title'       => 'Annual prize distribution ceremony 2026',
                'description' => "Honoring this year's top-performing students. Faculty, parents, and dignitaries are invited to celebrate academic and co-curricular achievement.",
                'event_date'  => '2026-05-28',
                'type'        => 'event',
            ],
            [
                'title'       => 'Science Society exhibition and project gala',
                'description' => 'The Science Society hosts its annual exhibition featuring student projects in physics, chemistry and computer science. Open to all students and parents.',
                'event_date'  => '2026-05-15',
                'type'        => 'event',
            ],
            [
                'title'       => 'Merit-based scholarships announced for 2026–27',
                'description' => 'The college announces a new round of merit and need-based scholarships. Eligible students are encouraged to review criteria and apply online.',
                'event_date'  => '2026-05-10',
                'type'        => 'news',
            ],
        ];

        foreach ($items as $item) {
            NewsEvent::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
