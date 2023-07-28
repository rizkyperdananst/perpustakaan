<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
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
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'nullable',
        ]);

        if($request->password) {
            $user = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make($request->password),
            ]);
        }

        $user = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        return redirect()->route('user-student.index')->with('status', 'Akun Anda Berhasil Di Update');
    }
}
