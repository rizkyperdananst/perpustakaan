<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use App\Models\CategoryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::orderBy('id', 'DESC')->get();

        return view('dashboard.borrow.index', compact('borrows'));
    }

    public function create()
    {
        // $b = Book::where('id', 1)->pluck('stok')->first();
        // dd($b);

        $students = Student::all();
        $categories = CategoryBook::all();
        $books = Book::all();
        $peminjaman = date('d-F-Y');
        $pengembalian = date('d-F-Y', strtotime('+7 day', strtotime(date('d-m-Y'))));
        $status = 'Meminjam';
        $disetujui = ['Belum Disetujui', 'Sudah Disetujui'];

        return view('dashboard.borrow.create', compact('students', 'categories', 'books', 'peminjaman', 'pengembalian', 'status', 'disetujui'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'student_id' => 'required|integer',
            'book_id' => 'required|integer',
            'peminjaman' => 'required',
            'pengembalian' => 'required',
            'admin' => 'required',
            'status' => 'required',
        ]);

        $book = Book::where('id', $request->book_id)->pluck('stok')->first();

        if($request->book_id) {
            if($book == 0) {
                return back()->withErrors([
                    'error' => 'Buku yang anda pinjam stok nya sudah habis..!'
                ]);
            }
            // dd($request->book_id);
            // Book::find($request->book_id)->increment('stok');
            Book::find($request->book_id)->decrement('stok');
        }

        $borrow = Borrow::create($validate);

        return redirect()->route('borrow.index')->with('status', 'Data Peminjaman Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $b = Borrow::findOrFail($id);
        $students = Student::all();
        $categories = CategoryBook::all();
        $books = Book::all();
        $peminjaman = date('d-F-Y');
        $pengembalian = date('d-F-Y', strtotime('+7 day', strtotime(date('d-m-Y'))));
        $status = ['Meminjam', 'Mengembalikan'];
        $disetujui = ['Belum Disetujui', 'Sudah Disetujui'];

        return view('dashboard.borrow.edit', compact('b', 'students', 'categories', 'books', 'peminjaman', 'pengembalian', 'status', 'disetujui'));
    }

    public function update(Request $request, $id)
    {
        $borrow = $validate = $request->validate([
            'student_id' => 'required|integer',
            'book_id' => 'required|integer',
            'peminjaman' => 'required',
            'pengembalian' => 'required',
            'admin' => 'required',
            'status' => 'required',
        ]);

        if($request->status === 'Mengembalikan') {
            Book::find($request->book_id)->increment('stok');
        }

        $borrow = Borrow::findOrFail($id)->update($validate);

        return redirect()->route('borrow.index')->with('status', 'Data Peminjaman Berhasil Diubah');
    }

    public function destroy($id)
    {
        Borrow::findOrFail($id)->delete();

        return redirect()->route('borrow.index')->with('status', 'Data Peminjaman Berhasil Dihapus');
    }
}
