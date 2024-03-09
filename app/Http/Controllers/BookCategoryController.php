<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookCategoryController extends Controller
{
    public function addform($id){
        return view('addcattobook', ['buku' => Book::find($id),
                                      'categories' => Category::all()]);
    }

    public function add(Request $request, $id){
        $book = Book::with('Category')->find($id);
        $book->Category()->attach($request->cat_id);
        return redirect('/');
    }
}
