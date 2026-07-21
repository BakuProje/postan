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
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('beranda');
})->name('beranda.index');

Route::view('/info', 'beranda')->name('info.index');
Route::view('/showcase', 'beranda')->name('showcase.index');
Route::view('/contact', 'beranda')->name('contact.index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/dashboard/terlaris', [DashboardController::class, 'terlaris'])
    ->name('admin.dashboard.terlaris')
    ->middleware('auth');

Route::get('/dashboard/terlaris/export-excel', [DashboardController::class, 'exportTerlarisExcel'])
    ->name('admin.dashboard.terlaris.export.excel')
    ->middleware('auth');

Route::get('/dashboard/terlaris/export-pdf', [DashboardController::class, 'exportTerlarisPdf'])
    ->name('admin.dashboard.terlaris.export.pdf')
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
    ->name('admin.users.create')
    ->middleware('auth');

Route::post('/dashboard/users', [UserController::class, 'storeUser'])
    ->name('admin.users.store')
    ->middleware('auth');

Route::post('/dashboard/shifts', [UserController::class, 'storeShift'])
    ->name('admin.shifts.store')
    ->middleware('auth');

Route::put('/dashboard/shifts/{shift}', [UserController::class, 'updateShift'])
    ->name('admin.shifts.update')
    ->middleware('auth');

Route::delete('/dashboard/shifts/{shift}', [UserController::class, 'deleteShift'])
    ->name('admin.shifts.delete')
    ->middleware('auth');

Route::get('/dashboard/users/{user}/edit', [UserController::class, 'editUser'])
    ->name('admin.users.edit')
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

Route::post('/dashboard/vouchers', [VoucherController::class, 'store'])
    ->name('admin.vouchers.store')
    ->middleware('auth');

Route::put('/dashboard/vouchers/{id}', [VoucherController::class, 'update'])
    ->name('admin.vouchers.update')
    ->middleware('auth');

Route::patch('/dashboard/vouchers/{id}/toggle', [VoucherController::class, 'toggleStatus'])
    ->name('admin.vouchers.toggle')
    ->middleware('auth');

Route::delete('/dashboard/vouchers/{id}', [VoucherController::class, 'destroy'])
    ->name('admin.vouchers.destroy')
    ->middleware('auth');

Route::post('/dashboard/vouchers/check', [VoucherController::class, 'checkVoucher'])
    ->name('admin.vouchers.check')
    ->middleware('auth');

Route::get('/dashboard/members', [MemberController::class, 'members'])
    ->name('admin.members')
    ->middleware('auth');

Route::get('/dashboard/reports', [ReportController::class, 'reports'])
    ->name('admin.reports')
    ->middleware('auth');

Route::get('/dashboard/reports/export/excel', [ReportController::class, 'exportExcel'])
    ->name('admin.reports.export.excel')
    ->middleware('auth');

Route::get('/dashboard/reports/export/pdf', [ReportController::class, 'exportPdf'])
    ->name('admin.reports.export.pdf')
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
