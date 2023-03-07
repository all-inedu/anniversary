<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('auth.login');

Route::group(['middleware' => 'admin.auth'], function() {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/uni-shortlisted/{uni}', [AdminController::class, 'getShortlisted']);

    Route::get('/info-session', [AdminController::class, 'infoSession'])->name('admin.info-session');

    Route::get('/info-session/create', [AdminController::class, 'create'])->name('admin.create.info-session');
    Route::post('/info-session', [AdminController::class, 'store'])->name('admin.store.info-session');

    Route::get('/info-session/view/{info_session}', [AdminController::class, 'show'])->name('admin.show.info-session');
    Route::put('/info-session/{status}', [AdminController::class, 'updateStatus'])->name('admin.update-status.info-session');
    Route::put('/info-session/view/{info_session}', [AdminController::class, 'update'])->name('admin.update.info-session');
    Route::delete('/info-session/view/{info_session}', [AdminController::class, 'destroy'])->name('admin.destroy.info-session');

    
    Route::get('/registrant', [AdminController::class, 'registrant'])->name('admin.registrant');
    Route::post('/registrant', [AdminController::class, 'registerClient'])->name('admin.registerClient');

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
});