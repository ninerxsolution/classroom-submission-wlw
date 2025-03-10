<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\AcademicYear;
use App\Models\Subject;
use App\Models\Submission;
use App\Models\Assignment;
use App\Models\SubLearningUnit;
use App\Models\LearningUnit;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\TeachingAssignment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeacherAssignmentDetailController extends Controller
{
    public function index($teachingAssignmentId, $unitId, $subUnitId)
    {

        $userId = Auth::id();
        $teachingAssignment = TeachingAssignment::find($teachingAssignmentId);
        $currentDate = Carbon::now();

        $latestAcademicYear = AcademicYear::where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->orderBy('start_date', 'desc')
            ->first();

        if (!$latestAcademicYear) {
            return response()->json(['message' => 'No active academic year found'], 404);
        }

        if (!$teachingAssignment) {
            return redirect()->back()->with('error', 'Teaching Assignment not found');
        }

        $subject = Subject::find($teachingAssignment->subject_id);

        $learningUnit = LearningUnit::find($unitId);

        $subLearningUnit = SubLearningUnit::find($subUnitId);

        $classroom = Classroom::find($teachingAssignment->classroom_id);

        $students = Student::where('classroom_id', $classroom->id)
            ->whereHas('academicYear', function ($query) use ($latestAcademicYear) {
                $query->where('year_id', $latestAcademicYear->id);
            })
            ->get();

        $assignments = Assignment::where('teaching_assignment_id', $teachingAssignmentId)
            ->where('unit_id', $unitId)
            ->where('sub_unit_id', $subUnitId)
            ->where('year_id', $latestAcademicYear->id)
            ->get();

        // $submissions = [];
        // foreach ($students as $student) {
        //     foreach ($assignments as $assignment) {
        //         $submission = Submission::where('assignments_id', $assignment->id)
        //             ->where('student_id', $student->id)
        //             ->first();

        //         $submissions[$student->id][$assignment->id] = $submission ? $submission : null;
        //     }
        // }

        $submissions = [];
        foreach ($students as $student) {
            foreach ($assignments as $assignment) {
                $submission = Submission::where('assignments_id', $assignment->id)
                    ->where('student_id', $student->id)
                    ->first();

                if ($submission) {
                    $submissions[$student->id][$assignment->id] = [
                        'submission' => $submission,
                        'actual_score' => $submission->actual_score,
                        'submit_status' => $submission->submit_status,
                        'max_score' => $assignment->max_score
                    ];
                } else {
                    $submissions[$student->id][$assignment->id] = [
                        'submission' => null,
                        'actual_score' => null,
                        'submit_status' => 'n'
                    ];
                }
            }
        }


        return view('teacher.room-subject-unit', compact('teachingAssignmentId', 'submissions', 'students', 'subject', 'classroom', 'learningUnit', 'subLearningUnit', 'assignments'));
    }
}
