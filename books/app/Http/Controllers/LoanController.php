<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function getLoans()
    {
        return response()->json(Loan::all());
    }

    public function createLoan(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
        ]);

        $book = Book::find($request->book_id);
        if ($book->available_copies <= 0) {
            return response()->json(['message' => 'Nincs elérhető példány'], 400);
        }

        $loan = Loan::create([
            'book_id' => $request->book_id,
            'borrower_name' => $request->borrower_name,
            'borrowed_at' => now(),
        ]);

        $book->decrement('available_copies');

        return response()->json($loan, 201);
    }

    public function returnBook($id)
    {
        $loan = Loan::findOrFail($id);
        if ($loan->returned_at) {
            return response()->json(['message' => 'A könyv már vissza lett adva'], 400);
        }

        $loan->update(['returned_at' => now()]);
        $loan->book->increment('available_copies');

        return response()->json($loan);
    }
}