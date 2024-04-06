<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\UserController;

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

<<<<<<< HEAD
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){
    Route::get('/', [BookController::class, 'view'])->name('viewbook');

    Route::prefix('admin')->middleware(['isAdmin'])->group(function(){
        Route::controller(BookController::class)->group(function (){
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
    });
});
=======
Route::middleware(['auth'])->group(function(){
    Route::get('/', [BookController::class, 'view'])->name('viewbook');

    Route::prefix('admin')->middleware(['isAdmin'])->group(function(){
        Route::controller(BookController::class)->group(function (){
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
    });
});

Route::controller(UserController::class)->group(function(){
    Route::get('/register-form', 'viewRegisterForm')->name('register.form');
    Route::post('/register', 'register')->name('register');
    Route::get('/login-form', 'viewLoginForm')->name('login.form');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});
>>>>>>> 6e4e55f5d61393730f16ab677527c73693f81130
