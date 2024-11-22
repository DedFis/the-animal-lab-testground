<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::get('/home', [AnimalController::class, 'index'])->name('home');

Route::get('/animals/detail', [AnimalController::class, 'getAllDetail'])->name('animals');

//sengaja GET request
Route::get('/animals/detail/{format}', [AnimalController::class, 'getFormat'])->name('changeFormat');
Route::get('/animals/detail/{format}/search', [AnimalController::class, 'getAnimal'])->name('searchAnimal');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'authenticate']);

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/register', [UserController::class, 'store']);

Route::get('animals/{animal}', [AnimalController::class,'readMore'])->name('read-more');

Route::post('/animals/{animal}', [CommentController::class,'store'])->name('comment.store');

Route::get('/animals/{animal}/{comment}', [CommentController::class,'destroy'])->name('comment.destroy');

Route::get('/about-us', function(){
    return view('pages.about-us');
})->name('about-us');

