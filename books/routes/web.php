<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/api/books', [BookController::class, 'getBooks']);
Route::get('/api/books/{query}', [BookController::class, 'searchBooks']);
Route::post('/api/loans', [LoanController::class, 'createLoan']);
Route::put('/api/loans/{id}/return', [LoanController::class, 'returnBook']);
Route::get('/api/loans', [LoanController::class, 'getLoans']);
