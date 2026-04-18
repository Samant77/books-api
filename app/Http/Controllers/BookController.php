<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
      public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'price'=>'required|numeric',
            'published_date'=>'required|date'
        ]);

        $book = Book::create($request->all());

        return response()->json($book);
    }

    public function index(Request $request)
    {
        $query = Book::where('_deleted',0);

        if ($request->search) {
            $query->where('title','LIKE','%'.$request->search.'%');
        }

        return response()->json(
            $query->paginate(5)
        );
    }

    public function show($id)
    {
        return Book::where('_deleted',0)->findOrFail($id);
    }

    public function update(Request $request,$id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->_deleted = 1;
        $book->save();

        return response()->json(['message'=>'Deleted']);
    }
}
