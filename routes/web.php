<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('blog.get');
});

Auth::routes();

Route::get('/home', function () {
    return view('blog.get');
});

Route::get('/new-answer/{blogId}', [App\Http\Controllers\ResponseController::class, 'newAnswer'])->name('new-answer');
Route::get('/answers/{blogId}', [App\Http\Controllers\ResponseController::class, 'showAnswer'])->name('show-answer');

Route::get('/new-blog', function () {
    return view('blog.create');
})->middleware(['auth:sanctum']);

Route::resource('blog', 'App\Http\Controllers\BlogController');
Route::resource('answer', 'App\Http\Controllers\ResponseController');
// ->middleware(['auth:sanctum']);
