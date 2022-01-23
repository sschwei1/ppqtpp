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
Route::get('/login', [UsersController::class, 'loginPage'])
    ->name('view.user.login');

// user login controller
Route::post('/users/login', [UsersController::class, 'login'])
    ->name('user.login');


/*
|--------------------------------------------------------------------------
| Overview Routes
|--------------------------------------------------------------------------
*/
// overview of all presentations
Route::view('/presentation/overview', 'presentation.overview')
    ->name('view.presentation.overview');

//overview of all sessions of a presentation
Route::view('/session/overview', 'session.overview')
    ->name('view.session.overview');

//show the question of a session
Route::view('/session/info/{id}', 'session.info')
    ->name('view.session.info');

//used to add a new presentation
Route::view('/presentation/add', 'presentation.add')
    ->name('view.presentation.add');

//used while a presentation is running
Route::view('/presentation/running', 'presentation.running')
    ->name('view.presentation.running');


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


/*
|--------------------------------------------------------------------------
| Redirects
|--------------------------------------------------------------------------
*/
// redirect to ask page if route is empty
Route::redirect('/', '/ask');
