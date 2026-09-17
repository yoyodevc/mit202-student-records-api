<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_students(): void
    {
        Student::create([
            'student_number' => '2026-0099',
            'first_name' => 'Test',
            'last_name' => 'Student',
            'email' => 'test.student@example.com',
            'course' => 'BSIT',
        ]);

        $this->getJson('/api/students')
            ->assertOk()
            ->assertJsonFragment(['student_number' => '2026-0099']);
    }

    public function test_it_creates_a_student(): void
    {
        $student = [
            'student_number' => '2026-0100',
            'first_name' => 'New',
            'last_name' => 'Student',
            'email' => 'new.student@example.com',
            'course' => 'BSCS',
        ];

        $this->postJson('/api/students', $student)
            ->assertCreated()
            ->assertJsonFragment($student);

        $this->assertDatabaseHas('students', $student);
    }

    public function test_it_validates_new_students(): void
    {
        $this->postJson('/api/students', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'student_number',
                'first_name',
                'last_name',
                'email',
                'course',
            ]);
    }
}
