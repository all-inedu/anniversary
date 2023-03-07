<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/check/mail', [RegisterController::class, 'checkMail'])->name('register.check_mail');


Route::get('/scholarship', function () {
    return view('home.scholarship');
});

Route::get('/user/{uuid}', [RegisterController::class, 'profile'])->name('user.profile');
Route::put('/user/{uuid}', [RegisterController::class, 'updateProfile'])->name('user.update.profile');
// Route::delete('/user/{universityid}', [RegisterController::class, 'destroyProfile'])->name('user.destroy.profile');