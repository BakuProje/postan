<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('beranda');
})->name('beranda.index');

Route::view('/info', 'beranda')->name('info.index');
Route::view('/contact', 'beranda')->name('contact.index');

Route::get('/login', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('admin.transactions');
    }
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, request()->boolean('remember'))) {
        request()->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('admin.transactions');
    }

    return back()->withInput()->withErrors([
        'email' => 'Email atau kata sandi yang Anda masukkan belum sesuai.',
    ]);
})->name('login.store');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/dashboard/transactions', [DashboardController::class, 'transactions'])
    ->name('admin.transactions')
    ->middleware('auth');

Route::get('/dashboard/products', [DashboardController::class, 'products'])
    ->name('admin.products')
    ->middleware('auth');

Route::get('/dashboard/categories', [DashboardController::class, 'categories'])
    ->name('admin.categories')
    ->middleware('auth');

Route::get('/dashboard/users', [DashboardController::class, 'users'])
    ->name('admin.users')
    ->middleware('auth');

Route::get('/dashboard/users/create', [DashboardController::class, 'createUser'])
    ->name('admin.users.CreateKasir')
    ->middleware('auth');

Route::post('/dashboard/users', [DashboardController::class, 'storeUser'])
    ->name('admin.users.store')
    ->middleware('auth');

Route::get('/dashboard/users/{user}/edit', [DashboardController::class, 'editUser'])
    ->name('admin.users.EditKasir')
    ->middleware('auth');

Route::put('/dashboard/users/{user}', [DashboardController::class, 'updateUser'])
    ->name('admin.users.update')
    ->middleware('auth');

Route::delete('/dashboard/users/{user}', [DashboardController::class, 'deleteUser'])
    ->name('admin.users.delete')
    ->middleware('auth');

Route::get('/dashboard/profile', [DashboardController::class, 'profile'])
    ->name('admin.profile')
    ->middleware('auth');

Route::put('/dashboard/profile', [DashboardController::class, 'updateProfile'])
    ->name('admin.profile.update')
    ->middleware('auth');

Route::view('/password', 'auth.lupa-password')->name('password.request');

Route::post('/lupa-password', function () {
    request()->validate(['email' => ['required', 'email']]);

    $status = Password::sendResetLink(request()->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withInput()->withErrors(['email' => __($status)]);
})->name('password.email');
