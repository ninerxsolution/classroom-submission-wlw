<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\AcademicYear;
use App\Models\Subject;
use App\Models\LearningUnit;
use App\Models\SubLearningUnit;
use App\Models\Classroom;
use App\Models\TeachingAssignment;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeacherSubjectController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        // $subjects = Subject::all();
        // $classrooms = Classroom::all();
        $currentDate = Carbon::now();
        // $teachingAssignments = TeachingAssignment::where('teacher_id', $userId)->get();

        $latestAcademicYear = AcademicYear::where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->orderBy('start_date', 'desc')
            ->first();

        if (!$latestAcademicYear) {
            return response()->json(['message' => 'No active academic year found'], 404);
        }

        $teachingAssignments = TeachingAssignment::where('teacher_id', $userId)
            ->whereHas('academicYear', function ($query) use ($currentDate) {
                $query->where('start_date', '<=', $currentDate)
                    ->where('end_date', '>=', $currentDate);
            })
            ->with(['subject', 'classroom'])
            ->get()
            ->groupBy('subject_id');

        // $subjects = $teachingAssignments->map(function ($teachings) {
        //     $firstTeaching = $teachings->first();
        //     return [
        //         'subject_title' => $firstTeaching->subject->subject_title,
        //         'subject_code' => $firstTeaching->subject->subject_code,
        //         'classrooms' => $teachings->pluck('classroom.classroom_label')->unique()->toArray(),
        //     ];
        // });

        // $subjects = Subject::whereHas('teachingAssignments', function ($query) use ($userId, $currentDate) {
        //     $query->where('teacher_id', $userId)
        //         ->whereHas('academicYear', function ($query) use ($currentDate) {
        //             $query->where('start_date', '<=', $currentDate)
        //                 ->where('end_date', '>=', $currentDate);
        //         });
        // })
        //     ->with(['learningUnits.subLearningUnits'])
        //     ->get();

        $subjects = Subject::whereHas('teachingAssignments', function ($query) use ($userId, $latestAcademicYear) {
            $query->where('teacher_id', $userId)
                ->whereHas('academicYear', function ($q) use ($latestAcademicYear) {
                    $q->where('id', $latestAcademicYear->id);
                });
        })
            ->with([
                'learningUnits' => function ($query) use ($latestAcademicYear) {
                    $query->withCount(['assignments' => function ($q) use ($latestAcademicYear) {
                        $q->where('year_id', $latestAcademicYear->id);
                    }])->with([
                        'subLearningUnits' => function ($subQuery) use ($latestAcademicYear) {
                            $subQuery->withCount(['assignments' => function ($q) use ($latestAcademicYear) {
                                $q->where('year_id', $latestAcademicYear->id);
                            }]);
                        }
                    ]);
                }
            ])
            ->get();


        $assignments = Assignment::whereHas('academicYear', function ($query) use ($currentDate) {
            $query->where('start_date', '<=', $currentDate)
                ->where('end_date', '>=', $currentDate);
        })
            ->whereHas('learningUnit.subject.teachingAssignments', function ($query) use ($userId) {
                $query->where('teacher_id', $userId);
            })
            ->with(['learningUnit', 'subLearningUnit'])
            ->get();

        return view('teacher.subjects', compact('subjects', 'teachingAssignments', 'assignments'));
    }
}
