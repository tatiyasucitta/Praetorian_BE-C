<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookControllerApi extends Controller
{
    public function index(){
        $books = Book::all();
        return response($books, 200);
    }
    public function create(Request $request){
        $validate = Validator::make($request->all(), [
            "title" => "required | min:5"
        ]);
        
        if($validate->fails()){
            return response()->json([
                "error_messages" => $validate->messages()
            ], 422);
        }else{
            $bookcreate = Book::create([
                'title' => $request->title,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $request->foto,
                'author_id' => $request->author_id
            ]);
            return response()->json([
                "book" => $bookcreate
            ], 200);
        }
    }
    public function show($id){
        $book = Book::find($id);
        if($book){
            return response()->json([
                $book
            ],200);
        }else{
            return response()->json([
                "error" => "buku tidak ditemukan"
            ], 404);
        }
    }
}
