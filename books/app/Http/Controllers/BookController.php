<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getBooks()
    {
        return response()->json(Book::all());
    }

    public function searchBooks($query)
    {
        return response()->json(Book::where('title', 'like', "%$query%")
            ->orWhere('author', 'like', "%$query%")
            ->get());
    }
}

