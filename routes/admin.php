<?php

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
});

Route::get('/dashboard', function () {
    return view('admin.page.dashboard');
});

Route::get('/info-session', function () {
    return view('admin.page.info-session');
});

Route::get('/info-session/create', function () {
    return view('admin.page.info-session.form');
});

Route::get('/info-session/view/1', function () {
    return view('admin.page.info-session.form');
});

Route::get('/registrant', function () {
    return view('admin.page.registrant');
});