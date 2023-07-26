<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 
        'book_id', 
        'peminjaman', 
        'pengembalian', 
        'admin', 
        'status'
    ];

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
