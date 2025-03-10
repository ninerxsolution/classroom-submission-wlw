<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Submission;
use App\Models\Assignment;
use App\Models\Student;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignments = Assignment::all();
        $students = Student::all();

        foreach ($assignments as $assignment) {
            foreach ($students as $student) {
                Submission::factory()->create([
                    'assignments_id' => $assignment->id,
                    'student_id' => $student->id,
                ]);
            }
        }
    }
}
