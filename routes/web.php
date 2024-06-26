<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', fn () => view('books'))->name('books');
Route::get('/stores', fn () => view('stores'))->name('stores');
Route::get('/login', fn () => view('login'))->name('login');
Route::get('/register', fn () => view('register'))->name('register');
