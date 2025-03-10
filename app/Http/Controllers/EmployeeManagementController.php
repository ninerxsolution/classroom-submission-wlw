<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmployeeManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('employee_management', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'user_code' => 'required|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
        ], [
            'username.required' => 'ระบุชื่อผู้ใช้.',
            'username.unique' => 'ชื่อผู้ใช้นี้ถูกใช้งานแล้ว.',
            'password.required' => 'ระบุรหัสผ่าน.',
            'email.required' => 'ระบุอีเมล.',
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว.',
            'phone.required' => 'ระบุหมายเลขโทรศัพท์.',
            'phone.unique' => 'หมายเลขโทรศัพท์นี้ถูกใช้งานแล้ว.',
            'user_code.required' => 'ระบุรหัสผู้ใช้.',
            'user_code.unique' => 'รหัสผู้ใช้นี้ถูกใช้งานแล้ว.',
            'first_name.required' => 'ระบุชื่อ.',
            'last_name.required' => 'ระบุนามสกุล.',
        ]);

        User::create([
            'role' => $request->role,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
            'user_code' => $request->user_code,
            'prefix' => $request->prefix,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'position' => $request->position,
        ]);

        // return redirect()->route('route-employee-management');
        return redirect()->back()->with('success', 'เพิ่มบัญชีผู้ใช้แล้ว!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'role' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
            'phone' => 'required|unique:users,phone,' . $user->id,
            'user_code' => 'required|unique:users,user_code,' . $user->id,
            'prefix' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'position' => 'required',
        ], [
            'username.required' => 'ระบุชื่อผู้ใช้.',
            'username.unique' => 'ชื่อผู้ใช้นี้ถูกใช้งานแล้ว.',
            'password.required' => 'ระบุรหัสผ่าน.',
            'email.required' => 'ระบุอีเมล.',
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว.',
            'phone.required' => 'ระบุหมายเลขโทรศัพท์.',
            'phone.unique' => 'หมายเลขโทรศัพท์นี้ถูกใช้งานแล้ว.',
            'user_code.required' => 'ระบุรหัสผู้ใช้.',
            'user_code.unique' => 'รหัสผู้ใช้นี้ถูกใช้งานแล้ว.',
            'first_name.required' => 'ระบุชื่อ.',
            'last_name.required' => 'ระบุนามสกุล.',
        ]);

        $user->update([
            'role' => $request->role,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_code' => $request->user_code,
            'prefix' => $request->prefix,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'position' => $request->position,
        ]);

        // return redirect()->route('route-employee-management');
        return redirect()->back()->with('success', 'แก้ไขบัญชีผู้ใช้แล้ว!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // return redirect()->route('route-employee-management');
        return redirect()->back()->with('success', 'ลบบัญชีผู้ใช้แล้ว!');
    }
}
