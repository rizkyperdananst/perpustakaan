<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard-student.user.index');
    }

    public function edit($id)
    {
        return view('dashboard-student.user.edit');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'password' => 'nullable',
        ]);

        if($request->password) {
            $user = Student::find($id)->update([
                'nama' => $request->nama,
                'nis' => $request->nis,
                'kelas' => $request->kelas,
                'password' => Hash::make($request->password),
            ]);
        }

        $user = Student::find($id)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('user-student.index')->with('status', 'Akun Anda Berhasil Di Update');
    }
}
