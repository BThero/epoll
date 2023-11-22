<?php

use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PollController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can sign-in web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', HomeController::class)->middleware('auth')->name('home');

Route::resource('polls', PollController::class);

Route::view('sign-in', 'sign-in/phone');
Route::get('sign-in/verify/{phone_number}', function (string $phone_number) {
    return view('sign-in/verify', [
        'phone_number' => $phone_number,
    ]);
});

Route::post('sign-in/phone', [SignInController::class, 'savePhone'])->name('signIn.savePhone');
Route::post('sign-in/verify', [SignInController::class, 'verifyPhone'])->name('signIn.verifyPhone');
