<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function create(Request $request){
        Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return view('welcome');
    }

    public function view(){
        $books = Book::all();

        return view('welcome')->with('semuabuku', $books);
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('update')->with('buku', $book);
    }

    public function update($id, Request $request){
        $book = Book::findOrFail($id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        return redirect('/');
    }

    public function delete($id){
        $book = Book::destroy($id);
        return redirect('/');
    }
}
