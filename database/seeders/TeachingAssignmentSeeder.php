<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeachingAssignment;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\AcademicYear;

class TeachingAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = User::where('role', 'TEACHER')->get();
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        $academicYears = AcademicYear::all();

        foreach ($teachers as $teacher) {
            $teacherSubjects = $subjects->random(rand(1, 2));

            $teacherClassrooms = $classrooms->random(rand(1, 2));

            foreach ($teacherSubjects as $subject) {
                foreach ($teacherClassrooms as $classroom) {
                    foreach ($academicYears as $year) {
                        TeachingAssignment::factory()->create([
                            'subject_id' => $subject->id,
                            'teacher_id' => $teacher->id,
                            'classroom_id' => $classroom->id,
                            'year_id' => $year->id,
                        ]);
                    }
                }
            }
        }
    }
}
