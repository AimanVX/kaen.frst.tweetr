<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Tweetcontroller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Tweetcontroller::class ,'index'] )->name('home');

Route::get('/register', [RegisterController::class ,'create'] )->name('register');
Route::post('/register',[RegisterController::class ,'store'] );

Route::get('/login', [LoginController::class ,'create'] )->name('login');
Route::post('/login',[LoginController::class ,'store'] );


Route::post('/logout',LogoutController::class )->name('logout');


Route::get('/tweet/{tweet}', [Tweetcontroller::class ,'view'] )->name('tweet.view');
Route::post('/tweet/create',[Tweetcontroller::class ,'store'])->name('tweet.create');



