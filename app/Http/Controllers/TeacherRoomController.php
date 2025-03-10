<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\AcademicYear;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\TeachingAssignment;
use App\Models\LearningUnit;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeacherRoomController extends Controller
{
    public function index($teachingAssignment_id)
    {

        $userId = Auth::id();
        $teachingAssignment = TeachingAssignment::find($teachingAssignment_id);
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

        $learningUnits = LearningUnit::where('subject_id', $subject->id)
            ->withCount(['assignments' => function ($query) use ($latestAcademicYear) {
                $query->where('year_id', $latestAcademicYear->id);
            }])
            ->with([
                'subLearningUnits' => function ($subQuery) use ($latestAcademicYear) {
                    $subQuery->withCount(['assignments' => function ($q) use ($latestAcademicYear) {
                        $q->where('year_id', $latestAcademicYear->id);
                    }]);
                }
            ])
            ->get();

        $classroom = Classroom::find($teachingAssignment->classroom_id);

        $students = Student::where('classroom_id', $classroom->id)
            ->whereHas('academicYear', function ($query) use ($latestAcademicYear) {
                $query->where('year_id', $latestAcademicYear->id);
            })
            ->get();

        // $submissions = Submission::where('assignment_id', $assignmentId)
        //     ->where('student_id', $studentId)
        //     ->where('submit_status', 'y')
        //     ->get();

        $submissions = [];
        foreach ($students as $student) {
            foreach ($learningUnits as $unit) {
                foreach ($unit->assignments as $assignment) {
                    $submission = Submission::where('assignments_id', $assignment->id)
                        ->where('student_id', $student->id)
                        ->first();

                    if ($submission) {
                        $submissions[] = [
                            'student' => $student,
                            'assignment' => $assignment,
                            'submission' => $submission
                        ];
                    }
                }
            }
        }


        foreach ($students as $student) {
            $allCompleted = true;

            foreach ($learningUnits as $unit) {
                foreach ($unit->assignments as $assignment) {
                    $submission = Submission::where('assignments_id', $assignment->id)
                        ->where('student_id', $student->id)
                        ->first();

                    if (!$submission || $submission->submit_status != 'y') {
                        $allCompleted = false;
                        break 2;
                    }
                }
            }

            $student->all_completed = $allCompleted;
        }

        // return view('teacher.rooms', compact('teachingAssignment', 'subject', 'classroom', 'students'));
        return view('teacher.rooms', compact('teachingAssignment', 'subject', 'classroom', 'students', 'learningUnits', 'submissions'));
    }
}
