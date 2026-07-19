<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;

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

        $user = Auth::user();
        try {
            \App\Models\Notification::create([
                'type' => $user->role === 'admin' ? 'system' : 'login',
                'title' => ($user->role === 'admin' ? 'Admin ' : 'Kasir ') . $user->name . " login",
                'subtitle' => $user->role === 'admin' ? 'Sesi Admin dimulai' : "Shift " . ($user->shift ?? 'Harian') . " dimulai",
            ]);
        } catch (\Exception $e) {
            // Ignore
        }

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

Route::post('/dashboard/expenses', [DashboardController::class, 'storeExpense'])
    ->name('admin.expenses.store')
    ->middleware('auth');

Route::get('/dashboard/transactions', [TransactionController::class, 'transactions'])
    ->name('admin.transactions')
    ->middleware('auth');
Route::post('/dashboard/transactions', [TransactionController::class, 'storeTransaction'])
    ->name('admin.transactions.store')
    ->middleware('auth');

Route::get('/dashboard/products', [ProductController::class, 'products'])
    ->name('admin.products')
    ->middleware('auth');
    
Route::get('/dashboard/products/create', [ProductController::class, 'createProduct'])
    ->name('admin.products.create')
    ->middleware('auth');

Route::post('/dashboard/products', [ProductController::class, 'storeProduct'])
    ->name('admin.products.store')
    ->middleware('auth');
Route::get('/dashboard/products/{product}/edit', [ProductController::class, 'editProduct'])
    ->name('admin.products.edit')
    ->middleware('auth');

Route::put('/dashboard/products/{product}', [ProductController::class, 'updateProduct'])
    ->name('admin.products.update')
    ->middleware('auth');

Route::delete('/dashboard/products/{product}', [ProductController::class, 'deleteProduct'])
    ->name('admin.products.delete')
    ->middleware('auth');

Route::get('/dashboard/categories', [CategoryController::class, 'categories'])
    ->name('admin.categories')
    ->middleware('auth');

Route::get('/dashboard/categories/create', [CategoryController::class, 'createCategory'])
    ->name('admin.categories.create')
    ->middleware('auth');

Route::post('/dashboard/categories', [CategoryController::class, 'storeCategory'])
    ->name('admin.categories.store')
    ->middleware('auth');

Route::get('/dashboard/categories/{category}/edit', [CategoryController::class, 'editCategory'])
    ->name('admin.categories.edit')
    ->middleware('auth');

Route::put('/dashboard/categories/{category}', [CategoryController::class, 'updateCategory'])
    ->name('admin.categories.update')
    ->middleware('auth');

Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'deleteCategory'])
    ->name('admin.categories.delete')
    ->middleware('auth');

Route::get('/dashboard/users', [UserController::class, 'users'])
    ->name('admin.users')
    ->middleware('auth');

Route::get('/dashboard/users/create', [UserController::class, 'createUser'])
    ->name('admin.users.CreateKasir')
    ->middleware('auth');

Route::post('/dashboard/users', [UserController::class, 'storeUser'])
    ->name('admin.users.store')
    ->middleware('auth');

Route::get('/dashboard/users/{user}/edit', [UserController::class, 'editUser'])
    ->name('admin.users.EditKasir')
    ->middleware('auth');

Route::put('/dashboard/users/{user}', [UserController::class, 'updateUser'])
    ->name('admin.users.update')
    ->middleware('auth');

Route::delete('/dashboard/users/{user}', [UserController::class, 'deleteUser'])
    ->name('admin.users.delete')
    ->middleware('auth');

Route::get('/dashboard/profile', [ProfileController::class, 'profile'])
    ->name('admin.profile')
    ->middleware('auth');

Route::put('/dashboard/profile', [ProfileController::class, 'updateProfile'])
    ->name('admin.profile.update')
    ->middleware('auth');

Route::get('/dashboard/outlet', [OutletController::class, 'outlet'])
    ->name('admin.outlet')
    ->middleware('auth');

Route::put('/dashboard/outlet', [OutletController::class, 'updateOutlet'])
    ->name('admin.outlet.update')
    ->middleware('auth');

Route::get('/dashboard/vouchers', [VoucherController::class, 'vouchers'])
    ->name('admin.vouchers')
    ->middleware('auth');

Route::get('/dashboard/members', [MemberController::class, 'members'])
    ->name('admin.members')
    ->middleware('auth');

Route::get('/dashboard/reports', [ReportController::class, 'reports'])
    ->name('admin.reports')
    ->middleware('auth');

Route::get('/dashboard/history', [TransactionController::class, 'history'])
    ->name('admin.history')
    ->middleware('auth');

Route::post('/dashboard/notifications/read-all', function() {
    \App\Models\Notification::whereNull('read_at')->update(['read_at' => now()]);
    return back()->with('success', 'Semua notifikasi ditandai telah dibaca.');
})->name('admin.notifications.read')->middleware('auth');

Route::view('/password', 'auth.lupa-password')->name('password.request');

Route::post('/lupa-password', function () {
    request()->validate(['email' => ['required', 'email']]);

    $status = Password::sendResetLink(request()->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withInput()->withErrors(['email' => __($status)]);
})->name('password.email');
