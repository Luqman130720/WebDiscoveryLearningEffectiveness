<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherLoginController extends Controller
{
    public function teacherLoginForm()
    {
        return view('login.Teacher_Login');
    }

    public function loginTeacher(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek kredensial menggunakan guard 'teacher'
        if (Auth::guard('teacher')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/teacher');
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/login/teacher')->with('success', 'Anda telah logout.');
    }
}
