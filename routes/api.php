<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'jwt-auth', 'prefix' => 'auth'], function () {
    Route::apiResource('/books', BookController::class);
    Route::apiResource('/stores', StoreController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::post('/register', [UserController::class, 'store'])->name('api.register');
Route::post('/login', [UserController::class, 'login'])->name('api.login');
Route::get('/logout', [UserController::class, 'logout'])->name('api.logout');
Route::get('/test', function (Request $request) {
    return PersonalAccessToken::dd();
});
