<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookCategoryController;

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

Route::controller(BookController::class)->group(function (){
    Route::get('/', 'view')->name('viewbook');
    Route::get('/addbook','addbookform')->name('add.book.form');
    Route::post('/bookcreated',  'create')->name('createbook');
    Route::get('/formulirupdate/{id}', 'edit')->name('updateform');
    Route::patch('/updated/{id}','update')->name('updatebook');
    Route::delete('/delete/{id}','delete')->name('delete');
});

Route::controller(AuthorController::class)->group(function (){
    Route::get('/create-author-form','createform')->name('create.form');
    Route::post('/author-created','create')->name('create.author');
});

Route::controller(CategoryController::class)->group(function (){
    Route::get('/create-category-form',  'createform')->name('create.cat.form');
    Route::post('/category-created', 'create')->name('create.cat');
});

Route::controller(BookCategoryController::class)->group(function (){
    Route::get('/add-category-form/{id}', 'addform')->name('add.category');
    Route::post('add-category/{id}', 'add')->name('add.category.book');
});
