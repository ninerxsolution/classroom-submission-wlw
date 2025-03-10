<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AcademicYear;

class StudentManagementController extends Controller
{
    public function index()
    {
        // $students = Student::all();
        $classrooms = Classroom::all();
        $students = Student::with('classroom')->get();

        return view('student_management', compact('classrooms', 'students'));
    }

    public function getYearIdByLabelAndSemester($year_label, $year_semester)
    {
        return AcademicYear::where('year_label', $year_label)
            ->where('year_semester', $year_semester)
            ->orderBy('year_label', 'asc')
            ->orderBy('year_semester', 'asc')
            ->first()
            ->id;
    }

    public function create()
    {
        $classrooms = Classroom::all();
        return view('student_management.add', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'student_code' => 'required|unique:students',
            'prefix' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            // 'year_id' => 'required',
        ], [
            'classroom_id.required' => 'ระบุห้องเรียน.',
            'email.required' => 'ระบุอีเมล.',
            'phone.required' => 'ระบุหมายเลขโทรศัพท์.',
            'student_code.required' => 'ระบุรหัสนักเรียน.',
            'student_code.unique' => 'รหัสนักเรียนนี้ถูกใช้งานแล้ว.',
            'prefix.required' => 'ระบุคำนำหน้า.',
            'first_name.required' => 'ระบุชื่อ.',
            'last_name.required' => 'ระบุนามสกุล.',
            // 'year_id.required' => 'The year field is required.',
        ]);

        $latestAcademicYear = AcademicYear::orderBy('year_label', 'desc')
            ->orderBy('year_semester', 'desc')
            ->first();

        $year_id = $this->getYearIdByLabelAndSemester($latestAcademicYear->year_label, $latestAcademicYear->year_semester);

        Student::create([
            'classroom_id' => $request->classroom_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'student_code' => $request->student_code,
            'prefix' => $request->prefix,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'year_id' => $year_id,
        ]);

        // return redirect()->route('route-student-management');
        return redirect()->back()->with('success', 'เพิ่มนักเรียนแล้ว!');
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'classroom_id' => 'required',
            'student_code' => 'required|unique:students,student_code,' . $student->id,
            'prefix' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            // 'year_id' => 'required',
        ], [
            'classroom_id.required' => 'ระบุห้องเรียน.',
            'student_code.required' => 'ระบุรหัสนักเรียน.',
            'student_code.unique' => 'รหัสนักเรียนนี้ถูกใช้งานแล้ว.',
            'prefix.required' => 'ระบุคำนำหน้า.',
            'first_name.required' => 'ระบุชื่อ.',
            'last_name.required' => 'ระบุนามสกุล.',
            // 'year_id.required' => 'The year field is required.',
        ]);

        $latestAcademicYear = AcademicYear::orderBy('year_label', 'desc')
            ->orderBy('year_semester', 'desc')
            ->first();

        $year_id = $this->getYearIdByLabelAndSemester($latestAcademicYear->year_label, $latestAcademicYear->year_semester);

        $student->update([
            'classroom_id' => $request->classroom_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'student_code' => $request->student_code,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'year_id' => $year_id,
        ]);

        // return redirect()->route('route-student-management');
        return redirect()->back()->with('success', 'แก้ไขข้อมูลนักเรียนเรียบร้อยแล้ว!');
    }

    public function edit($id)
    {
        $classrooms = Classroom::all();
        $student = Student::findOrFail($id);
        return view('student_management.edit', compact('classrooms', 'student'));
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('route-student-management')->with('success', 'ลบข้อมูลนักเรียนเรียบร้อยแล้ว!');
    }
}
