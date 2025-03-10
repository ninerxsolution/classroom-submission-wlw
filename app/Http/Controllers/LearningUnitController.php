<?php

namespace App\Http\Controllers;

use App\Models\LearningUnit;
use Illuminate\Http\Request;

class LearningUnitController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'unit_title' => 'required|string|max:255',
            'unit_description' => 'required|string',
            'assume_score' => 'required|numeric',
            'subject_id' => 'required|exists:subjects,id',
        ], [
            'subject_id.required' => 'ระบุข้อมูลวิชา.',
            'subject_id.exists' => 'วิชาที่เลือกไม่ถูกต้อง.',
        ]);

        LearningUnit::create([
            'unit_title' => $request->unit_title,
            'unit_description' => $request->unit_description,
            'assume_score' => $request->assume_score,
            'subject_id' => $request->subject_id,
        ]);

        return redirect()->route('route-subject-management.detail', $request->subject_id)->with('success', 'สร้างหน่วยการเรียนรู้เรียบร้อยแล้ว.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_title' => 'required|string|max:255',
            'unit_description' => 'required|string',
            'assume_score' => 'required|numeric',
        ]);

        $learningUnit = LearningUnit::findOrFail($id);

        $learningUnit->update([
            'unit_title' => $request->input('unit_title'),
            'unit_description' => $request->input('unit_description'),
            'assume_score' => $request->input('assume_score'),
        ]);

        // return redirect()->route('backoffice/subject-management/{{$request->subject_id}}/detail', $request->input('subject_id'))->with('success', 'Learning unit created successfully.');

        return redirect()->route('route-subject-management.detail', $learningUnit->subject_id)->with('success', 'แก้ไขหน่วยการเรียนรู้แล้ว.');
    }

    public function destroy($id)
    {
        $learningUnit = LearningUnit::findOrFail($id);
        $subjectId = $learningUnit->subject_id;
        $learningUnit->delete();

        return redirect()->route('route-subject-management.detail', $subjectId)->with('success', 'ลบหน่วยการเรียนรู้แล้ว.');
    }
}
