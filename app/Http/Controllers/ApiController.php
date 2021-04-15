<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Book;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;


class ApiController extends Controller
{
    public function getAllBooks() {
     
          $Books = Book::get()->toJson(JSON_PRETTY_PRINT);
          
          if(!empty($Books)){
              return response($Books, 200);
          }else {
            return response()->json([
                "message" => "No Book found"
            ], 404);
          }
    }
  
      public function createBook(Request $request) {
        $Book = new Book;
        $Book->tittle = $request->tittle;
        $Book->author = $request->author;
        $Book->category = $request->category;
       
        if($Book->save()){
          return response()->json([
              "message" => "Book record created"
          ], 201);
        }else{
          return response()->json([
            "message" => "Error Adding New book"
        ], 201);
        }
      }
  
      public function getBook($id) {
        if (Book::where('id', $id)->exists()) {
            $Book = Book::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($Book, 200);
          } else {
            return response()->json([
              "message" => "Book not found"
            ], 404);
          }
      }
  
      public function updateBook(Request $request, $id) {
        if (Book::where('id', $id)->exists()) {
            $Book = Book::find($id);
            $Book->tittle = is_null($request->tittle) ? $Book->tittle : $request->tittle;
            $Book->author = is_null($request->author) ? $Book->author : $request->author;
            $Book->category = is_null($request->category) ? $Book->category : $request->category;
            $Book->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
            
        }
      }
  
      public function deleteBook ($id) {
        if(Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Book not found"
            ], 404);
          }
      }
  
}
