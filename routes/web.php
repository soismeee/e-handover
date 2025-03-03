<?php

use App\Http\Controllers\HandOverController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HandOverController::class, 'create']);
Route::get('/hand-over', [HandOverController::class, 'index']);
Route::get('/hand-over/{id}', [HandOverController::class, 'edit']);
Route::get('/getHandOver', [HandOverController::class, 'getHandOver']);
Route::post('/save', [HandOverController::class, 'store']);
Route::post('/jsonHandOver', [HandOverController::class, 'json']);
Route::patch('/change/{id}', [HandOverController::class, 'update']);
Route::delete('/delData/{id}', [HandOverController::class, 'destroy']);
