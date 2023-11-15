<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PollController;
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

Route::get('/signed-in', function () {
    return view('signed-in/welcome');
})->middleware('auth')->name('signed-in');

Route::resource('polls', PollController::class);
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');
Route::post('register/verify', [RegisterController::class, 'verify'])->name('register.verify');

Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('login/verify', [LoginController::class, 'verify'])->name('login.verify');
