<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomePageController::class, 'index'])->name('home_page');

//// All user pages
Route::get('/genre/{genre_id}/show', [BookController::class, 'showBooksByGenre'])->name('books.show');
Route::get('/books/{book_id}/show', [BookController::class, 'showBookDetail'])->name('book.show');

//// Reader pages
// list rentals by status and date
Route::get('/rentals', [BorrowController::class, 'show'])->middleware('auth')->name('rentals.show');
Route::get('/rentals/{rental_id}/show', [BorrowController::class, 'showRentalDetail'])->middleware('auth')->name('rental.show');

Route::get('/rentals/{book_id}/create', [BorrowController::class, 'store'])->middleware('auth')->name('rentals.create');


//// Librarian pages
Route::get('/books/create', [BookController::class, 'create'])->middleware('auth')->name('books.create');
Route::post('/books/store', [BookController::class, 'store'])->middleware('auth')->name('books.store');
Route::get('/books/{book_id}/edit', [BookController::class, 'edit'])->middleware('auth')->name('books.edit');
Route::put('/books/{book_id}', [BookController::class, 'update'])->middleware('auth')->name('books.update');
Route::delete('/books/{book_id}', [BookController::class, 'destroy'])->middleware('auth')->name('books.destroy');

Route::get('/genres/show', [GenreController::class, 'show_genres'])->middleware('auth')->name('genres.show');
Route::get('/genres/create', [GenreController::class, 'create'])->middleware('auth')->name('genres.create');
Route::post('/genres/store', [GenreController::class, 'store'])->middleware('auth')->name('genres.store');
Route::get('/genres/{genre_id}/edit', [GenreController::class, 'edit'])->middleware('auth')->name('genres.edit');
Route::put('/genres/{genre_id}', [GenreController::class, 'update'])->middleware('auth')->name('genres.update');
Route::delete('/genres/{genre_id}', [GenreController::class, 'destroy'])->middleware('auth')->name('genres.destroy');

Route::put('/rentals/{rental_id}', [BorrowController::class, 'update'])->middleware('auth')->name('rentals.update');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');