<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class Book extends Controller
{
    public function index() {
        return Book::all();
    }
    public function store(Request $request) {
        return Book::create($request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
            'genre' => 'required|max:100',
            'published_year' => 'required|integer',
        ]));
    }
    public function show(Book $book) {
        return $book;
    }
    public function update(Request $request, Book $book) {
        $book->update($request->all());
        return $book;
    }
    public function destroy(Book $book) {
        $book->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
