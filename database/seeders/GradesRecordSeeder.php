<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GradesRecord;
use App\Models\AcademicYear;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Submission;

class GradesRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();
        $academicYears = AcademicYear::all();
        $subjects = Subject::all();

        foreach ($students as $student) {
            foreach ($academicYears as $year) {
                foreach ($subjects as $subject) {
                    $submissions = Submission::where('student_id', $student->id)
                        ->whereHas('assignment.teachingAssignment', function ($query) use ($year, $subject) {
                            $query->where('year_id', $year->id)
                                ->where('subject_id', $subject->id);
                        })
                        ->get();

                    // Debugging: Log the number of submissions found
                    echo "Student ID: {$student->id}, Year ID: {$year->id}, Subject ID: {$subject->id}, Submissions Count: {$submissions->count()}\n";

                    // Debugging: Log individual submission scores
                    foreach ($submissions as $submission) {
                        echo "Submission ID: {$submission->id}, Score: {$submission->score}\n";
                    }

                    // Calculate the final score as the sum of the submission scores
                    $finalScore = $submissions->sum('score');

                    // Debugging: Log the final score calculated
                    echo "Final Score: {$finalScore}\n";

                    GradesRecord::create([
                        'year_id' => $year->id,
                        'student_id' => $student->id,
                        'subject_id' => $subject->id,
                        'final_score' => $finalScore,
                    ]);
                }
            }
        }
    }
}
