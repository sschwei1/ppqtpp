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
| Overview Routes
|--------------------------------------------------------------------------
*/
// overview of all presentations
Route::view('/presOverview', 'overview.presentationOverview')
    ->name('view.overview.presentationOverview');

//overview of all sessions of a presentation
Route::view('/sessionOverview', 'overview.sessionOverview')
    ->name('view.overview.sessionOverview');

//show the question of a session
Route::view('/sessionInfo', 'overview.sessionInfo')
    ->name('view.overview.sessionInfo');

//used to add a new presentation
Route::view('/newPresentation', 'overview.addNewPresentation')
    ->name('view.overview.addNewPresentation');

//used while a presentation is running
Route::view('/runningPresentation', 'overview.runningPres')
    ->name('view.overview.runningPres');


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

