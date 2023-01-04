<?php

use Illuminate\Support\Facades\Route;
use App\Events\FormSubmitted;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/receiver', function () {
    return view('receiver');
});

Route::get('/sender', function () {
    return view('sender');
});

Route::post('/sender', function () {
    $text = request()->text;
    event(new FormSubmitted($text));
    return view('sender');
});
