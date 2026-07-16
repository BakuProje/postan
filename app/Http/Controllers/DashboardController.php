<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application admin dashboard.
     */
    public function index()
    {
        // Simple counts for dashboard preview
        $categoriesCount = Category::count();
        $productsCount = Product::count();
        $transactionsCount = Transaction::count();
        
        // Mocking some sales details for the presentation (can be replaced with real query later)
        $todaySalesAmount = Transaction::whereDate('created_at', today())->sum('total_price') ?: 2450000;
        $todayTransactionsCount = Transaction::whereDate('created_at', today())->count() ?: 28;
        
        // Fetch recent transactions (mock or real)
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
}
