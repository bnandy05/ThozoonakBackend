<?php

use App\Http\Controllers\menu;

use Illuminate\Support\Facades\Route;

Route::get('/api/menus', [menu::class, 'index']);
Route::get('/api/menus/search/{query}', [menu::class, 'search']);
Route::post('/api/menus', [menu::class, 'store']);
