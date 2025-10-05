<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SquawkController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [SquawkController::class, 'index']);
