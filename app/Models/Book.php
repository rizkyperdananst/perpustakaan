<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 
        'category_book_id',
        'slug', 
        'judul', 
        'penerbit', 
        'pengarang', 
        'tahun',
        'lokasi',
        'stok',
        'keterangan',
    ];

    public function category_books()
    {
        return $this->belongsTo(CategoryBook::class, 'category_book_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Borrow::class);
    }
}
