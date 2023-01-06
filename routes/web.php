<?php

use Illuminate\Support\Facades\Route;
use App\Events\FormSubmitted;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemSearchController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', [UserController::class, 'index']);

//Route::get('items-lists', ItemSearchController::class, 'index')->name('items-lists');
//Route::post('/create-item', ItemSearchController::class, 'create')->name('create-item');
Route::get('/create-item',  function() {
    return view('item-search');
});

Route::post('/create-item', [ItemSearchController::class,'create']);

Route::get('/create-item', [ItemSearchController::class,'index']);

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
