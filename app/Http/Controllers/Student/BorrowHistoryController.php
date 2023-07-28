<?php

namespace App\Http\Controllers\Student;

use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BorrowHistoryController extends Controller
{
    public function index()
    {

        $borrow_history = Borrow::where('student_id', Auth::guard('student')->user()->id)->get();
        $status = Borrow::where('student_id', Auth::guard('student')->user()->id)->where('admin', 'Belum Disetujui');

        // dd($status);

        return view('dashboard-student.borrow-history.index', compact('borrow_history', 'status'));
    }
}
