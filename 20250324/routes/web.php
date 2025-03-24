<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

Route::get('api/books', [BookController::class, 'index']);
Route::get('api/books/{id}', [BookController::class, 'show']);
Route::post('api/books', [BookController::class, 'store']);
Route::put('api/books/{id}', [BookController::class, 'update']);
Route::delete('api/books/{id}', [BookController::class, 'destroy']);

Route::get('api/users', [ReviewController::class, 'getUsers']);
Route::get('api/books/{id}/reviews', [ReviewController::class, 'index']);
Route::post('api/reviews', [ReviewController::class, 'store']);
Route::put('api/reviews/{id}', [ReviewController::class, 'update']);
Route::delete('api/reviews/{id}', [ReviewController::class, 'destroy']);