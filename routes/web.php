<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect(route('user.login'));
    }
});

Route::name('user.')->group(function() {
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('/login', function() {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::get('/login/recover', function() {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('recover');
    })->name('recover');

    Route::get('/register', function () {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('register');
    });

    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'save']);

});


Route::get('/FR2023', function () {
    return view('welcome');
});
