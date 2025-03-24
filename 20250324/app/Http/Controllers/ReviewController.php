<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($book_id) {
        return Review::where('book_id', $book_id)
            ->with('user:id,name')
            ->get();
    }

    public function store(Request $request) {
        return Review::create($request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable',
        ]));
    }

    public function update(Request $request, Review $review, $id) {
        $validatedData = $request->validate([
            'book_id' => 'sometimes|required|exists:books,id',
            'user_id' => 'sometimes|required|exists:users,id',
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'nullable',
        ]);
        
        $review->find($id)->update($validatedData);
        return $review;
    }

    public function destroy(Review $review) {
        $review->delete();
        return response()->json(['message' => 'Deleted']);
    }

    public function getUsers() {
        $users = User::all();
        return $users;
    }
}
