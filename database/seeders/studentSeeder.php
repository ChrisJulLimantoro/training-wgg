<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'nrp' => 'c14210073',
                'name' => 'Christopher Julius',
                'address' => 'Jl. Lorem Ipsum Dolor Sit Amet',
            ],
            [
                'nrp' => 'c14210025',
                'address' => 'Jl. Lorem Ipsum Dolor Sit Amet',
                'name' => 'Darrell Cornellius',
            ],
        ];

        foreach ($students as $student) {
            \App\Models\Student::create($student);
        }
    }
}
