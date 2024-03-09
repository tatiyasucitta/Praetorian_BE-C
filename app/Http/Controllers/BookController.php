<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function addbookform(){
        return view('addbook')->with('authors', Author::all());
    }

    public function create(Request $request){
        $request->validate([
            'title' => 'required | min:5 | max:30',
            'bookpic' => 'mimes:jpg, jpeg, png'
        ]);

        if($request->hasFile('bookpic')){
            $path = '/public/bookimage/images/';
            $image = $request->file('bookpic');
            $image_name = Str::random(5).'_'.$image->getClientOriginalName();
            $image->storeAs($path, $image_name);
        }

        Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $image_name,
            'author_id' => $request->author_id
        ]);

        return redirect('/');
    }

    public function view(){
        $books = Book::all();

        return view('welcome')->with('semuabuku', $books);
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        $authors = Author::all();
        return view('update', ['buku' => $book, 
                                'authors' => $authors]);
    }

    public function update($id, Request $request){
        $request->validate([
            'title' => 'required | min:5 | max:30',
            'bookpic' => 'mimes:jpg, jpeg, png'
        ]);

        $path = '/public/bookimage/images/';
        Storage::delete($path.Book::find($id)->image);

        $image = $request->file('bookpic');
        $image_name = Str::random(5).'_'.$image->getClientoriginalName();
        $image->storeAs($path, $image_name);

        $book = Book::findOrFail($id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'stock' => $request->stock,
            'author_id' => $request->author_id,
            'image' => $image_name
        ]);
        return redirect('/');
    }

    public function delete($id){
        $book = Book::destroy($id);
        return redirect('/');
    }
}
