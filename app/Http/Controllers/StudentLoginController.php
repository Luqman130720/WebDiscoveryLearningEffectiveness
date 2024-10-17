<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    public function studentLoginForm()
    {
        return view('login.Student_Login');
    }

    public function loginStudent(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba untuk login dengan kredensial siswa
        if (Auth::guard('student')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('student.dashboard'); // Redirect ke dashboard siswa
        }

        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak valid.',
        ]);
    }


    public function logoutStudent()
    {
        Auth::guard('student')->logout();
        return redirect('/login/student');
    }
}
