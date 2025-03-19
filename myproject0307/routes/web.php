<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task;

Route::controller(Task::class)->group(function () {
    Route::get('/api/tasks', 'getTasks');
    Route::post('/api/tasks', 'uploadTask');
    Route::put('/api/tasks/{id}', 'modifyTask');
    Route::delete('/api/tasks/{id}', 'deleteTask');
});
