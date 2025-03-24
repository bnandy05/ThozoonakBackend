<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\BorrowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{query}', [GameController::class, 'search']);

Route::post('/borrows', [BorrowController::class, 'store']);
Route::put('/borrows/{id}/return', [BorrowController::class, 'return']);
Route::get('/borrows', [BorrowController::class, 'index']);