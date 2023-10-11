<?php

use App\Http\Controllers\BookController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/add_book_view', function () {
    return view('add_books');
})->name('add_book_view');

Route::get('/', [BookController::class, 'show'])->name('show_books');
Route::post('/add_book', [BookController::class, 'store'])->name('books.store');
Route::get('/books_delete/{id}', [BookController::class,'delete_book'])->name('delete_book');
Route::get('/edit_book/{id}', [BookController::class,'edit_book'])->name('edit_book');
Route::post('/update_book/{id}', [BookController::class,'update_book'])->name('update_book');
Route::get('/issue_book/{id}', [BookController::class,'issue_book'])->name('issue_book');
Route::post('/issue_books_store/{book_id}', [BookController::class,'issue_books_store'])->name('issue_books_store');
Route::get('/return_books', [BookController::class,'return_books_view'])->name('return_books_view');
Route::post('/return_books', [BookController::class,'issue_books_return'])->name('issue_books_return');