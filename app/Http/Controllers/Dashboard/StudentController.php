<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'DESC')->get();

        return view('dashboard.student.index', compact('students'));
    }

    public function create()
    {
        return view('dashboard.student.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:students,nis',
            'kelas' => 'required',
            'password' => 'required',
        ]);

        $student = Student::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('student.index')->with('status', 'Data Siswa Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $s = Student::find($id);

        return view('dashboard.student.edit', compact('s'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
        ]);

        $student = Student::find($id)->update($validate);

        return redirect()->route('student.index')->with('status', 'Data Siswa Berhasil Di Update');
    }

    public function destroy($id)
    {
        $student = Student::find($id)->delete();

        return redirect()->route('student.index')->with('status', 'Data Siswa Berhasil Di Hapus');
    }
}
