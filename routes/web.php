<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

$ControllerPath = 'App\Http\Controllers';

Route::view('/home', 'home')->middleware('auth')->name('home');

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect(route('login'));
    }
    return view('home');
})->name('home');

Route::get('/login', function() {
    if (Auth::check()) {
        return redirect(route('home'));
    }
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'Login'])->name('login-post');

Route::get('/register', function() {
    if(Auth::check()) {
        return redirect(route('home'));
    }
    return view('register');
})->name('register');

Route::get('/quit', function() {
    if (Auth::check()) {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
})->name('quit');

Route::post('/register', [AuthController::class, 'save'])->name('register-post');
