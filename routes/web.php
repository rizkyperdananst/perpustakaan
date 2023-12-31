<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginStudentController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\BorrowController;
use App\Http\Controllers\Dashboard\ReturnController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CategoryBookController;
use App\Http\Controllers\Student\BookController as StudentBookController;
use App\Http\Controllers\Student\BorrowHistoryController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\UserController as StudentUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/book', [HomeController::class, 'book'])->name('book');
Route::get('/book/detail/{slug}', [HomeController::class, 'detail_book'])->name('detail-book');
Route::get('/category-book/{id}', [HomeController::class, 'category_book'])->name('category-book');
Route::get('/search-book', [HomeController::class, 'search_book'])->name('search-book');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register-student', [RegisterController::class, 'registerProcess'])->name('registerProcess');

Route::get('/login-student', [LoginStudentController::class, 'login'])->name('login-student');
Route::post('/authenticate-student', [LoginStudentController::class, 'authenticate'])->name('authenticate-student');

Route::group(['middleware' => ['auth:user']], function() {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

        Route::resource('/category-book', CategoryBookController::class);
        Route::resource('/book', BookController::class);
        Route::resource('/student', StudentController::class);
        Route::resource('/borrow', BorrowController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/return', ReturnController::class);
    });
});

Route::group(['middleware' => ['auth:student']], function() {
    Route::prefix('/student')->group(function() {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard.siswa');
        Route::post('/logout-student', [LoginStudentController::class, 'logout'])->name('logout-student');

        Route::resource('/user-student', StudentUserController::class);
        Route::resource('/book-student', StudentBookController::class);
        Route::resource('/borrow-history', BorrowHistoryController::class);
    });
});
