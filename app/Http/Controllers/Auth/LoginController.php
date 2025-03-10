<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view(view: 'auth.sign_in');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     $request->session()->put('session_start_time', now());

        //     return redirect()->intended('backoffice');
        // }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('session_start_time', now());

            $user = Auth::user();
            if ($user->role == 'TEACHER') {
                return redirect()->route('route-teacher-dashboard');
            } elseif (in_array($user->role, ['ADMIN', 'SUPER_ADMIN'])) {
                return redirect()->route('route-backoffice');
            }

            return redirect()->intended('route-welcome');
        }

        // return back()->withErrors([
        //     'username' => 'The provided credentials do not match our records.',
        // ]);

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->with('login_error', 'ลงชื่อเข้าใช้งานไม่สำเร็จ กรุณาลองใหม่อีกครั้ง');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('sign-in');
    }
}
