<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.user.index', compact('users'));
    }

    public function create()
    {
        $statuses = ['Admin', 'Siswa'];

        return view('dashboard.user.create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);

        if($request->status == "Pilih Status") {
            return back()->withErrors([
                'error' => 'Harap pilih status dengan benar!',
            ]);
        };

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('status', 'Data User Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $u = User::find($id);

        return view('dashboard.user.edit', compact('u'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
        ]);

        $user = User::find($id);
        $passwordOldInDatabase = $user->password;

        if($request->passwordOld && $request->password) {
            if(Hash::check($request->passwordOld, $passwordOldInDatabase)) {
                $user = User::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            } else {
                return back()->withErrors([
                    'error' => 'Password Lama Tidak Sesuai'
                ]);
            }
        } else {
            $user = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('user.index')->with('status', 'Data User Berhasil Di Update');
    }
}
