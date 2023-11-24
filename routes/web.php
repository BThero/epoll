<?php

use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ResponseController;
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

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::get('home', HomeController::class)->name('home');
    Route::resource('polls', PollController::class);
    Route::resource('options', OptionController::class);
    Route::resource('responses', ResponseController::class);
    Route::get('polls/{poll}/responses', [PollController::class, 'showResponses'])->name('polls.responses');
});

Route::view('sign-in', 'sign-in/phone');
Route::get('sign-in/verify/{phone_number}', function (string $phone_number) {
    return view('sign-in/verify', [
        'phone_number' => $phone_number,
    ]);
});
Route::post('sign-in/phone', [SignInController::class, 'savePhone'])->name('signIn.savePhone');
Route::post('sign-in/verify', [SignInController::class, 'verifyPhone'])->name('signIn.verifyPhone');
