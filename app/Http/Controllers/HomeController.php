<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CategoryBook;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->limit(3)->get();
        $category_books = CategoryBook::orderBy('nama_kategori', 'ASC')->get();

        return view('home', compact('books', 'category_books'));
    }

    public function book()
    {
        $b = Book::orderBy('id', 'DESC')->first();
        $books = Book::orderBy('id', 'DESC')->paginate(8);

        return view('book', compact('b', 'books'));
    }

    public function detail_book($slug)
    {
        $b = Book::where('slug', $slug)->first();
        $books = Book::orderBy('id', 'DESC')->paginate(8);

        return view('detail-book', compact('b', 'books'));
    }

    public function category_book($id)
    {
        $cb = CategoryBook::find($id);
        $category_books = CategoryBook::orderBy('nama_kategori', 'ASC')->get();
        $books = Book::where('category_book_id', $id)->get();

        return view('category-book', compact('cb', 'category_books', 'books'));
    }

    public function search_book(Request $request)
    {
        $search = $request->search;
        $books = Book::where('judul', 'LIKE', '%' . $search . '%')->paginate(1);
        $book = Book::orderBy('id', 'DESC')->paginate(8);

        return view('search-book', compact('books', 'book'));
    }
}
