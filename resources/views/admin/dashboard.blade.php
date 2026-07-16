<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-50/50 font-sans text-neutral-800 antialiased selection:bg-sky-500 selection:text-white min-h-screen flex">

    <aside class="hidden lg:flex lg:flex-col lg:w-64 bg-white border-r border-neutral-200/60 shrink-0 sticky top-0 h-screen p-6 justify-between z-20">
        <div class="space-y-8">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 text-base font-bold tracking-wider text-neutral-900 transition-transform duration-200 hover:scale-[1.01]">
                <img src="{{ asset('logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
                <span class="font-extrabold tracking-widest text-sm text-neutral-900">POSTAN</span>
            </a>

            <nav class="space-y-1.5">
                <p class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest px-3 mb-2">Utama</p>
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 bg-sky-50 text-sky-600">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                    Dashboard Admin
                </a>
                
                <p class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest px-3 mt-6 mb-2">POS Kasir (Segera Hadir)</p>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-400 cursor-not-allowed hover:bg-neutral-50/50">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    Transaksi Baru
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-400 cursor-not-allowed hover:bg-neutral-50/50">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.44 1.44 0 0 0 2.037 0l4.318-4.318a1.44 1.44 0 0 0 0-2.037L10.12 3.659A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    Kelola Produk
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-400 cursor-not-allowed hover:bg-neutral-50/50">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                    </svg>
                    Kategori Produk
                </a>
            </nav>
        </div>
        <div class="border-t border-neutral-100 pt-5 space-y-4">
            <div class="flex items-center gap-3 px-2">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-sky-50 text-sky-600 font-extrabold text-xs border border-sky-100">
                    FA
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs font-bold text-neutral-900 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-neutral-400 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-rose-500 hover:bg-rose-50/50 rounded-lg transition-colors cursor-pointer">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>
                    Keluar Sesi
                </button>
            </form>
        </div>
    </aside>

    <div id="mobile-sidebar" class="fixed inset-0 z-50 pointer-events-none transition-all duration-300 lg:hidden">
        <div id="sidebar-overlay" class="absolute inset-0 bg-neutral-950/20 backdrop-blur-xs opacity-0 transition-opacity duration-300 pointer-events-none"></div>
        
        <div id="sidebar-panel" class="absolute top-0 bottom-0 left-0 w-64 bg-white p-6 shadow-2xl border-r border-neutral-200 -translate-x-full transition-transform duration-300 pointer-events-auto flex flex-col justify-between">
            <div class="space-y-8">
                <div class="flex items-center justify-between pb-4 border-b border-neutral-100">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
                        <span class="font-extrabold tracking-widest text-xs">POSTAN</span>
                    </div>
                    <button id="menu-close" class="rounded-md p-1.5 text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition cursor-pointer">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <nav class="space-y-1.5">
                    <p class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest px-3 mb-2">Utama</p>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold bg-sky-50 text-sky-600">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                        </svg>
                        Dashboard Admin
                    </a>
                    
                    <p class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest px-3 mt-6 mb-2">POS Kasir (Segera Hadir)</p>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-400 cursor-not-allowed">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        Transaksi Baru
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-400 cursor-not-allowed">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.44 1.44 0 0 0 2.037 0l4.318-4.318a1.44 1.44 0 0 0 0-2.037L10.12 3.659A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                        Kelola Produk
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-400 cursor-not-allowed">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                        Kategori Produk
                    </a>
                </nav>
            </div>

            <div class="border-t border-neutral-100 pt-5 space-y-4">
                <div class="flex items-center gap-3 px-2">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-sky-50 text-sky-600 font-extrabold text-xs border border-sky-100">
                        FA
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-xs font-bold text-neutral-900 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-neutral-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-rose-500 hover:bg-rose-50/50 rounded-lg transition-colors cursor-pointer">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        Keluar Sesi
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="flex-1 flex flex-col min-w-0 overflow-x-hidden">
        
        <header class="h-20 bg-white border-b border-neutral-200/60 flex items-center justify-between px-6 lg:px-8 shrink-0">
            <div class="flex items-center gap-4">
                <button id="menu-toggle" class="lg:hidden p-2 -ml-2 rounded-md text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition cursor-pointer">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                
                <h1 class="text-lg font-bold text-neutral-900 leading-none">Beranda Dashboard</h1>
            </div>

            <div></div>
        </header>

        <main class="flex-1 p-6 lg:p-8 max-w-7xl w-full mx-auto relative overflow-hidden">
        </main>
    </div>
</body>
</html>
