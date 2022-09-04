<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\NationController;
use \App\Http\Controllers\PhotoController;
use App\Http\Controllers\PageController;
use \Illuminate\Support\Facades\Mail;
use \App\Mail\TestMail;

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

Route::get('/sendmail',function (){
    $title = 'Aung Paing Soe';
    $description = 'Loram Maintenance of Way, Inc. is a railroad maintenance equipment and services provider. Loram provides track maintenance services to freight, passenger, and transit railroads worldwide, as well as sells and leases equipment which performs these';


    // php artisan make:mail TestMail //

    $mail = [
        'aps@gmail.com',
        'pp@gmail.com',
        'hello@gmail.com',
        'alpha@gmail.com',
        'helloWorld@gmail.com'
    ];

    Mail::to($mail)->send(new TestMail($title,$description));

});


