<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $omset = Transaction::sum('total_price');

        $penjualan = Transaction::count();

        $performaKasir = User::withCount('transactions')
            ->get()
            ->map(function($user) {
                $user->total_sales = Transaction::where('user_id', $user->id)->sum('total_price');
                return $user;
            })
            ->filter(function($user) {
                return $user->transactions_count > 0;
            })
            ->sortByDesc('total_sales');

        $productsStock = Product::with('category')->orderBy('stock', 'asc')->get();

        $recentTransactions = Transaction::with('user')->latest()->take(5)->get();
        $chartLabels = [];
        $chartSales = [];
        $dayNames = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        for ($i = 6; $i >= 0; $i--) {
            $date = today()->subDays($i);
            $dayName = $dayNames[$date->format('l')];
            $chartLabels[] = $dayName . ' (' . $date->format('d/m') . ')';
            $chartSales[] = Transaction::whereDate('created_at', $date)->sum('total_price') ?: 0;
        }

        $outlet = Outlet::first();

        $kasirAktif = User::where('role', 'kasir')->count();
        $todaySales = Transaction::whereDate('created_at', today())->sum('total_price') ?: 0;
        $yesterdaySales = Transaction::whereDate('created_at', today()->subDay())->sum('total_price') ?: 0;
        if ($yesterdaySales > 0) {
            $growth = (($todaySales - $yesterdaySales) / $yesterdaySales) * 100;
        } else {
            $growth = $todaySales > 0 ? 100.0 : 0.0;
        }

        $produkTerjual = \App\Models\TransactionItem::sum('quantity') ?: 0;

        return view('admin.dashboard', compact(
            'omset',
            'penjualan',
            'performaKasir',
            'productsStock',
            'recentTransactions',
            'chartLabels',
            'chartSales',
            'outlet',
            'kasirAktif',
            'growth',
            'produkTerjual'
        ));
    }

    public function storeExpense(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'date' => 'required|date',
        ]);

        \App\Models\Expense::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pengeluaran berhasil dicatat.');
    }
}
