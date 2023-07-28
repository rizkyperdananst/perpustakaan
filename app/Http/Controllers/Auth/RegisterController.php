<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $validator = $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'password' => 'required',
        ]);

        $student = Student::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login-student')->with('status', 'Anda Berhasil Membuat Akun 👌');
    }
}
