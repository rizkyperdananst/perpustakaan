<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function index()
    {
        $borrows = Borrow::where('status', 'Mengembalikan')->get();

        return view('dashboard.return.index', compact('borrows'));
    }
}
