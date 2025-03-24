<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Games;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        return response()->json(Borrow::with('game')->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'borrower_name' => 'required|string',
            'borrowed_at' => 'required|date',
        ]);

        $game = Games::find($request->game_id);

        if ($game->available_copies <= 0) {
            return response()->json(['error' => 'Nincs elérhető példány!'], 400);
        }

        $borrow = Borrow::create([
            'game_id' => $request->game_id,
            'borrower_name' => $request->borrower_name,
            'borrowed_at' => $request->borrowed_at,
            'returned_at' => null,
        ]);

        $game->decrement('available_copies');

        return response()->json($borrow, 201);
    }

    public function return($id)
    {
        
        $borrow = Borrow::findOrFail($id);

        if ($borrow->returned_at !== null) {
            return response()->json(['error' => 'Ez a kölcsönzés már vissza lett véve!'], 400);
        }

        $borrow->update(['returned_at' => now()]);

        $game = Games::findOrFail($borrow->game_id);

        $game->increment('available_copies');

        return response()->json(['message' => 'Kölcsönzés visszavétele sikeres!'], 200);
    }
}