<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.admin', function ($view) {
            if (auth()->check()) {
                // Automatically sync low stock products
                try {
                    $lowStockProducts = Product::where('stock', '<=', 15)->get();
                    foreach ($lowStockProducts as $prod) {
                        $title = "Stok {$prod->name} tinggal {$prod->stock} pcs";
                        $exists = Notification::where('type', 'stock')
                            ->where('title', 'like', "Stok {$prod->name}%")
                            ->exists();
                        if (!$exists) {
                            Notification::create([
                                'type' => 'stock',
                                'title' => $title,
                                'subtitle' => 'Segera lakukan restock',
                            ]);
                        } else {
                            $existing = Notification::where('type', 'stock')
                                ->where('title', 'like', "Stok {$prod->name}%")
                                ->first();
                            if ($existing->title !== $title) {
                                $existing->update(['title' => $title]);
                            }
                        }
                    }
                    
                    // Clean up resolved stock notifications
                    $allStockNotifications = Notification::where('type', 'stock')->get();
                    foreach ($allStockNotifications as $notif) {
                        preg_match('/Stok (.*) tinggal/', $notif->title, $matches);
                        if (isset($matches[1])) {
                            $prodName = $matches[1];
                            $prod = Product::where('name', $prodName)->first();
                            if (!$prod || $prod->stock > 15) {
                                $notif->delete();
                            }
                        } else {
                            $notif->delete();
                        }
                    }
                } catch (\Exception $e) {
                    // Ignore errors during migration or if tables do not exist
                }

                // If total notification count is 0, seed initial notifications
                try {
                    if (Notification::count() === 0) {
                        Notification::create([
                            'type' => 'login',
                            'title' => 'Kasir Budi Santoso login',
                            'subtitle' => 'Shift Pagi dimulai',
                            'created_at' => now()->subHours(10),
                        ]);
                        Notification::create([
                            'type' => 'system',
                            'title' => 'Produk baru ditambahkan',
                            'subtitle' => 'Brown Sugar Latte',
                            'created_at' => now()->subHours(5),
                        ]);
                    }
                } catch (\Exception $e) {
                    // Ignore
                }

                // Fetch latest notifications & unread count
                $navNotifications = Notification::latest()->take(5)->get();
                $unreadCount = Notification::whereNull('read_at')->count();
                $view->with(compact('navNotifications', 'unreadCount'));
            }
        });
    }
}
