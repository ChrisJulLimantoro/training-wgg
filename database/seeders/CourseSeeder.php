<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['name' => 'Math'],
            ['name' => 'Science'],
            ['name' => 'History'],
            ['name' => 'English'],
            ['name' => 'Art'],
        ];

        foreach ($courses as $course) {
            \App\Models\Course::create($course);
        }
    }
}
