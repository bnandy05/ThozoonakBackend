<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

Route::get('/api/foods', [FoodController::class, 'index']);
Route::post('/api/foods', [FoodController::class, 'store']);
Route::get('/api/ingredients', [FoodController::class, 'listIngredients']);
Route::get('/api/foods/search/{ingredient}', [FoodController::class, 'searchByIngredient']);

