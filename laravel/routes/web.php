<?php

use App\Http\Controllers\AskController;
use App\Http\Controllers\PresentationController;
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

// user logout via url
Route::get('/logout', [UsersController::class, 'logout'])
    ->name('view.user.logout');

// user logout via request
Route::post('/users/logout', [UsersController::class, 'logout'])
    ->name('user.logout');


/*
|--------------------------------------------------------------------------
| Presentation Routes
|--------------------------------------------------------------------------
*/
// overview of all presentations
Route::get('/presentation/overview', [PresentationController::class, 'overview'])
    ->name('view.presentation.overview');

//overview of all sessions of a presentation
Route::get('/{id}/session/overview', [PresentationController::class, 'sessionOverview'])
    ->name('view.session.overview');

//show the question of a session
Route::get('/{presentationId}/session/info/{sessionId}', [PresentationController::class, 'sessionInfo'])
    ->name('view.session.info');

//used to add a new presentation
Route::get('/presentation/add', [PresentationController::class, 'presentationAddPage'])
    ->name('view.presentation.add');

//used to add a new presentation
Route::post('/presentation/add', [PresentationController::class, 'presentationAdd'])
    ->name('presentation.add');

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
