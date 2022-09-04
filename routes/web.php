<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\NationController;
use \App\Http\Controllers\PhotoController;
use App\Http\Controllers\PageController;

Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get('/detail/{slug}',[PageController::class,'detail'])->name('page.detail');
Route::get('/category/{slug}',[PageController::class,'postByCategory'])->name('page.category');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('testing')->name('home');
Route::get('/test',[HomeController::class,'test'])->middleware('testing')->name('test');

Route::middleware('auth')->prefix('dashboard')->group(function (){
    Route::resource('category',CategoryController::class);
    Route::resource('post',PostController::class);
    Route::resource('user',UserController::class);
    Route::resource('nation',NationController::class);
    Route::resource('photo',PhotoController::class);
});



