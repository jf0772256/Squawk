<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SquawkController;

//Route::get('/', function () {
//    return view('welcome');
//});

// load index page with squawks
Route::get('/', [SquawkController::class, 'index']);
// load the squawk in to the ui to allow editing it
Route::get('/squawks/{squawk}/edit', [SquawkController::class, 'edit']);

// create a squawk
Route::post('/squawks', [SquawkController::class, 'store']);
//Route::put('/squawks/{squawk}', [SquawkController::class, 'update']);
//Route::delete('/squawks/{squawk}', [SquawkController::class, 'destroy']);
