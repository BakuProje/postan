<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-50/30 font-sans text-neutral-800 antialiased selection:bg-sky-500 selection:text-white min-h-screen flex relative overflow-x-hidden">
    <div class="absolute inset-0 -z-10 bg-[linear-gradient(to_right,#80808006_1px,transparent_1px),linear-gradient(to_bottom,#80808006_1px,transparent_1px)] bg-[size:24px_24px]"></div>
    <div class="absolute top-[12%] left-[6%] -z-10 h-28 w-28 rounded-full bg-gradient-to-br from-white/80 via-sky-50/30 to-sky-200/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.1)] pointer-events-none"></div>
    <div class="absolute bottom-[15%] right-[8%] -z-10 h-36 w-36 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-100/10 border border-white/40 shadow-[inset_6px_6px_16px_rgba(255,255,255,0.8),inset_-6px_-6px_16px_rgba(14,165,233,0.08)] pointer-events-none"></div>
    <div class="absolute top-[40%] left-[45%] -z-10 h-16 w-16 rounded-full bg-gradient-to-br from-white/80 via-sky-50/25 to-sky-200/15 border border-white/50 shadow-[inset_3px_3px_8px_rgba(255,255,255,0.9),inset_-3px_-3px_8px_rgba(14,165,233,0.12)] pointer-events-none"></div>

    <aside id="desktop-sidebar" class="hidden lg:flex lg:flex-col lg:w-64 bg-white/80 backdrop-blur-lg border-r border-neutral-200/50 shrink-0 sticky top-0 h-screen p-6 justify-between z-20 relative overflow-hidden transition-all duration-300">
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808006_1px,transparent_1px),linear-gradient(to_bottom,#80808006_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none"></div>
        <div class="absolute -top-12 -left-12 h-36 w-36 rounded-full bg-gradient-to-br from-white/70 via-sky-50/30 to-sky-100/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.06)] pointer-events-none"></div>

        <div class="space-y-8 relative z-10">
            <div class="flex items-center justify-between gap-2.5 sidebar-brand-wrapper">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 text-base font-bold tracking-wider text-neutral-900 transition-transform duration-200 hover:scale-[1.01] sidebar-text">
                    <img src="{{ asset('logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
                    <span class="font-extrabold tracking-widest text-sm text-neutral-900">POSTAN</span>
                </a>
                <a href="{{ route('dashboard') }}" class="hidden sidebar-icon-logo flex items-center justify-center w-full">
                    <img src="{{ asset('logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
                </a>
            </div>

            <nav class="space-y-1.5">
                @if(Auth::user()->role === 'admin')
                <p class="text-[10px] font-bold text-neutral-400 px-3 mb-2 sidebar-text sidebar-header-section">Utama</p>
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('dashboard') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                    <span class="sidebar-text">Dashboard Admin</span>
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.users*') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    <span class="sidebar-text">Kelola Kasir</span>
                </a>
                <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.profile') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="sidebar-text">Profil</span>
                </a>
                @endif
                
                <p class="text-[10px] font-bold text-neutral-400 px-3 mt-6 mb-2 sidebar-text sidebar-header-section">POS Kasir</p>
                <a href="{{ route('admin.transactions') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.transactions') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    <span class="sidebar-text">Transaksi</span>
                </a>
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.products') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.products') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.44 1.44 0 0 0 2.037 0l4.318-4.318a1.44 1.44 0 0 0 0-2.037L10.12 3.659A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <span class="sidebar-text">Kelola Produk</span>
                </a>
                <a href="{{ route('admin.categories') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.categories') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                    </svg>
                    <span class="sidebar-text">Kategori Produk</span>
                </a>
                @endif
                
                @if(Auth::user()->role !== 'admin')
                <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.profile') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="sidebar-text">Profil</span>
                </a>
                @endif
               
                <button type="button" id="sidebar-collapse-btn" class="hidden lg:flex w-full items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-400 hover:bg-neutral-50/50 hover:text-neutral-900 transition-all duration-150 cursor-pointer mt-4 border border-transparent sidebar-nav-link">
                    <svg id="collapse-icon" class="size-4 shrink-0 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                    </svg>
                    <span class="sidebar-text">Sembunyikan Menu</span>
                </button>
            </nav>
        </div>

        <div class="border-t border-neutral-100 pt-5 space-y-4 relative z-10">
            <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-2 py-1.5 rounded-xl hover:bg-neutral-50 transition group sidebar-profile-card">
                <div class="h-9 w-9 rounded-full overflow-hidden border border-neutral-200/80 shrink-0 aspect-square">
                    @if(Auth::user()->profile_picture)
                        <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profil {{ Auth::user()->name }}" class="h-full w-full object-cover">
                    @else
                        <div class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-xs uppercase">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                    @endif
                </div>
                <div class="overflow-hidden sidebar-text">
                    <p class="text-xs font-bold text-neutral-900 truncate group-hover:text-sky-600 transition">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-neutral-400 truncate">{{ Auth::user()->email }}</p>
                </div>
            </a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-rose-500 hover:bg-rose-50/50 rounded-lg transition-colors cursor-pointer sidebar-nav-link">
                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>
                    <span class="sidebar-text">Logout</span>
                </button>
            </form>
        </div>
    </aside>


    <div id="mobile-sidebar" class="fixed inset-0 z-50 pointer-events-none transition-all duration-300 lg:hidden">

        <div id="sidebar-overlay" class="absolute inset-0 bg-neutral-950/20 backdrop-blur-xs opacity-0 transition-opacity duration-300 pointer-events-none"></div>
        <div id="sidebar-panel" class="absolute top-0 bottom-0 left-0 w-64 bg-white/80 backdrop-blur-lg p-6 border-r border-neutral-200/50 -translate-x-full transition-transform duration-300 pointer-events-auto flex flex-col justify-between overflow-hidden">
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808006_1px,transparent_1px),linear-gradient(to_bottom,#80808006_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none"></div>
            <div class="absolute -top-12 -left-12 h-36 w-36 rounded-full bg-gradient-to-br from-white/70 via-sky-50/30 to-sky-100/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.06)] pointer-events-none"></div>

            <div class="space-y-8 relative z-10">
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
                    @if(Auth::user()->role === 'admin')
                    <p class="text-[10px] font-bold text-neutral-400 px-3 mb-2">Utama</p>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('dashboard') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                        </svg>
                        Dashboard Admin
                    </a>
                    <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.users*') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        Kelola Kasir
                    </a>
                    <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.profile') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Profil
                    </a>
                    @endif
                    
                    <p class="text-[10px] font-bold text-neutral-400 px-3 mt-6 mb-2">POS Kasir</p>
                    <a href="{{ route('admin.transactions') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.transactions') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        Transaksi
                    </a>
                    @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.products') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.products') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.44 1.44 0 0 0 2.037 0l4.318-4.318a1.44 1.44 0 0 0 0-2.037L10.12 3.659A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                        Kelola Produk
                    </a>
                    <a href="{{ route('admin.categories') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.categories') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                        Kategori Produk
                    </a>
                    @endif
                    
                    @if(Auth::user()->role !== 'admin')
                    <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.profile') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Profil
                    </a>
                    @endif
                </nav>
            </div>

            <div class="border-t border-neutral-100 pt-5 space-y-4 relative z-10">
                <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-2 py-1.5 rounded-xl hover:bg-neutral-50 transition group">
                    <div class="h-9 w-9 rounded-full overflow-hidden border border-neutral-200/80 shrink-0 aspect-square">
                        @if(Auth::user()->profile_picture)
                            <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profil {{ Auth::user()->name }}" class="h-full w-full object-cover">
                        @else
                            <div class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-xs uppercase">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                        @endif
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-xs font-bold text-neutral-900 truncate group-hover:text-sky-600 transition">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-neutral-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-rose-500 hover:bg-rose-50/50 rounded-lg transition-colors cursor-pointer">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="flex-1 flex flex-col min-w-0 overflow-x-hidden">
        <header class="h-20 bg-white/70 backdrop-blur-md border-b border-neutral-200/50 flex items-center justify-between px-6 lg:px-8 shrink-0">
            <div class="flex items-center gap-4">
                <button id="menu-toggle" class="lg:hidden p-2 -ml-2 rounded-md text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition cursor-pointer">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                
                <h1 class="text-lg font-bold text-neutral-900 leading-none">@yield('title', 'Beranda Dashboard')</h1>
            </div>

            <div></div>
        </header>

        <main class="flex-1 p-6 lg:p-8 max-w-[1440px] w-full mx-auto relative overflow-hidden">
            @yield('konten')
        </main>
    </div>

    @if(session('success') || session('error'))
    <div id="toast-notification" class="fixed top-6 left-1/2 z-50 transform -translate-x-1/2 -translate-y-4 opacity-0 transition-all duration-300 pointer-events-auto">
        <div class="flex items-center gap-3 rounded-xl border {{ session('success') ? 'border-emerald-200 bg-emerald-50 text-emerald-800' : 'border-rose-200 bg-rose-50 text-rose-800' }} px-4 py-3 shadow-lg max-w-sm whitespace-nowrap">
            @if(session('success'))
            <svg class="h-4.5 w-4.5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
            </svg>
            @else
            <svg class="h-4.5 w-4.5 text-rose-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
            </svg>
            @endif
            <p class="text-xs font-bold">{{ session('success') ?: session('error') }}</p>
        </div>
    </div>
    @endif
</body>
</html>
