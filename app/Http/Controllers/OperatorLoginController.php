<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorLoginController extends Controller
{
    public function operatorLoginForm()
    {
        return view('login.Operator_Login');
    }

    public function loginOperator(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect to the operator dashboard
            return redirect()->route('operator.dashboard')->with('success', 'Anda berhasil masuk.');
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->with('error', 'Kredensial tidak valid. Silakan coba lagi.');
    }

    public function logoutOperator()
    {
        Auth::logout();
        return redirect()->route('operator.login')->with('success', 'Anda berhasil logout.');
    }
}
