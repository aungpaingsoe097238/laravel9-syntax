<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('testing')->name('home');
Route::get('/test',[HomeController::class,'test'])->middleware('testing')->name('test');

Route::middleware('auth')->group(function (){
    Route::resource('category',CategoryController::class)->except('show');
    Route::resource('post',PostController::class);
    Route::resource('user',UserController::class);
});



