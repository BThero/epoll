<?php

use App\Http\Controllers\Auth\SignInController;
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

Route::get('/signed-in', function () {
    return view('signed-in/welcome');
})->middleware('auth')->name('signed-in');

Route::resource('polls', PollController::class);

Route::get('sign-in', [SignInController::class, 'showPhone'])->name('signIn.showPhone');
Route::get('sign-in/verify', [SignInController::class, 'showVerify'])->name('signIn.showVerify');
Route::post('sign-in/store', [SignInController::class, 'savePhone'])->name('signIn.savePhone');
Route::post('sign-in/verify', [SignInController::class, 'verifyPhone'])->name('signIn.verifyPhone');
