<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\AcademicYear;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\TeachingAssignment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        // $subjects = Subject::all();
        // $classrooms = Classroom::all();
        $currentDate = Carbon::now();
        // $teachingAssignments = TeachingAssignment::where('teacher_id', $userId)->get();

        $teachingAssignments = TeachingAssignment::where('teacher_id', $userId)
            ->whereHas('academicYear', function ($query) use ($currentDate) {
                $query->where('start_date', '<=', $currentDate)
                    ->where('end_date', '>=', $currentDate);
            })
            ->with(['subject', 'classroom'])
            ->get()
            ->groupBy('subject_id');

        $subjects = $teachingAssignments->map(function ($teachings) {
            $firstTeaching = $teachings->first();
            return [
                'subject_title' => $firstTeaching->subject->subject_title,
                'subject_code' => $firstTeaching->subject->subject_code,
                // 'classrooms' => $teachings->pluck('classroom.classroom_label')->unique()->toArray(),
                // 'classrooms' => $teachings->pluck('classroom')->unique(),
                'classrooms' => $teachings,
            ];
        });

        return view('teacher.dashboard', compact('subjects', 'teachingAssignments'));
    }
}
