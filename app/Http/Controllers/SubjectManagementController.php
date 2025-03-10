<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Classroom;
use App\Models\LearningUnit;
use App\Models\SubLearningUnit;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubjectManagementController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('subject_management', compact('grades', 'subjects'));
    }

    public function detail($id)
    {
        $subjects = Subject::findOrFail($id);
        $learning_units = LearningUnit::where('subject_id', $id)->get();
        $sub_learning_units = SubLearningUnit::whereIn('unit_id', $learning_units->pluck('id'))->get();
        $grades = Grade::all();
        $grouped_sub_learning_units = $sub_learning_units->groupBy('unit_id');

        return view('subject.detail', compact('grades', 'learning_units', 'grouped_sub_learning_units', 'subjects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|unique:subjects',
            'subject_title' => 'required|unique:subjects',
            'grades' => 'required',
        ]);

        Subject::create([
            'subject_code' => $request->subject_code,
            'subject_title' => $request->subject_title,
            'grades' => $request->grades,
        ]);

        // return redirect()->route('route-subject-management');
        return redirect()->back()->with('success', 'วิชาถูกเพิ่มแล้ว.');
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'subject_code' => 'required|unique:subjects,subject_code,' . $subject->id,
            'subject_title' => 'required|unique:subjects,subject_title,' . $subject->id,
            'grades' => 'required',
        ]);

        $subject->update([
            'subject_code' => $request->subject_code,
            'subject_title' => $request->subject_title,
            'grades' => $request->grades,
        ]);

        return redirect()->back()->with('success', 'แก้ไขวิชาแล้ว.');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->back()->with('success', 'ลบวิชาแล้ว.');
    }
}
