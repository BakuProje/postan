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

        return view('admin.dashboard.index', compact(
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

    private function getTerlarisData()
    {
        $dbProducts = Product::with('category')->get();
        $products = [];
        $totalItemsSoldAll = 0;
        $totalRevenueAll = 0;

        foreach ($dbProducts as $product) {
            $qty = \App\Models\TransactionItem::where('product_id', $product->id)->sum('quantity');
            $revenue = \App\Models\TransactionItem::where('product_id', $product->id)->sum('subtotal');
            if ($revenue == 0 && $qty > 0) {
                $revenue = $qty * $product->price;
            }

            $totalItemsSoldAll += $qty;
            $totalRevenueAll += $revenue;

            $products[] = [
                'id' => $product->id,
                'name' => $product->name,
                'barcode' => $product->barcode ?? null,
                'category' => $product->category ? $product->category->name : 'Umum',
                'photo' => $product->photo ?? null,
                'price' => $product->price,
                'stock' => $product->stock,
                'sold_qty' => (int) $qty,
                'total_revenue' => (int) $revenue,
            ];
        }

        usort($products, fn($a, $b) => $b['sold_qty'] <=> $a['sold_qty']);

        foreach ($products as &$item) {
            $item['percentage'] = $totalItemsSoldAll > 0 ? round(($item['sold_qty'] / $totalItemsSoldAll) * 100, 2) : 0;
        }
        unset($item);

        return [$products, $totalItemsSoldAll, $totalRevenueAll];
    }

    public function terlaris()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $categories = \App\Models\Category::all();
        [$products, $totalItemsSoldAll, $totalRevenueAll] = $this->getTerlarisData();

        $top5Products = array_slice($products, 0, 5);
        $top5SumPercent = array_sum(array_column($top5Products, 'percentage'));
        $othersPercentage = max(0, round(100 - $top5SumPercent, 2));

        $totalTerlarisCount = count($products);
        $avgPrice = $totalItemsSoldAll > 0 ? round($totalRevenueAll / $totalItemsSoldAll) : 0;

        return view('admin.reports.terlaris', compact(
            'categories',
            'products',
            'top5Products',
            'othersPercentage',
            'totalTerlarisCount',
            'totalItemsSoldAll',
            'totalRevenueAll',
            'avgPrice'
        ));
    }

    public function exportTerlarisExcel()
    {
        [$products] = $this->getTerlarisData();
        $filename = 'laporan-produk-terlaris-' . date('Y-m-d') . '.csv';

        $headers = [
            "Content-type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($products) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF"); 
            fputcsv($file, ['No', 'Nama Produk', 'Kategori', 'Terjual (Item)', 'Total Pendapatan (Rp)', 'Persentase (%)']);

            foreach ($products as $index => $row) {
                fputcsv($file, [
                    $index + 1,
                    $row['name'],
                    $row['category'],
                    $row['sold_qty'],
                    $row['total_revenue'],
                    $row['percentage'] . '%'
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportTerlarisPdf()
    {
        [$products, $totalItemsSoldAll, $totalRevenueAll] = $this->getTerlarisData();
        return view('admin.reports.terlaris-pdf', compact('products', 'totalItemsSoldAll', 'totalRevenueAll'));
    }
}
