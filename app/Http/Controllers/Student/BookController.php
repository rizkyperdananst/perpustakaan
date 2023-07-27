<?php

namespace App\Http\Controllers\Student;

use App\Models\Book;
use App\Models\Student;
use App\Models\CategoryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return view('dashboard-student.book.create-borrow', compact('students', 'categories', 'books', 'peminjaman', 'pengembalian', 'status'));
    }

    public function show($id)
    {
        $b = Book::find($id);

        return view('dashboard-student.book.show', compact('b'));
    }
}
