<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Book;
use Illuminate\Support\Str;
use App\Models\CategoryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();

        return view('dashboard.book.index', compact('books'));
    }

    public function create()
    {
        $category_books = CategoryBook::orderBy('nama_kategori', 'ASC')->get();

        return view('dashboard.book.create', compact('category_books'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|image|file|max:2048|mimes:jpg,jpeg,png',
            'category_book_id' => 'required|integer',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required|max:4',
            'lokasi' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $imageName = Str::slug($request->judul) . rand() . '.' .$extension;
        $path = $request->file('image')->storeAs('cover-books', $imageName, 'public');

        $book = Book::create([
            'image' => $imageName,
            'category_book_id' => $request->category_book_id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'tahun' => $request->tahun,
            'lokasi' => $request->lokasi,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('book.index')->with('status', 'Data Buku Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $b = Book::find($id);

        return view('dashboard.book.show', compact('b'));
    }

    public function edit($id)
    {
        $b = Book::find($id);
        $category_books = CategoryBook::orderBy('nama_kategori', 'ASC')->get();

        return view('dashboard.book.edit', compact('b', 'category_books'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'image' => 'nullable|image|file|max:2048|mimes:jpg,jpeg,png',
            'category_book_id' => 'required|integer',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required|max:4'
        ]);

        $book = Book::find($id);

        if($request->image) {
            $imageOld = 'storage/cover-books/'. $book->image;
            if(File::exists($imageOld)) {
                File::delete($imageOld);

                $extension = $request->file('image')->getClientOriginalExtension();
                $imageName = rand() . '.' .$extension;
                $path = $request->file('image')->storeAs('cover-books', $imageName, 'public');
            }
        } else {
            $imageName = $book->image;
        }

        $book = Book::find($id)->update([
            'image' => $imageName,
            'category_book_id' => $request->category_book_id,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('book.index')->with('status', 'Data Buku Berhasil Di Update');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $imageOld = File::delete('storage/cover-books/'. $book->image);
        $book->delete();

        return redirect()->route('book.index')->with('status', 'Data Buku Berhasil Di Hapus');
    }
}
