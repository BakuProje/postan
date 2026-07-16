<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('beranda');
})->name('beranda.index');

Route::view('/info', 'beranda')->name('info.index');
Route::view('/contact', 'beranda')->name('contact.index');

Route::view('/login', 'auth.login')->name('login');

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, request()->boolean('remember'))) {
        request()->session()->regenerate();

        return redirect()->intended('/');
    }

    return back()->withInput()->withErrors([
        'email' => 'Email atau kata sandi yang Anda masukkan belum sesuai.',
    ]);
})->name('login.store');

Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

Route::post('/forgot-password', function () {
    request()->validate(['email' => ['required', 'email']]);

    $status = Password::sendResetLink(request()->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withInput()->withErrors(['email' => __($status)]);
})->name('password.email');
