<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $categoriesCount = Category::count();
        $productsCount = Product::count();
        $transactionsCount = Transaction::count();
       
        $todaySalesAmount = Transaction::whereDate('created_at', today())->sum('total_price') ?: 2450000;
        $todayTransactionsCount = Transaction::whereDate('created_at', today())->count() ?: 28;
        
        $recentTransactions = Transaction::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'categoriesCount',
            'productsCount',
            'transactionsCount',
            'todaySalesAmount',
            'todayTransactionsCount',
            'recentTransactions'
        ));
    }

    public function transactions()
    {
        return view('admin.transactions');
    }

    public function products()
    {
        return view('admin.products');
    }

    public function categories()
    {
        return view('admin.categories');
    }
}
