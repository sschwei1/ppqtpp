<?php

use App\Http\Controllers\AskController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Php Info
|--------------------------------------------------------------------------
*/
// php info file
Route::view('/phpinfo', 'phpinfo');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
// user login page
Route::view('/login', 'users.login')
    ->name('view.user.login');

// user login controller
Route::post('/users/login', [UsersController::class, 'login'])
    ->name('user.login');

/*
|--------------------------------------------------------------------------
| Ask Routes
|--------------------------------------------------------------------------
*/
// join presentation page
Route::view('/ask', 'ask.join')
    ->name('view.ask.join');

// join action in controller
Route::post('/ask/join', [AskController::class, 'join'])
    ->name('ask.join');

// get route which renders question page with necessary parameters
Route::get('/ask/{id}', [AskController::class, 'load'])
    ->name('view.ask.question');

// handles asked question
Route::post('/ask/question', [AskController::class, 'question'])
    ->name('ask.question');
