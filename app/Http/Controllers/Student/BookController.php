<?php

namespace App\Http\Controllers\Student;

use App\Models\Book;
use App\Models\Student;
use App\Models\CategoryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Borrow;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();

        return view('dashboard-student.book.index', compact('books'));
    }

    public function create()
    {
        $students = Student::all();
        $categories = CategoryBook::all();
        $books = Book::all();
        $peminjaman = date('d-F-Y');
        $pengembalian = date('d-F-Y', strtotime('+7 day', strtotime(date('d-m-Y'))));
        $status = 'Meminjam';
        $allow = 'Belum Disetujui';

        return view('dashboard-student.book.create-borrow', compact('students', 'categories', 'books', 'peminjaman', 'pengembalian', 'status', 'allow'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'student_id' => 'required|integer',
            'book_id' => 'required|integer',
            'peminjaman' => 'required',
            'pengembalian' => 'required',
            'admin' => 'required',
            'status' => 'required',
        ]);

        $book = Book::where('id', $request->book_id)->pluck('stok')->first();

        if($request->book_id) {
            if($book === 0) {
                return back()->withErrors([
                    'error' => 'Buku yang anda pinjam stok nya sudah habis..!'
                ]);
            }
            Book::find($request->book_id)->decrement('stok');
        }

        $create_borrow = Borrow::create($validator);

        return redirect()->route('book-student.index')->with('status', 'Data Peminjaman Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $b = Book::find($id);

        return view('dashboard-student.book.show', compact('b'));
    }
}
