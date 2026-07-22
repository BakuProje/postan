<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-neutral-50/30 font-sans text-neutral-800 antialiased selection:bg-sky-500 selection:text-white min-h-screen flex relative overflow-x-hidden">
    <div
        class="absolute inset-0 -z-10 bg-[linear-gradient(to_right,#80808006_1px,transparent_1px),linear-gradient(to_bottom,#80808006_1px,transparent_1px)] bg-[size:24px_24px]">
    </div>
    <div
        class="absolute top-[12%] left-[6%] -z-10 h-28 w-28 rounded-full bg-gradient-to-br from-white/80 via-sky-50/30 to-sky-200/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.1)] pointer-events-none">
    </div>
    <div
        class="absolute bottom-[15%] right-[8%] -z-10 h-36 w-36 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-100/10 border border-white/40 shadow-[inset_6px_6px_16px_rgba(255,255,255,0.8),inset_-6px_-6px_16px_rgba(14,165,233,0.08)] pointer-events-none">
    </div>
    <div
        class="absolute top-[40%] left-[45%] -z-10 h-16 w-16 rounded-full bg-gradient-to-br from-white/80 via-sky-50/25 to-sky-200/15 border border-white/50 shadow-[inset_3px_3px_8px_rgba(255,255,255,0.9),inset_-3px_-3px_8px_rgba(14,165,233,0.12)] pointer-events-none">
    </div>

    <aside id="desktop-sidebar"
        class="hidden lg:flex lg:flex-col lg:w-64 bg-white/80 backdrop-blur-lg border-r border-neutral-200/50 shrink-0 sticky top-0 h-screen p-6 z-20 relative overflow-hidden transition-all duration-300">
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,#80808006_1px,transparent_1px),linear-gradient(to_bottom,#80808006_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none">
        </div>
        <div
            class="absolute -top-12 -left-12 h-36 w-36 rounded-full bg-gradient-to-br from-white/70 via-sky-50/30 to-sky-100/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.06)] pointer-events-none">
        </div>

        <div class="space-y-6 relative z-10 flex-1 overflow-y-auto pr-1 sidebar-scrollbar">
            <div class="flex items-center justify-between gap-2.5 sidebar-brand-wrapper">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-2.5 text-base font-bold tracking-wider text-neutral-900 transition-transform duration-200 hover:scale-[1.01] sidebar-text">
                    <img src="{{ asset('images/logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
                    <span class="font-extrabold tracking-widest text-sm text-neutral-900">POSTAN</span>
                </a>
                <a href="{{ route('dashboard') }}"
                    class="hidden sidebar-icon-logo flex items-center justify-center w-full">
                    <img src="{{ asset('images/logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
                </a>
            </div>

            <nav class="space-y-1.5">
                @if (Auth::user()->role === 'admin')
                    <p class="text-[10px] font-bold text-neutral-400 px-3 mb-2 sidebar-text sidebar-header-section">
                        Utama</p>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('dashboard') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                        </svg>
                        <span class="sidebar-text">Dashboard Admin</span>
                    </a>
                    <a href="{{ route('admin.transactions') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.transactions') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span class="sidebar-text">Kasir</span>
                    </a>
                    <a href="{{ route('admin.vouchers') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.vouchers') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6H7.5A1.5 1.5 0 0 0 6 7.5v3a1.5 1.5 0 0 1 0 3v3a1.5 1.5 0 0 0 1.5 1.5h9a1.5 1.5 0 0 0 1.5-1.5v-3a1.5 1.5 0 0 1 0-3v-3A1.5 1.5 0 0 0 16.5 6Z" />
                        </svg>
                        <span class="sidebar-text">Voucher</span>
                    </a>
                    <a href="{{ route('admin.members') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.members') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <span class="sidebar-text">Member</span>
                    </a>

                    <p
                        class="text-[10px] font-bold text-neutral-400 px-3 mt-6 mb-2 sidebar-text sidebar-header-section">
                        Manajemen</p>
                    <a href="{{ route('admin.users') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.users*') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <span class="sidebar-text">Kelola Kasir</span>
                    </a>
                    <div class="inventaris-group space-y-1">
                        <button type="button" onclick="toggleInventaris(this)"
                            class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.products*') || request()->routeIs('admin.categories*') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <div class="flex items-center gap-3">
                                <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25M9 7.5v9" />
                                </svg>
                                <span class="sidebar-text">Inventory</span>
                            </div>
                            <svg class="size-3.5 transition-transform duration-200 sidebar-text inventaris-chevron {{ request()->routeIs('admin.products*') || request()->routeIs('admin.categories*') ? 'rotate-180' : '' }}"
                                fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div
                            class="inventaris-submenu pl-9 space-y-1 sidebar-text {{ request()->routeIs('admin.products*') || request()->routeIs('admin.categories*') ? '' : 'hidden' }}">
                            <a href="{{ route('admin.products') }}"
                                class="block px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ request()->routeIs('admin.products*') ? 'text-sky-600 font-extrabold' : 'text-neutral-500 hover:text-neutral-900' }}">
                                Produk
                            </a>
                            <a href="{{ route('admin.categories') }}"
                                class="block px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ request()->routeIs('admin.categories*') ? 'text-sky-600 font-extrabold' : 'text-neutral-500 hover:text-neutral-900' }}">
                                Kategori
                            </a>
                        </div>
                    </div>
                    <div class="laporan-tree-group space-y-1">
                        <button type="button" onclick="toggleLaporanTree(this)"
                            class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.reports*') || request()->routeIs('admin.dashboard.terlaris') || request()->routeIs('admin.history') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <div class="flex items-center gap-3">
                                <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v5.25c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 0 1 3 18.375v-5.25ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125v-9.75ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v14.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                                </svg>
                                <span class="sidebar-text">Laporan</span>
                            </div>
                            <svg class="size-3.5 transition-transform duration-200 sidebar-text laporan-tree-chevron {{ request()->routeIs('admin.reports*') || request()->routeIs('admin.dashboard.terlaris') || request()->routeIs('admin.history') ? 'rotate-180' : '' }}"
                                fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div
                            class="laporan-tree-submenu pl-9 space-y-1 sidebar-text {{ request()->routeIs('admin.reports*') || request()->routeIs('admin.dashboard.terlaris') || request()->routeIs('admin.history') ? '' : 'hidden' }}">
                            <a href="{{ route('admin.reports') }}"
                                class="block px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ request()->routeIs('admin.reports') ? 'text-sky-600 font-extrabold' : 'text-neutral-500 hover:text-neutral-900' }}">
                                Keuangan
                            </a>
                            <a href="{{ route('admin.dashboard.terlaris') }}"
                                class="block px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ request()->routeIs('admin.dashboard.terlaris') ? 'text-sky-600 font-extrabold' : 'text-neutral-500 hover:text-neutral-900' }}">
                                Terlaris
                            </a>
                            <a href="{{ route('admin.history') }}"
                                class="block px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ request()->routeIs('admin.history') ? 'text-sky-600 font-extrabold' : 'text-neutral-500 hover:text-neutral-900' }}">
                                Transaksi
                            </a>
                        </div>
                    </div>

                    <p
                        class="text-[10px] font-bold text-neutral-400 px-3 mt-6 mb-2 sidebar-text sidebar-header-section">
                        Pengaturan</p>
                    <a href="{{ route('admin.outlet') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.outlet') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12L12 3.75 21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V9.75M9.75 21v-6h4.5v6" />
                        </svg>
                        <span class="sidebar-text">Pengaturan Outlet</span>
                    </a>
                    <a href="{{ route('admin.profile') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.profile') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span class="sidebar-text">Pengaturan Profile</span>
                    </a>
                @else
                    <!-- Cashier Navigation links -->
                    <p class="text-[10px] font-bold text-neutral-400 px-3 mb-2 sidebar-text sidebar-header-section">
                        Utama</p>
                    <a href="{{ route('admin.transactions') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.transactions') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span class="sidebar-text">Kasir</span>
                    </a>
                    <a href="{{ route('admin.history') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.history') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <span class="sidebar-text">Transaksi</span>
                    </a>
                    <a href="{{ route('admin.profile') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold transition-all duration-150 sidebar-nav-link {{ request()->routeIs('admin.profile') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span class="sidebar-text">Profil</span>
                    </a>

                @endif

                <button type="button" id="sidebar-collapse-btn"
                    class="hidden lg:flex w-full items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-400 hover:bg-neutral-50/50 hover:text-neutral-900 transition-all duration-150 cursor-pointer mt-4 border border-transparent sidebar-nav-link">
                    <svg id="collapse-icon" class="size-4 shrink-0 transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                    </svg>
                    <span class="sidebar-text">Sembunyikan Menu</span>
                </button>

                <button type="button" onclick="openLogoutConfirmModal()"
                    class="w-full flex items-center gap-3 px-3 py-2.5 text-xs font-bold text-rose-500 hover:bg-rose-50/50 rounded-lg transition-colors cursor-pointer sidebar-nav-link">
                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>
                    <span class="sidebar-text">Logout</span>
                </button>
            </nav>
        </div>
    </aside>


    <div id="mobile-sidebar" class="fixed inset-0 z-[999] pointer-events-none transition-all duration-300 lg:hidden">

        <div id="sidebar-overlay"
            class="fixed inset-0 bg-neutral-950/50 backdrop-blur-xs opacity-0 transition-opacity duration-300 pointer-events-none z-[999]">
        </div>
        <div id="sidebar-panel"
            class="fixed top-0 bottom-0 left-0 h-full w-72 max-w-[80vw] bg-white p-6 border-r border-neutral-200 shadow-2xl -translate-x-full transition-transform duration-300 pointer-events-auto z-[1000] flex flex-col justify-between overflow-hidden">
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#80808006_1px,transparent_1px),linear-gradient(to_bottom,#80808006_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none">
            </div>
            <div
                class="absolute -top-12 -left-12 h-36 w-36 rounded-full bg-gradient-to-br from-white/70 via-sky-50/30 to-sky-100/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.06)] pointer-events-none">
            </div>

            <div class="flex items-center justify-between pb-4 border-b border-neutral-100 shrink-0 relative z-10">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
                    <span class="font-extrabold tracking-widest text-xs">POSTAN</span>
                </div>
                <button id="menu-close"
                    class="rounded-md p-1.5 text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto my-3 pr-1 relative z-10 sidebar-scrollbar">
                <nav class="space-y-1.5">
                    @if (Auth::user()->role === 'admin')
                        <p class="text-[10px] font-bold text-neutral-400 px-3 mb-2">Utama</p>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('dashboard') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                            </svg>
                            <span>Dashboard Admin</span>
                        </a>
                        <a href="{{ route('admin.transactions') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.transactions') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            Kasir
                        </a>
                        <a href="{{ route('admin.vouchers') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.vouchers') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 6H7.5A1.5 1.5 0 0 0 6 7.5v3a1.5 1.5 0 0 1 0 3v3a1.5 1.5 0 0 0 1.5 1.5h9a1.5 1.5 0 0 0 1.5-1.5v-3a1.5 1.5 0 0 1 0-3v-3A1.5 1.5 0 0 0 16.5 6Z" />
                            </svg>
                            Voucher
                        </a>
                        <a href="{{ route('admin.members') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.members') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            Member
                        </a>

                        <p class="text-[10px] font-bold text-neutral-400 px-3 mt-6 mb-2">Manajemen</p>

                        <a href="{{ route('admin.users') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.users*') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            Kelola Kasir
                        </a>

                        <div>
                            <button type="button" onclick="toggleSubmenu('mob-inventory-submenu')"
                                class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900 transition-all cursor-pointer">
                                <div class="flex items-center gap-3">
                                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25M9 7.5v9" />
                                    </svg>
                                    <span>Inventory</span>
                                </div>
                                <svg id="mob-inventory-arrow"
                                    class="size-3.5 transition-transform duration-200 {{ request()->routeIs('admin.products*') || request()->routeIs('admin.categories*') ? 'rotate-180' : '' }}"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                            <div id="mob-inventory-submenu"
                                class="{{ request()->routeIs('admin.products*') || request()->routeIs('admin.categories*') ? '' : 'hidden' }} pl-9 pr-2 py-1 space-y-1">
                                <a href="{{ route('admin.products') }}"
                                    class="block py-1.5 text-xs font-semibold {{ request()->routeIs('admin.products*') ? 'text-sky-600 font-bold' : 'text-neutral-500 hover:text-neutral-900' }}">Produk</a>
                                <a href="{{ route('admin.categories') }}"
                                    class="block py-1.5 text-xs font-semibold {{ request()->routeIs('admin.categories*') ? 'text-sky-600 font-bold' : 'text-neutral-500 hover:text-neutral-900' }}">Kategori</a>
                            </div>
                        </div>

                        <div>
                            <button type="button" onclick="toggleSubmenu('mob-reports-submenu')"
                                class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-xs font-bold text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900 transition-all cursor-pointer">
                                <div class="flex items-center gap-3">
                                    <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                                    </svg>
                                    <span>Laporan</span>
                                </div>
                                <svg id="mob-reports-arrow"
                                    class="size-3.5 transition-transform duration-200 {{ request()->routeIs('admin.reports*') || request()->routeIs('admin.dashboard.terlaris*') || request()->routeIs('admin.history*') ? 'rotate-180' : '' }}"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                            <div id="mob-reports-submenu"
                                class="{{ request()->routeIs('admin.reports*') || request()->routeIs('admin.dashboard.terlaris*') || request()->routeIs('admin.history*') ? '' : 'hidden' }} pl-9 pr-2 py-1 space-y-1">
                                <a href="{{ route('admin.reports') }}"
                                    class="block py-1.5 text-xs font-semibold {{ request()->routeIs('admin.reports*') ? 'text-sky-600 font-bold' : 'text-neutral-500 hover:text-neutral-900' }}">Keuangan</a>
                                <a href="{{ route('admin.dashboard.terlaris') }}"
                                    class="block py-1.5 text-xs font-semibold {{ request()->routeIs('admin.dashboard.terlaris*') ? 'text-sky-600 font-bold' : 'text-neutral-500 hover:text-neutral-900' }}">Terlaris</a>
                                <a href="{{ route('admin.history') }}"
                                    class="block py-1.5 text-xs font-semibold {{ request()->routeIs('admin.history*') ? 'text-sky-600 font-bold' : 'text-neutral-500 hover:text-neutral-900' }}">Transaksi</a>
                            </div>
                        </div>

                        <p class="text-[10px] font-bold text-neutral-400 px-3 mt-6 mb-2">Pengaturan</p>
                        <a href="{{ route('admin.outlet') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.outlet') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12L12 3.75 21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V9.75M9.75 21v-6h4.5v6" />
                            </svg>
                            Pengaturan Outlet
                        </a>
                        <a href="{{ route('admin.profile') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.profile') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Profil
                        </a>
                    @else
                        <p class="text-[10px] font-bold text-neutral-400 px-3 mb-2">Utama</p>
                        <a href="{{ route('admin.transactions') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.transactions') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            Kasir
                        </a>
                        <a href="{{ route('admin.history') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.history') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            Transaksi
                        </a>
                        <a href="{{ route('admin.profile') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold {{ request()->routeIs('admin.profile') ? 'bg-sky-50 text-sky-600' : 'text-neutral-500 hover:bg-neutral-50/50 hover:text-neutral-900' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Profil
                        </a>
                    @endif

                    <button type="button" onclick="openLogoutConfirmModal()"
                        class="w-full flex items-center gap-3 px-3 py-2.5 text-xs font-bold text-rose-500 hover:bg-rose-50/50 rounded-lg transition-colors cursor-pointer pt-4 mt-2 border-t border-neutral-100">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        Logout
                    </button>
                </nav>
            </div>
        </div>
    </div>

    <div class="flex-1 flex flex-col min-w-0 overflow-x-hidden">
        <header
            class="h-20 bg-white/70 backdrop-blur-md border-b border-neutral-200/50 flex items-center justify-between px-6 lg:px-8 shrink-0 relative z-50">
            <div class="flex items-center gap-4">
                <button id="menu-toggle"
                    class="lg:hidden p-2 -ml-2 rounded-md text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition cursor-pointer">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                @if (!request()->routeIs('admin.reports*'))
                    <h1 class="text-lg font-bold text-neutral-900 leading-none">@yield('title', 'Beranda Dashboard')</h1>
                @endif
            </div>

            <div class="hidden sm:flex items-center gap-3 select-none pr-2">
                <div
                    class="flex items-center gap-2 bg-white border border-neutral-200/80 px-3.5 py-2.5 rounded-xl text-xs font-bold text-neutral-700 shadow-3xs">
                    <svg class="h-4 w-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                    <span id="live-navbar-date">Memuat Tanggal...</span>
                </div>
                <div
                    class="flex items-center gap-2 bg-white border border-neutral-200/80 px-3.5 py-2.5 rounded-xl text-xs font-bold text-neutral-700 shadow-3xs">
                    <svg class="h-4 w-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span id="live-navbar-time">Memuat Jam...</span>
                </div>

                <div class="relative ml-1 shrink-0" id="notification-dropdown-container">
                    <button id="notification-bell-btn"
                        class="relative p-1.5 rounded-xl hover:bg-neutral-50 text-neutral-600 transition-colors focus:outline-hidden cursor-pointer select-none">
                        <svg class="h-5.5 w-5.5 text-neutral-600" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                        @if (isset($unreadCount) && $unreadCount > 0)
                            <span
                                class="absolute top-1 right-1 flex h-4.5 w-4.5 items-center justify-center rounded-full bg-rose-500 text-[8px] font-black text-white border border-white shadow-3xs">
                                {{ $unreadCount }}
                            </span>
                        @endif
                    </button>

                    <!-- Dropdown Panel -->
                    <div id="notification-panel"
                        class="hidden absolute right-0 mt-2.5 w-80 bg-white rounded-2xl border border-neutral-100 shadow-[0_20px_50px_rgba(0,0,0,0.12)] p-4 z-50 animate-in fade-in slide-in-from-top-2 duration-200">
                        <div class="flex items-center justify-between pb-3 border-b border-neutral-100 mb-3 shrink-0">
                            <span class="text-xs font-bold text-neutral-800">Notifikasi Terbaru</span>
                            @if (isset($unreadCount) && $unreadCount > 0)
                                <form action="{{ route('admin.notifications.read') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-[10px] text-sky-600 hover:text-sky-700 font-bold transition cursor-pointer">Tandai
                                        semua dibaca</button>
                                </form>
                            @endif
                        </div>
                        <div class="space-y-3 max-h-64 overflow-y-auto pr-1 no-scrollbar">
                            @if (isset($navNotifications) && $navNotifications->count() > 0)
                                @foreach ($navNotifications as $n)
                                    @php
                                        $color = 'blue';
                                        if ($n->type === 'stock') {
                                            $color = 'rose';
                                        } elseif ($n->type === 'transaction') {
                                            $color = 'emerald';
                                        } elseif ($n->type === 'system') {
                                            $color = 'amber';
                                        }
                                    @endphp
                                    <div
                                        class="flex items-start gap-2.5 pb-2.5 last:pb-0 border-b border-neutral-50 last:border-0">
                                        <div
                                            class="h-8 w-8 rounded-full flex items-center justify-center shrink-0 @if ($color === 'rose') bg-rose-50 text-rose-500 @elseif($color === 'emerald') bg-emerald-50 text-emerald-500 @elseif($color === 'amber') bg-amber-50 text-amber-500 @else bg-blue-50 text-blue-500 @endif">
                                            @if ($n->type === 'stock')
                                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25M9 7.5v9" />
                                                </svg>
                                            @elseif($n->type === 'transaction')
                                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>
                                            @elseif($n->type === 'login')
                                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                                </svg>
                                            @else
                                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.5 1.5 0 0 0 2.122 0l4.318-4.318a1.5 1.5 0 0 0 0-2.122L11.16 3.659A2.25 2.25 0 0 0 9.568 3Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 6h.008v.008H6V6Z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="space-y-0.5 min-w-0">
                                            <p class="text-[11px] font-bold text-neutral-800 leading-tight truncate">
                                                {{ $n->title }}
                                            </p>
                                            <p class="text-[10px] text-neutral-400 font-normal leading-tight truncate">
                                                {{ $n->subtitle }}
                                            </p>
                                            <p class="text-[9px] text-neutral-300 font-medium">
                                                {{ $n->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="py-6 flex flex-col items-center justify-center text-center space-y-1">
                                    <svg class="h-6 w-6 text-neutral-300" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                    </svg>
                                    <p class="text-[10px] text-neutral-400 italic">Tidak ada notifikasi baru.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- User Profile Picture -->
                <a href="{{ route('admin.profile') }}"
                    class="h-9 w-9 rounded-full overflow-hidden border border-neutral-200 shadow-3xs shrink-0 aspect-square hover:scale-105 transition-transform duration-200 ml-1">
                    @if (Auth::user()->profile_picture)
                        <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profil {{ Auth::user()->name }}"
                            class="h-full w-full object-cover">
                    @else
                        <div
                            class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-xs uppercase">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                    @endif
                </a>
            </div>
        </header>

        <main class="flex-1 p-6 lg:p-8 w-full relative overflow-hidden">
            @yield('konten')
        </main>
    </div>

    @if (session('success') || session('error') || $errors->any())
        <div id="toast-notification"
            class="fixed top-6 left-1/2 z-50 transform -translate-x-1/2 opacity-0 transition-all duration-300 pointer-events-auto">
            <div
                class="flex items-center gap-3 rounded-xl border {{ session('success') ? 'border-emerald-200 bg-emerald-50 text-emerald-800' : 'border-rose-200 bg-rose-50 text-rose-800' }} px-4 py-3 max-w-sm bg-white/95 backdrop-blur-md">
                @if (session('success'))
                    <svg class="h-4.5 w-4.5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                @else
                    <svg class="h-4.5 w-4.5 text-rose-600 shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                @endif
                <p class="text-xs font-bold">
                    @if (session('success'))
                        {{ session('success') }}
                    @elseif (session('error'))
                        {{ session('error') }}
                    @elseif ($errors->any())
                        {{ $errors->first() }}
                    @endif
                </p>
            </div>
        </div>
    @endif

    @if (Auth::check() && Auth::user()->role === 'kasir')
        @php
            $activeShift = Auth::user()->activeShiftLog();
        @endphp

        <!-- SHIFT END CONFIRM MODAL -->
        <div id="shift-confirm-modal"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
            <div id="shift-confirm-modal-card"
                class="bg-white rounded-3xl p-6 max-w-sm w-full border border-neutral-100 scale-95 opacity-0 transition-all duration-200 flex flex-col items-center text-center space-y-4">
                <div class="h-12 w-12 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center border border-rose-100 shadow-sm shrink-0">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3Z" />
                    </svg>
                </div>

                <div class="space-y-1.5">
                    <h3 class="text-sm font-extrabold text-neutral-900 tracking-tight">Akhiri Shift Kerja?</h3>
                    <p class="text-[11px] text-neutral-500 leading-relaxed px-1">Apakah Anda yakin ingin mengakhiri shift kerja Anda? Setelah diakhiri, Anda tidak dapat mencatat transaksi POS lagi sampai shift baru dimulai.</p>
                </div>

                <div class="flex items-center gap-3 w-full pt-2">
                    <button type="button" onclick="closeShiftConfirmModal()"
                        class="flex-1 px-4 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition active:scale-98 cursor-pointer">Batal</button>
                    <button type="button" onclick="submitStopShift()"
                        class="flex-1 px-4 py-2.5 rounded-xl bg-rose-500 text-xs font-bold text-white hover:bg-rose-600 transition active:scale-98 cursor-pointer">Akhiri Shift</button>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::check() && Auth::user()->role === 'kasir' && !session('pin_verified'))
        <!-- PIN LOCK MODAL OVERLAY (FULL SCREEN & RESPONSIVE) -->
        <div id="pin-lock-modal" class="fixed inset-0 z-[200] flex bg-cover bg-center transition-all duration-350 w-screen h-screen overflow-hidden" style="background-image: url('{{ asset('images/pin.png') }}');">
            <div class="w-full h-full grid grid-cols-1 md:grid-cols-12 overflow-y-auto md:overflow-hidden">
                <!-- LEFT COLUMN: Profile Info -->
                <div class="col-span-12 md:col-span-6 bg-gradient-to-br from-sky-600 via-sky-700 to-indigo-800 md:bg-none md:bg-transparent p-10 flex flex-col items-center justify-center text-center min-h-[340px] md:min-h-screen relative overflow-hidden">
                    <!-- Glassmorphic ambient light circles for mobile touch -->
                    <div class="absolute -top-12 -left-12 w-48 h-48 rounded-full bg-sky-400/10 blur-2xl pointer-events-none md:hidden"></div>
                    <div class="absolute -bottom-12 -right-12 w-48 h-48 rounded-full bg-indigo-500/10 blur-2xl pointer-events-none md:hidden"></div>

                    <!-- User Profile Picture -->
                    <div class="relative mb-6 z-10">
                        <div class="h-36 w-36 md:h-44 md:w-44 rounded-full bg-white/10 p-1.5 shadow-2xl flex items-center justify-center border border-white/20 backdrop-blur-md">
                            <div class="h-full w-full rounded-full overflow-hidden border border-white/30 relative">
                                @if (Auth::user()->profile_picture)
                                    <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile" class="h-full w-full object-cover">
                                @else
                                    <div class="h-full w-full bg-gradient-to-tr from-sky-400 to-indigo-500 text-white flex items-center justify-center font-black text-3xl uppercase">
                                        {{ substr(Auth::user()->name, 0, 2) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h3 class="text-xl md:text-2xl font-black text-white tracking-tight z-10">{{ Auth::user()->name }}</h3>
                    <p class="text-xs text-sky-200 font-extrabold mt-1.5 uppercase tracking-widest z-10">KASIR</p>
                    <p class="text-xs md:text-sm text-sky-100/90 font-bold mt-10 z-10">
                        @if (empty(Auth::user()->pin))
                            Buat PIN Baru Kasir
                        @else
                            Masukkan PIN Untuk Melanjutkan
                        @endif
                    </p>

                    <!-- PIN Input Boxes (4 Square Boxes) -->
                    <div id="pin-boxes-container" class="flex items-center justify-center gap-3 md:gap-4 mt-5 z-10">
                        <div class="h-14 w-14 md:h-16 md:w-16 rounded-2xl border border-white/15 bg-white/5 flex items-center justify-center text-2xl font-black text-white shadow-inner transition-all duration-200"></div>
                        <div class="h-14 w-14 md:h-16 md:w-16 rounded-2xl border border-white/15 bg-white/5 flex items-center justify-center text-2xl font-black text-white shadow-inner transition-all duration-200"></div>
                        <div class="h-14 w-14 md:h-16 md:w-16 rounded-2xl border border-white/15 bg-white/5 flex items-center justify-center text-2xl font-black text-white shadow-inner transition-all duration-200"></div>
                        <div class="h-14 w-14 md:h-16 md:w-16 rounded-2xl border border-white/15 bg-white/5 flex items-center justify-center text-2xl font-black text-white shadow-inner transition-all duration-200"></div>
                    </div>
                    
                    <!-- Error Message -->
                    <div id="pin-error-msg" class="text-xs font-bold text-rose-350 bg-rose-500/20 px-4 py-1.5 rounded-full uppercase tracking-wider mt-6 hidden animate-pulse border border-rose-500/30 z-10">
                        PIN salah! Coba lagi.
                    </div>
                </div>

                <!-- RIGHT COLUMN: Keypad -->
                <div class="col-span-12 md:col-span-6 p-10 flex flex-col items-center justify-center bg-slate-50 md:bg-transparent min-h-[400px] md:min-h-screen">
                    <div class="grid grid-cols-3 gap-4 md:gap-5 w-full max-w-[320px] sm:max-w-[380px] md:max-w-[420px]">
                        @foreach([1, 2, 3, 4, 5, 6, 7, 8, 9] as $num)
                            <button type="button" onclick="pressPinNumber('{{ $num }}')" class="h-20 sm:h-24 w-full rounded-3xl bg-white hover:bg-sky-500 hover:text-white border border-neutral-200/70 hover:border-sky-500 active:scale-95 transition-all duration-200 text-2xl sm:text-3xl font-black text-neutral-800 flex items-center justify-center shadow-xs cursor-pointer select-none">
                                {{ $num }}
                            </button>
                        @endforeach
                        <button type="button" onclick="clearPinNumber()" class="h-20 sm:h-24 w-full rounded-3xl bg-rose-50 hover:bg-rose-500 hover:text-white border border-rose-100 hover:border-rose-500 active:scale-95 transition-all duration-200 text-sm sm:text-base font-black text-rose-600 flex items-center justify-center shadow-xs cursor-pointer select-none">
                            Hapus
                        </button>
                        <button type="button" onclick="pressPinNumber('0')" class="h-20 sm:h-24 w-full rounded-3xl bg-white hover:bg-sky-500 hover:text-white border border-neutral-200/70 hover:border-sky-500 active:scale-95 transition-all duration-200 text-2xl sm:text-3xl font-black text-neutral-800 flex items-center justify-center shadow-xs cursor-pointer select-none">
                            0
                        </button>
                        <div class="h-20 sm:h-24 w-full"></div> <!-- Empty cell for layout balance -->
                    </div>
                </div>
            </div>
        </div>

        <script>
            let enteredPin = '';
            
            function pressPinNumber(num) {
                if (enteredPin.length < 4) {
                    enteredPin += num;
                    updatePinDots();
                    document.getElementById('pin-error-msg').classList.add('hidden');
                    
                    if (enteredPin.length === 4) {
                        setTimeout(submitPinVerify, 200);
                    }
                }
            }

            function clearPinNumber() {
                if (enteredPin.length > 0) {
                    enteredPin = enteredPin.slice(0, -1);
                    updatePinDots();
                    document.getElementById('pin-error-msg').classList.add('hidden');
                }
            }
            function updatePinDots() {
                const boxes = document.querySelectorAll('#pin-boxes-container > div');
                boxes.forEach((box, index) => {
                    if (index < enteredPin.length) {
                        box.textContent = '•';
                        box.classList.remove('border-white/15', 'bg-white/5');
                        box.classList.add('border-white', 'bg-white/20', 'text-white', 'ring-4', 'ring-white/20');
                    } else {
                        box.textContent = '';
                        box.classList.remove('border-white', 'bg-white/20', 'ring-4', 'ring-white/20');
                        box.classList.add('border-white/15', 'bg-white/5', 'text-white');
                    }
                });
            }
            function submitPinVerify() {
                if (enteredPin.length < 4) return;

                fetch("{{ route('admin.profile.verify-pin') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ pin: enteredPin })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const modal = document.getElementById('pin-lock-modal');
                        modal.classList.add('opacity-0', 'pointer-events-none');
                        setTimeout(() => {
                            modal.remove();
                        }, 350);
                        
                        if (window.showToastNotification) {
                            if (data.is_new_pin) {
                                window.showToastNotification('PIN baru berhasil didaftarkan & disimpan.', 'success');
                            } else {
                                window.showToastNotification('Akses POS berhasil dibuka.', 'success');
                            }
                        }
                    } else {
                        const card = document.querySelector('#pin-lock-modal > div');
                        card.classList.add('animate-shake');
                        document.getElementById('pin-error-msg').classList.remove('hidden');
                        enteredPin = '';
                        updatePinDots();
                        
                        setTimeout(() => {
                            card.classList.remove('animate-shake');
                        }, 500);
                    }
                })
                .catch(err => {
                    console.error(err);
                });
            }


            // Keyboard support
            document.addEventListener('keydown', function(e) {
                if (document.getElementById('pin-lock-modal')) {
                    if (e.key >= '0' && e.key <= '9') {
                        pressPinNumber(e.key);
                    } else if (e.key === 'Backspace') {
                        clearPinNumber();
                    } else if (e.key === 'Enter') {
                        submitPinVerify();
                    }
                }
            });
        </script>
        
        <style>
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-6px); }
                20%, 40%, 60%, 80% { transform: translateX(6px); }
            }
            .animate-shake {
                animation: shake 0.4s ease-in-out;
            }
        </style>
    @endif

    <!-- LOGOUT CONFIRM MODAL -->
    <div id="logout-confirm-modal"
        class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div id="logout-confirm-modal-card"
            class="bg-white rounded-3xl p-6 max-w-sm w-full border border-neutral-100 scale-95 opacity-0 transition-all duration-200 flex flex-col items-center text-center space-y-4">
            <div class="h-12 w-12 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center border border-rose-100 shadow-sm shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
            </div>

            <div class="space-y-1.5">
                <h3 class="text-sm font-extrabold text-neutral-900 tracking-tight">Keluar dari Akun?</h3>
                <p class="text-[11px] text-neutral-500 leading-relaxed px-1">Apakah Anda yakin ingin keluar dari sistem? Anda harus masuk kembali untuk mengelola outlet atau transaksi.</p>
            </div>

            <div class="flex items-center gap-3 w-full pt-2">
                <button type="button" onclick="closeLogoutConfirmModal()"
                    class="flex-1 px-4 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition active:scale-98 cursor-pointer">Batal</button>
                <form method="POST" action="{{ route('logout') }}" class="flex-1 m-0">
                    @csrf
                    <button type="submit"
                        class="w-full px-4 py-2.5 rounded-xl bg-rose-500 text-xs font-bold text-white hover:bg-rose-600 transition active:scale-98 cursor-pointer">Ya, Keluar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openLogoutConfirmModal() {
            const modal = document.getElementById('logout-confirm-modal');
            const card = document.getElementById('logout-confirm-modal-card');
            if (modal && card) {
                modal.classList.remove('pointer-events-none', 'opacity-0');
                card.classList.remove('scale-95', 'opacity-0');
            }
        }
        function closeLogoutConfirmModal() {
            const modal = document.getElementById('logout-confirm-modal');
            const card = document.getElementById('logout-confirm-modal-card');
            if (modal && card) {
                modal.classList.add('pointer-events-none', 'opacity-0');
                card.classList.add('scale-95', 'opacity-0');
            }
        }
    </script>
</body>

</html>
