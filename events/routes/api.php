<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\PhotographerEventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\UserEventsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('events', EventController::class);
Route::resource('users', UserController::class);
Route::resource('photographers', PhotographerController::class);

//ugnjezdeni resursi
Route::get('/users/{id}/events', [UserEventController::class, 'index'])
->name('users.events.index');
Route::get('/photographers/{id}/events', [PhotographerEventController::class, 'index'])
->name('photographers.events.index');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//grupne rute
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    //parcijalne rute
    Route::resource('events', EventController::class)->only(['update','store','destroy']);

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
