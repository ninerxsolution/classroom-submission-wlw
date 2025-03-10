<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomManagementController extends Controller
{
    public function index()
    {
        // $classrooms = Classroom::all();
        $grades = Grade::all();
        $classrooms = Classroom::with('grade')->get();
        return view('classroom_management', compact('grades', 'classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'required',
            'classroom_label' => 'required|unique:classrooms',
        ], [
            'grade_id.required' => 'ระบุระดับชั้น.',
            'classroom_label.required' => 'ระบุชื่อห้องเรียน.',
            'classroom_label.unique' => 'ห้องเรียนนี้มีอยู่แล้ว.',
        ]);

        // dd($request->all());

        Classroom::create([
            'grade_id' => $request->grade_id,
            'classroom_label' => $request->classroom_label,
        ]);

        // return redirect()->route('route-classroom-management');
        return redirect()->back()->with('success', 'เพิ่มห้องเรียนแล้ว!');
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);

        $request->validate([
            'grade_id' => 'required',
            'classroom_label' => 'required|unique:classrooms,classroom_label,' . $classroom->id . ',id',
        ], [
            'grade_id.required' => 'ระบุระดับชั้น.',
            'classroom_label.required' => 'ระบุชื่อห้องเรียน.',
            'classroom_label.unique' => 'ห้องเรียนนี้มีอยู่แล้ว.',
        ]);

        $classroom->update([
            'grade_id' => $request->grade_id,
            'classroom_label' => $request->classroom_label,
        ]);

        // return redirect()->route('route-classroom-management');
        return redirect()->back()->with('success', 'แก้ไขห้องเรียนแล้ว!');
    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return redirect()->route('route-classroom-management') ->with('success', 'ลบห้องเรียนแล้ว!');
    }
}
