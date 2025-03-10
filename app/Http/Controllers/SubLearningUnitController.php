<?php

namespace App\Http\Controllers;

use App\Models\SubLearningUnit;
use Illuminate\Http\Request;

class SubLearningUnitController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'sub_unit_title' => 'required',
            'sub_unit_description' => 'required',
            'assume_score' => 'required',
            'unit_id' => 'required',
        ], [
            'unit_id.required' => 'ระบุข้อมูลวิชา.',
        ]);

        // dd($request->all());

        SubLearningUnit::create([
            'sub_unit_title' => $request->sub_unit_title,
            'sub_unit_description' => $request->sub_unit_description,
            'assume_score' => $request->assume_score,
            'unit_id' => $request->unit_id,
        ]);

        return redirect()->route('route-subject-management.detail', $request->subject_id)->with('success', 'เพิ่มหน่วยการเรียนรู้ย่อยแล้ว.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sub_unit_title' => 'required|string|max:255',
            'sub_unit_description' => 'required|string',
            'assume_score' => 'required|numeric',
        ]);

        $subLearningUnit = SubLearningUnit::findOrFail($id);

        $subLearningUnit->update([
            'sub_unit_title' => $request->input('sub_unit_title'),
            'sub_unit_description' => $request->input('sub_unit_description'),
            'assume_score' => $request->input('assume_score'),
        ]);

        // return redirect()->route('backoffice/subject-management/{{$request->subject_id}}/detail', $request->input('subject_id'))->with('success', 'Learning unit created successfully.');

        return redirect()->route('route-subject-management.detail', $request->subject_id)->with('success', 'แก้ไขหน่วยการเรียนรู้ย่อยแล้ว.');
    }

    public function destroy($id)
    {
        $subLearningUnit = SubLearningUnit::findOrFail($id);
        $subjectId = $subLearningUnit->subject_id;
        $subLearningUnit->delete();

        return redirect()->back()->with('success', 'ลบหน่วยการเรียนรู้ย่อยแล้ว.');
        // return redirect()->route('route-subject-management.detail', $subLearningUnit)->with('success', 'Learning unit deleted successfully.');
    }
}
