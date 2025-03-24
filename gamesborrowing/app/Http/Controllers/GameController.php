<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return response()->json(Games::all(), 200);
    }

    public function search($query)
    {
        $games = Games::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('publisher', 'LIKE', "%{$query}%")
                     ->get();

        return response()->json($games, 200);
    }
}

