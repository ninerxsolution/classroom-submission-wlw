<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\StudentEnrollment;
use App\Models\Classroom;
use App\Models\AcademicYear;

class StudentEnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();

        foreach ($students as $student) {
            StudentEnrollment::factory()->create([
                'student_id' => $student->id,
                'classroom_id' => $student->classroom_id,
                'year_id' => $student->year_id,
            ]);
        }
    }
}
