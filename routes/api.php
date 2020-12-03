<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [LoginController::class, 'login']);
Route::post('/register',[RegisterController::class, 'register']);

//protected routes
Route::middleware(['auth:api'])->group( function() {
    // Route::get('login', 'LoginController@login');
    // Route::post('register', 'RegisterController@register');
    Route::get('/blogs', [BlogController::class, 'index']);
});