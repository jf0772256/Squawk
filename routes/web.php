<?php

use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SquawkController;

//Route::get('/', function () {
//    return view('welcome');
//});

// load index page with squawks
Route::get('/', [SquawkController::class, 'index']);
// load the squawk in to the ui to allow editing it
Route::get('/squawks/{squawk}/edit', [SquawkController::class, 'edit']);
// display the registration form only when the user is not authenticated
Route::view('/register', 'auth.register')->middleware('guest')->name('register');
Route::view('/login', 'auth.login')->middleware('guest')->name('login');

// create a squawk
Route::post('/squawks', [SquawkController::class, 'store']);
// update database entry for squawk
Route::put('/squawks/{squawk}', [SquawkController::class, 'update']);
// delete database entry for squawk
Route::delete('/squawks/{squawk}', [SquawkController::class, 'destroy']);

// create a new user in the database and log them in
Route::post('/register', Register::class)->middleware('guest');
// log in user when they are guest
Route::post('/login', Login::class)->middleware('guest');
// log out a logged-in user only when they are logged-in.
Route::post('/logout', Logout::class)->middleware('auth');
