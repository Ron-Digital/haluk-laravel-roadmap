<?php

use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->prefix('users')->group(function() {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{user}', 'show');
    Route::put('/{user}', 'update');
    Route::delete('/{user}', 'destroy');
});

Route::controller(PostController::class)->prefix('posts')->group(function() {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{post}', 'show');
    Route::put('/{post}', 'update');
    Route::delete('/{post}', 'destroy');
});

Route::controller(CommentController::class)->prefix('comments')->group(function() {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{comment}', 'show');
    Route::put('/{comment}', 'update');
    Route::delete('/{comment}', 'destroy');
});
