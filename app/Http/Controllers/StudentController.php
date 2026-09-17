<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Student::all());
    }

    public function store(Request $request): JsonResponse
    {
        $student = Student::create($request->validate([
            'student_number' => ['required', 'string', 'max:255', 'unique:students'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students'],
            'course' => ['required', 'string', 'max:255'],
        ]));

        return response()->json($student, 201);
    }
}
