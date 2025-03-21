<?php

namespace App\Http\Controllers;

use App\Models\DailyMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class menu extends Controller {
    public function index(){
        return response()->json(DailyMenu::all());
    }

    public function search($query){
        $menus = DailyMenu::where('name', 'LIKE', "%$query%")
            ->orWhere('category', 'LIKE', "%$query%")
            ->get();
        return response()->json($menus);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $menu = DailyMenu::create($request->all());
        return response()->json($menu, 201);
    }
}
