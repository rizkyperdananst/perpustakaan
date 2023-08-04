<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\CategoryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryBookController extends Controller
{
    public function index()
    {
        $category_books = CategoryBook::orderBy('id', 'DESC')->get();

        return view('dashboard.category-book.index', compact('category_books'));
    }

    public function create()
    {
        return view('dashboard.category-book.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $category_book = CategoryBook::create($validate); 

        return redirect()->route('category-book.index')->with('status', 'Data Kategori Buku Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $cb = CategoryBook::find($id);

        return view('dashboard.category-book.edit', compact('cb'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $category_book = CategoryBook::find($id)->update($validate);

        return redirect()->route('category-book.index')->with('status', 'Data Kategori Buku Berhasil Di Update');
    }

    public function destroy($id)
    {
        $category_book = CategoryBook::find($id)->delete();

        return redirect()->route('category-book.index')->with('status', 'Data Kategori Buku Berhasil Di Hapus');
    }
}
