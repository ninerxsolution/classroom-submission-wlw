<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\AcademicYear;
use App\Models\TeachingAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AcademicYearManagementController extends Controller
{
    public function index()
    {
        $academic_year = AcademicYear::all();
        return view('academic_year_management', compact('academic_year'));
    }

    public function view($id)
    {
        $academic_year = AcademicYear::findOrFail($id);
        $teachingAssignments = TeachingAssignment::where('teacher_id', $id)
            ->join('subjects', 'teaching_assignments.subject_id', '=', 'subjects.id')
            ->join('classrooms', 'teaching_assignments.classroom_id', '=', 'classrooms.id')
            ->join('academic_years', 'teaching_assignments.year_id', '=', 'academic_years.id')
            ->select('teaching_assignments.*', 'subjects.subject_title', 'classrooms.classroom_label', 'academic_years.year_label', 'academic_years.year_semester')
            ->get();

        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('teaching_assignment_management.view', compact('user', 'teachingAssignments', 'classrooms', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year_label' => 'required',
            'year_semester' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'year_label.required' => 'The academic year label is required.',
            'year_label.unique' => 'This academic year label already exists.',
            'year_semester.required' => 'The semester field is required.',
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
        ]);


        AcademicYear::create([
            'year_label' => $request->year_label - 534,
            'year_semester' => $request->year_semester,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // return redirect()->route('route-academic_year-management');
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function update(Request $request, $id)
    {
        $academic_year = AcademicYear::findOrFail($id);

        $request->validate([
            'year_label' => 'required',
            'year_semester' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'year_label.required' => 'The academic year label is required.',
            'year_label.unique' => 'This academic year label already exists.',
            'year_semester.required' => 'The semester field is required.',
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
        ]);

        $academic_year->update([
            'year_label' => $request->year_label - 543,
            'year_semester' => $request->year_semester,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // return redirect()->route('route-academic_year-management');
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $academic_year = AcademicYear::findOrFail($id);
        $academic_year->delete();

        return redirect()->route('route-academic_year-management');
    }
}
