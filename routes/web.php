<?php

use App\Http\Controllers\HandOverController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HandOverController::class, 'create']);
Route::get('/hand-over', [HandOverController::class, 'index']);
