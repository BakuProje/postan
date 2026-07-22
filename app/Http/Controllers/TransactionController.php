<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Outlet;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactions()
    {
        $products = Product::with('category')->latest()->get();
        $categories = Category::latest()->get();
        $outlet = Outlet::first();
        
        $activeShift = null;
        if (auth()->check()) {
            $activeShift = auth()->user()->activeShiftLog();
        }
        
        return view('kasir.index', compact('products', 'categories', 'outlet', 'activeShift'));
    }

    public function storeTransaction(Request $request)
    {
        $request->validate([
            'cart' => 'required|array|min:1',
            'cart.*.id' => 'required|exists:products,id',
            'cart.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:cash,qris,bri,mandiri',
            'total_paid' => 'required_if:payment_method,cash|numeric|min:0',
            'customer_name' => 'required|string|max:255',
            'customer_whatsapp' => 'nullable|string|max:50',
        ], [
            'cart.required' => 'Keranjang belanja tidak boleh kosong.',
            'payment_method.required' => 'Metode pembayaran wajib dipilih.',
            'total_paid.required_if' => 'Nominal pembayaran wajib diisi untuk metode tunai.',
            'customer_name.required' => 'Nama customer wajib diisi.',
        ]);

        try {
            return \DB::transaction(function () use ($request) {
                $datePart = date('Ymd');
                $countToday = Transaction::whereDate('created_at', today())->count();
                $seq = str_pad($countToday + 1, 4, '0', STR_PAD_LEFT);
                $transactionCode = "TX-{$datePart}-{$seq}";

                $totalPrice = 0;
                $itemsToCreate = [];

                foreach ($request->cart as $item) {
                    $product = Product::lockForUpdate()->find($item['id']);
                    
                    if ($product->stock < $item['quantity']) {
                        throw new \Exception("Stok produk '{$product->name}' tidak mencukupi (Tersedia: {$product->stock}).");
                    }

                    $product->decrement('stock', $item['quantity']);

                    $subtotal = $product->price * $item['quantity'];
                    $totalPrice += $subtotal;

                    $itemsToCreate[] = [
                        'product_id' => $product->id,
                        'quantity' => $item['quantity'],
                        'price' => $product->price,
                        'subtotal' => $subtotal,
                        'product_name' => $product->name
                    ];
                }

                $discountAmount = 0;
                if ($request->filled('voucher_code')) {
                    $voucher = \App\Models\Voucher::where('code', strtoupper($request->voucher_code))
                        ->where('is_active', true)
                        ->where('end_date', '>=', today()->toDateString())
                        ->first();
                    
                    if (!$voucher) {
                        throw new \Exception("Voucher tidak valid atau sudah kedaluwarsa.");
                    }
                    
                    if ($voucher->type === 'discount_percent') {
                        $discountAmount = floor($totalPrice * ($voucher->value / 100));
                    } else {
                        $discountAmount = $voucher->value;
                    }
                    
                    $discountAmount = min($discountAmount, $totalPrice);
                    $voucher->increment('used_count');
                    $totalPrice -= $discountAmount;
                }

                $paymentMethod = $request->payment_method;
                $totalPaid = in_array($paymentMethod, ['qris', 'bri', 'mandiri']) ? $totalPrice : $request->total_paid;

                if ($totalPaid < $totalPrice) {
                    throw new \Exception("Uang pembayaran tidak mencukupi.");
                }

                $totalChange = $totalPaid - $totalPrice;

                $transaction = Transaction::create([
                    'user_id' => auth()->id(),
                    'transaction_code' => $transactionCode,
                    'total_price' => $totalPrice,
                    'discount_amount' => $discountAmount,
                    'voucher_code' => $request->filled('voucher_code') ? strtoupper($request->voucher_code) : null,
                    'total_paid' => $totalPaid,
                    'total_change' => $totalChange,
                    'payment_method' => $paymentMethod,
                    'customer_name' => $request->customer_name,
                    'customer_whatsapp' => $request->customer_whatsapp,
                ]);

                try {
                    \App\Models\Notification::create([
                        'type' => 'transaction',
                        'title' => "Kasir " . auth()->user()->name . " memproses transaksi" . ($transaction->customer_name ? " (Pelanggan: {$transaction->customer_name})" : ""),
                        'subtitle' => "Kode: {$transactionCode} | Total: Rp " . number_format($totalPrice, 0, ',', '.'),
                    ]);
                } catch (\Exception $e) {
                   
                }

                foreach ($itemsToCreate as $itemData) {
                    $transaction->items()->create([
                        'product_id' => $itemData['product_id'],
                        'quantity' => $itemData['quantity'],
                        'price' => $itemData['price'],
                        'subtotal' => $itemData['subtotal'],
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Transaksi berhasil disimpan!',
                    'data' => [
                        'transaction_code' => $transaction->transaction_code,
                        'created_at' => $transaction->created_at->format('d-m-Y H:i'),
                        'cashier_name' => auth()->user()->name,
                        'customer_name' => $transaction->customer_name,
                        'customer_whatsapp' => $transaction->customer_whatsapp,
                        'total_price' => $transaction->total_price,
                        'discount_amount' => $transaction->discount_amount,
                        'voucher_code' => $transaction->voucher_code,
                        'total_paid' => $transaction->total_paid,
                        'total_change' => $transaction->total_change,
                        'payment_method' => $transaction->payment_method,
                        'items' => $itemsToCreate,
                    ]
                ]);
            });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function history(Request $request)
    {
        $query = Transaction::with(['user', 'items.product']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('transaction_code', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhereHas('user', function($qu) use ($search) {
                      $qu->where('name', 'like', "%{$search}%");
                  });
            });
        }
        
        $transactions = $query->latest()->paginate(10)->withQueryString();
        $outlet = Outlet::first();
        return view('kasir.history', compact('transactions', 'outlet'));
    }
}
