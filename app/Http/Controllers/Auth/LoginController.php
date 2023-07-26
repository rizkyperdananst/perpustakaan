<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $creadentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($creadentials) && Auth::user()->status === 'Admin') 
        {
            $request->session()->regenerateToken();

            return redirect()->route('dashboard.admin');
        }

        return back()->withErrors([
            'email' => 'Maaf, email atau password salah. Silahkan coba lagi! 😛',
        ])->onlyInput('email');
    }
}
