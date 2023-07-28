<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginStudentController extends Controller
{
    public function login()
    {
        return view('auth.login-student');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nis' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerateToken();

            return redirect()->route('dashboard.siswa');
        }

        return back()->withErrors([
            'error' => 'Pastikan Anda Sudah Mempunyai Akun!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');

    }
}
