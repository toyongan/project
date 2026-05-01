<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $hr = User::where('role', 'hr_manager')->first();

        $jobs = [
            [
                'title'        => 'Software Engineer',
                'type'         => 'full-time',
                'location'     => 'Remote',
                'salary'       => '50000',
                'description'  => 'We are looking for a skilled software engineer.',
                'requirements' => 'PHP, Laravel, MySQL',
                'status'       => 'open',
            ],
            [
                'title'        => 'UI/UX Designer',
                'type'         => 'part-time',
                'location'     => 'On-site',
                'salary'       => '30000',
                'description'  => 'Creative designer needed for our product team.',
                'requirements' => 'Figma, Adobe XD, HTML/CSS',
                'status'       => 'open',
            ],
            [
                'title'        => 'HR Coordinator',
                'type'         => 'full-time',
                'location'     => 'Hybrid',
                'salary'       => '25000',
                'description'  => 'Manage recruitment and onboarding processes.',
                'requirements' => 'Communication skills, MS Office',
                'status'       => 'closed',
            ],
        ];

        foreach ($jobs as $job) {
            Job::create(array_merge($job, ['user_id' => $hr->id]));
        }
    }
}
