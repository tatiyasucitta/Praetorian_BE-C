<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'view'])->name('viewbook');
Route::get('/addbook', function () {
    return view('addbook');
});
Route::post('/bookcreated', [BookController::class, 'create'])->name('createbook');
Route::get('/formulirupdate/{id}', [BookController::class, 'edit'])->name('updateform');
Route::patch('/updated/{id}', [BookController::class, 'update'])->name('updatebook');
Route::delete('/delete/{id}', [BookController::class, 'delete'])->name('delete');