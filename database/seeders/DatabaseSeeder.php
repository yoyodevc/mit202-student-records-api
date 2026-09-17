<?php

namespace Database\Seeders;

use App\Models\Student;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::create([
            'student_number' => '2026-0001',
            'first_name' => 'Ana',
            'last_name' => 'Reyes',
            'email' => 'ana.reyes@example.com',
            'course' => 'BSIT',
        ]);

        Student::create([
            'student_number' => '2026-0002',
            'first_name' => 'Marco',
            'last_name' => 'Santos',
            'email' => 'marco.santos@example.com',
            'course' => 'BSCS',
        ]);
    }
}
