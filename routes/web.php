<?php

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

Route::resource('polls', PollController::class);
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');
Route::post('register/verify', [RegisterController::class, 'verify'])->name('register.verify');
