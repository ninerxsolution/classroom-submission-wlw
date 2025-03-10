<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\User;
use App\Models\TeachingAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachingAssignmentManagementController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'TEACHER')->get();
        return view('teaching_assignment_management', compact('users'));
    }

    public function view($id)
    {
        $user = User::findOrFail($id);
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
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'classroom_id' => 'required',
            'year_id' => 'required',
        ], [
            'teacher_id.required' => 'ระบุข้อมูลครูผู้สอน.',
            'subject_id.required'  => 'ระบุข้อมูลวิชา',
            'classroom_id.required'=> 'ระบุข้อมูลห้องเรียน',
            'year_id.required'     => 'ระบุข้อมูลปีการศึกษา',
        ]);


        TeachingAssignment::create([
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'classroom_id' => $request->classroom_id,
            'year_id' => $request->year_id,
        ]);

        return redirect()->back()->with('success', 'เพิ่มห้องเรียนแล้ว.');
    }

    public function update(Request $request, $id)
    {
        $teaching = TeachingAssignment::findOrFail($id);

        $request->validate([
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'classroom_id' => 'required',
            'year_id' => 'required',
        ], [
            'teacher_id.required' => 'ระบุข้อมูลครูผู้สอน.',
            'subject_id.required'  => 'ระบุข้อมูลวิชา',
            'classroom_id.required'=> 'ระบุข้อมูลห้องเรียน',
            'year_id.required'     => 'ระบุข้อมูลปีการศึกษา',
        ]);


        $teaching->update([
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'classroom_id' => $request->classroom_id,
            'year_id' => $request->year_id,
        ]);

        return redirect()->back()->with('success', 'แก้ไขห้องเรียนแล้ว.');
    }

    public function destroy($id)
    {
        $teaching = TeachingAssignment::findOrFail($id);
        $teaching->delete();

        return redirect()->back()->with('success', 'ลบข้อมูลห้องเรียนแล้ว.');
    }
}
