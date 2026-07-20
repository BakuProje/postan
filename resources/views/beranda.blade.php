<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Postan - Sistem Kasir Modern</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-neutral-50/50 font-sans text-neutral-800 antialiased selection:bg-sky-500 selection:text-white">

    <header id="main-header"
        class="sticky top-0 z-50 transition-all duration-300 border-b border-transparent bg-transparent h-20">
        <nav class="mx-auto flex h-full max-w-7xl items-center justify-between px-6 lg:px-8" aria-label="Navigasi utama">
            <a href="{{ route('beranda.index') }}#home"
                class="flex items-center gap-2.5 text-base font-bold tracking-wider text-neutral-900 transition-transform duration-250 hover:scale-[1.01]">
                <img src="{{ asset('logo.png') }}" alt="Postan Logo" class="h-10 w-auto">
                <span class="font-extrabold tracking-widest text-sm">POSTAN</span>
            </a>

            <div class="flex items-center gap-6">
                <div class="hidden items-center gap-1 md:flex">
                    <a href="{{ route('beranda.index') }}#home" id="nav-home"
                        class="rounded-md px-3.5 py-2 text-sm font-semibold tracking-wide transition-all duration-200 text-sky-600 bg-sky-50/50">Home</a>
                    <a href="{{ route('info.index') }}#info" id="nav-info"
                        class="rounded-md px-3.5 py-2 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-500 hover:text-neutral-900">Info</a>
                    <a href="{{ route('contact.index') }}#contact" id="nav-contact"
                        class="rounded-md px-3.5 py-2 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-500 hover:text-neutral-900">Contact</a>
                </div>

                <button id="menu-toggle"
                    class="md:hidden cursor-pointer rounded-lg border border-neutral-200 bg-white p-2.5 text-neutral-700 transition hover:border-neutral-400 hover:text-neutral-900 focus:outline-none">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="hidden md:inline-flex rounded-lg bg-sky-500 px-5 py-2 text-sm font-semibold text-white transition-all duration-200 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="hidden md:inline-flex rounded-lg bg-neutral-900 px-5 py-2 text-sm font-semibold text-white transition-all duration-200 hover:bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2">Login</a>
                @endauth
            </div>
        </nav>
    </header>

    <main>

        <section id="home"
            class="relative overflow-hidden min-h-[calc(100vh-5rem)] flex items-center py-12 border-b border-neutral-200/50">
            <div
                class="absolute inset-0 -z-10 bg-[linear-gradient(to_right,#80808008_1px,transparent_1px),linear-gradient(to_bottom,#80808008_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_40%,#000_70%,transparent_100%)]">
            </div>

            <div
                class="absolute top-[12%] left-[6%] -z-20 h-28 w-28 rounded-full bg-gradient-to-br from-white/80 via-sky-50/30 to-sky-200/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.1),4px_8px_24px_rgba(14,165,233,0.06)] animate-float">
            </div>
            <div
                class="absolute bottom-[15%] right-[8%] -z-20 h-36 w-36 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-100/10 border border-white/40 shadow-[inset_6px_6px_16px_rgba(255,255,255,0.8),inset_-6px_-6px_16px_rgba(14,165,233,0.08),6px_12px_32px_rgba(14,165,233,0.05)] animate-float-delayed">
            </div>
            <div
                class="absolute top-[40%] left-[45%] -z-20 h-16 w-16 rounded-full bg-gradient-to-br from-white/80 via-sky-50/25 to-sky-200/15 border border-white/50 shadow-[inset_3px_3px_8px_rgba(255,255,255,0.9),inset_-3px_-3px_8px_rgba(14,165,233,0.12),3px_6px_16px_rgba(14,165,233,0.06)] animate-float">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8 w-full relative z-10">
                <div class="grid gap-12 lg:grid-cols-12 lg:items-center">

                    <div class="lg:col-span-7">
                        <span
                            class="inline-flex items-center gap-1 rounded-md border border-sky-200 bg-sky-50/40 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-sky-800">
                            Sistem Kasir Modern
                        </span>
                        <h1
                            class="mt-6 text-3xl font-extrabold tracking-tight text-neutral-900 sm:text-5xl lg:leading-[1.15] max-w-2xl">
                            Kelola toko jadi lebih mudah bersama <span class="text-sky-500">Postan</span>.
                        </h1>
                        <p class="mt-5 text-sm leading-relaxed text-neutral-500 max-w-xl">
                            Catat penjualan, pantau transaksi, dan kelola operasional bisnis harian Anda secara teratur
                            dan real-time dalam satu sistem kasir yang ringkas.
                        </p>


                        <div class="mt-8 flex flex-wrap gap-3">
                            <a href="{{ route('login') }}"
                                class="group inline-flex items-center rounded-lg bg-sky-500 px-5 py-3 text-sm font-semibold text-white transition-all duration-200 hover:bg-sky-600 shadow-sm">
                                Mulai Sekarang
                            </a>
                            <a href="{{ route('info.index') }}#info"
                                class="inline-flex items-center rounded-lg border border-neutral-200 bg-white px-5 py-3 text-sm font-semibold text-neutral-600 transition-all duration-200 hover:border-neutral-300 hover:text-neutral-950">
                                Pelajari Lebih Lanjut
                            </a>
                        </div>


                        <div class="mt-10 grid grid-cols-3 gap-6 border-t border-neutral-200/60 pt-8">
                            <div>
                                <p class="text-xl font-extrabold text-neutral-900">Instan</p>
                                <p class="text-[10px] font-bold text-neutral-400 mt-1 uppercase tracking-wide">Setup &
                                    Mulai Cepat</p>
                            </div>
                            <div>
                                <p class="text-xl font-extrabold text-neutral-900">Real-Time</p>
                                <p class="text-[10px] font-bold text-neutral-400 mt-1 uppercase tracking-wide">Pantau
                                    Transaksi</p>
                            </div>
                            <div>
                                <p class="text-xl font-extrabold text-neutral-900">Responsive</p>
                                <p class="text-[10px] font-bold text-neutral-400 mt-1 uppercase tracking-wide">HP,
                                    Tablet, PC</p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5 relative">
                        <div
                            class="w-full lg:w-[630px] xl:w-[670px] transition-transform duration-300 hover:scale-[1.01]">
                            <img src="{{ asset('beranda.png') }}" alt="Dashboard Preview"
                                class="w-full h-auto select-none pointer-events-none" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="info"
            class="relative overflow-hidden bg-transparent min-h-[calc(100vh-5rem)] flex flex-col justify-center py-16 border-b border-neutral-200/50">
            <div
                class="absolute inset-0 -z-10 bg-[linear-gradient(to_right,#80808008_1px,transparent_1px),linear-gradient(to_bottom,#80808008_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_40%,#000_70%,transparent_100%)]">
            </div>
            <div
                class="absolute top-[10%] right-[5%] -z-10 h-32 w-32 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-100/10 border border-white/40 shadow-[inset_5px_5px_14px_rgba(255,255,255,0.8),inset_-5px_-5px_14px_rgba(14,165,233,0.08),5px_10px_28px_rgba(14,165,233,0.04)] animate-float-delayed">
            </div>
            <div
                class="absolute bottom-[10%] left-[4%] -z-10 h-24 w-24 rounded-full bg-gradient-to-br from-white/80 via-sky-50/25 to-sky-200/10 border border-white/50 shadow-[inset_4px_4px_10px_rgba(255,255,255,0.9),inset_-4px_-4px_10px_rgba(14,165,233,0.1),4px_8px_20px_rgba(14,165,233,0.05)] animate-float">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 w-full">
                <div class="max-w-3xl mx-auto text-center border-b border-neutral-100 pb-10">
                    <span
                        class="inline-block text-[10px] font-bold uppercase tracking-wider text-sky-800 border border-sky-200 bg-sky-50/30 px-2.5 py-1 rounded">Fitur
                        Utama</span>
                    <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-4xl leading-tight">
                        Fitur operasional kasir terstruktur.
                    </h2>
                    <p class="mt-4 text-sm text-neutral-500 leading-relaxed max-w-2xl mx-auto">
                        Postan dirancang untuk merapikan seluruh alur transaksi usaha Anda. Mulai dari pencatatan barang
                        masuk, manajemen stok, proses kasir di depan meja, hingga rekapitulasi data penjualan harian
                        dalam satu layar terpusat.
                    </p>
                </div>

                <div class="relative mt-16 pb-12">
                    <div
                        class="absolute left-6 lg:left-1/2 top-4 bottom-4 w-[2px] bg-gradient-to-b from-transparent via-neutral-200 to-transparent -translate-x-1/2">
                    </div>
                    <div
                        class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between mb-12 lg:mb-16 group/item">
                        <div
                            class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 z-10 flex items-center justify-center">
                            <div
                                class="size-10 rounded-full border-4 border-white bg-sky-500 text-white flex items-center justify-center shadow-md transition-all duration-300 group-hover/item:bg-sky-600 group-hover/item:scale-110">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5M4.5 19.5h15m-15-3v-12a1.5 1.5 0 0 1 1.5-1.5h12a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H6a1.5 1.5 0 0 1-1.5-1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.008 2.25h-.008v.008h.008V10.5Zm-3.75-2.25H6.75v.008h4.5V8.25Zm0 2.25H6.75v.008h4.5V10.5Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-full lg:w-[calc(50%-2.5rem)] pl-16 lg:pl-0 lg:text-right order-2 lg:order-1">
                            <div
                                class="group rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm hover:shadow-md hover:border-neutral-300 transition-all duration-300 relative overflow-hidden inline-block w-full lg:max-w-xl">
                                <span
                                    class="text-[10px] font-extrabold uppercase tracking-wider text-sky-500 bg-sky-50 px-2 py-0.5 rounded">Langkah
                                    1</span>
                                <h3
                                    class="mt-3 text-base font-bold text-neutral-900 group-hover:text-sky-500 transition-colors">
                                    Transaksi Instan</h3>
                                <p class="mt-2 text-xs leading-relaxed text-neutral-500">
                                    Proses kasir yang ringkas dengan keranjang dinamis. Cepat, otomatis memotong stok
                                    barang, dan langsung cetak nota belanja pembeli.
                                </p>
                                <ul
                                    class="mt-4 flex flex-col lg:items-end space-y-2 border-t border-neutral-100 pt-4 text-[11px] text-neutral-400">
                                    <li class="flex items-center lg:flex-row-reverse gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Input nominal
                                        bayar & kembalian otomatis
                                    </li>
                                    <li class="flex items-center lg:flex-row-reverse gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Cetak struk
                                        ramah printer termal
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hidden lg:block w-[calc(50%-2.5rem)] order-3">
                            <span class="text-xs font-bold text-neutral-400 tracking-wider">Kasir & POS</span>
                        </div>
                    </div>

                    <div
                        class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between mb-12 lg:mb-16 group/item">
                        <div
                            class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 z-10 flex items-center justify-center">
                            <div
                                class="size-10 rounded-full border-4 border-white bg-sky-500 text-white flex items-center justify-center shadow-md transition-all duration-300 group-hover/item:bg-sky-600 group-hover/item:scale-110">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            </div>
                        </div>
                        <div class="hidden lg:block w-[calc(50%-2.5rem)] text-right order-1">
                            <span class="text-xs font-bold text-neutral-400 tracking-wider">Fleksibilitas</span>
                        </div>
                        <div class="w-full lg:w-[calc(50%-2.5rem)] pl-16 lg:pl-0 order-2">
                            <div
                                class="group rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm hover:shadow-md hover:border-neutral-300 transition-all duration-300 relative overflow-hidden inline-block w-full lg:max-w-xl">
                                <span
                                    class="text-[10px] font-extrabold uppercase tracking-wider text-sky-500 bg-sky-50 px-2 py-0.5 rounded">Langkah
                                    2</span>
                                <h3
                                    class="mt-3 text-base font-bold text-neutral-900 group-hover:text-sky-500 transition-colors">
                                    Akses Multi-Device</h3>
                                <p class="mt-2 text-xs leading-relaxed text-neutral-500">
                                    Antarmuka responsif yang dirancang agar sangat ringan. Akses sistem kasir dari
                                    smartphone, tablet, laptop, atau komputer.
                                </p>
                                <ul
                                    class="mt-4 flex flex-col space-y-2 border-t border-neutral-100 pt-4 text-[11px] text-neutral-400">
                                    <li class="flex items-center gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Kompatibel
                                        dengan semua ukuran layar browser
                                    </li>
                                    <li class="flex items-center gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Tanpa
                                        instalasi aplikasi tambahan
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div
                        class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between mb-12 lg:mb-16 group/item">
                        <div
                            class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 z-10 flex items-center justify-center">
                            <div
                                class="size-10 rounded-full border-4 border-white bg-sky-500 text-white flex items-center justify-center shadow-md transition-all duration-300 group-hover/item:bg-sky-600 group-hover/item:scale-110">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125M3.75 10.125v3.75m16.5-3.75v3.75m-16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125M3.75 13.875v3.75" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-full lg:w-[calc(50%-2.5rem)] pl-16 lg:pl-0 lg:text-right order-2 lg:order-1">
                            <div
                                class="group rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm hover:shadow-md hover:border-neutral-300 transition-all duration-300 relative overflow-hidden inline-block w-full lg:max-w-xl">
                                <span
                                    class="text-[10px] font-extrabold uppercase tracking-wider text-sky-500 bg-sky-50 px-2 py-0.5 rounded">Langkah
                                    3</span>
                                <h3
                                    class="mt-3 text-base font-bold text-neutral-900 group-hover:text-sky-500 transition-colors">
                                    Manajemen Inventaris</h3>
                                <p class="mt-2 text-xs leading-relaxed text-neutral-500">
                                    Kelola data produk Anda secara teratur. Kelompokkan berdasarkan kategori produk,
                                    pantau ketersediaan stok, dan unggah foto produk.
                                </p>
                                <ul
                                    class="mt-4 flex flex-col lg:items-end space-y-2 border-t border-neutral-100 pt-4 text-[11px] text-neutral-400">
                                    <li class="flex items-center lg:flex-row-reverse gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Upload foto
                                        produk terintegrasi
                                    </li>
                                    <li class="flex items-center lg:flex-row-reverse gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span>
                                        Pengelompokan kategori 1-N (One-to-Many)
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hidden lg:block w-[calc(50%-2.5rem)] order-3">
                            <span class="text-xs font-bold text-neutral-400 tracking-wider">Produk & Kategori</span>
                        </div>
                    </div>

                    <div
                        class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between mb-12 lg:mb-16 group/item">
                        <div
                            class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 z-10 flex items-center justify-center">
                            <div
                                class="size-10 rounded-full border-4 border-white bg-sky-500 text-white flex items-center justify-center shadow-md transition-all duration-300 group-hover/item:bg-sky-600 group-hover/item:scale-110">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="hidden lg:block w-[calc(50%-2.5rem)] text-right order-1">
                            <span class="text-xs font-bold text-neutral-400 tracking-wider">Laporan & Grafik</span>
                        </div>
                        <div class="w-full lg:w-[calc(50%-2.5rem)] pl-16 lg:pl-0 order-2">
                            <div
                                class="group rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm hover:shadow-md hover:border-neutral-300 transition-all duration-300 relative overflow-hidden inline-block w-full lg:max-w-xl">
                                <span
                                    class="text-[10px] font-extrabold uppercase tracking-wider text-sky-500 bg-sky-50 px-2 py-0.5 rounded">Langkah
                                    4</span>
                                <h3
                                    class="mt-3 text-base font-bold text-neutral-900 group-hover:text-sky-500 transition-colors">
                                    Monitoring Omzet</h3>
                                <p class="mt-2 text-xs leading-relaxed text-neutral-500">
                                    Grafik rekapitulasi data keuangan dan transaksi harian. Cari dan telusuri riwayat
                                    transaksi kasir Anda dengan filter tanggal terstruktur.
                                </p>
                                <ul
                                    class="mt-4 flex flex-col space-y-2 border-t border-neutral-100 pt-4 text-[11px] text-neutral-400">
                                    <li class="flex items-center gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Pencarian
                                        riwayat transaksi ber-pagination
                                    </li>
                                    <li class="flex items-center gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Grafik rekap
                                        harian & ekspor CSV/PDF
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div
                        class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between mb-12 lg:mb-16 group/item">
                        <div
                            class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 z-10 flex items-center justify-center">
                            <div
                                class="size-10 rounded-full border-4 border-white bg-sky-500 text-white flex items-center justify-center shadow-md transition-all duration-300 group-hover/item:bg-sky-600 group-hover/item:scale-110">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-full lg:w-[calc(50%-2.5rem)] pl-16 lg:pl-0 lg:text-right order-2 lg:order-1">
                            <div
                                class="group rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm hover:shadow-md hover:border-neutral-300 transition-all duration-300 relative overflow-hidden inline-block w-full lg:max-w-xl">
                                <span
                                    class="text-[10px] font-extrabold uppercase tracking-wider text-sky-500 bg-sky-50 px-2 py-0.5 rounded">Langkah
                                    5</span>
                                <h3
                                    class="mt-3 text-base font-bold text-neutral-900 group-hover:text-sky-500 transition-colors">
                                    Peran & Hak Akses</h3>
                                <p class="mt-2 text-xs leading-relaxed text-neutral-500">
                                    Pembagian wewenang yang aman untuk admin dan kasir. Batasi akses menu penting demi
                                    kerahasiaan keuangan toko Anda.
                                </p>
                                <ul
                                    class="mt-4 flex flex-col lg:items-end space-y-2 border-t border-neutral-100 pt-4 text-[11px] text-neutral-400">
                                    <li class="flex items-center lg:flex-row-reverse gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Pembagian
                                        role Admin & Kasir mandiri
                                    </li>
                                    <li class="flex items-center lg:flex-row-reverse gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Pengaturan
                                        profil personal aman
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hidden lg:block w-[calc(50%-2.5rem)] order-3">
                            <span class="text-xs font-bold text-neutral-400 tracking-wider">Keamanan & Pengguna</span>
                        </div>
                    </div>
                    <div
                        class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between mb-12 lg:mb-16 group/item">
                        <div
                            class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 z-10 flex items-center justify-center">
                            <div
                                class="size-10 rounded-full border-4 border-white bg-sky-500 text-white flex items-center justify-center shadow-md transition-all duration-300 group-hover/item:bg-sky-600 group-hover/item:scale-110">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="hidden lg:block w-[calc(50%-2.5rem)] text-right order-1">
                            <span class="text-xs font-bold text-neutral-400 tracking-wider">Rekap & Ekspor</span>
                        </div>
                        <div class="w-full lg:w-[calc(50%-2.5rem)] pl-16 lg:pl-0 order-2">
                            <div
                                class="group rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm hover:shadow-md hover:border-neutral-300 transition-all duration-300 relative overflow-hidden inline-block w-full lg:max-w-xl">
                                <span
                                    class="text-[10px] font-extrabold uppercase tracking-wider text-sky-500 bg-sky-50 px-2 py-0.5 rounded">Langkah
                                    6</span>
                                <h3
                                    class="mt-3 text-base font-bold text-neutral-900 group-hover:text-sky-500 transition-colors">
                                    Ekspor Laporan</h3>
                                <p class="mt-2 text-xs leading-relaxed text-neutral-500">
                                    Unduh seluruh rekapitulasi data penjualan harian atau berkala. Mempermudah pembukuan
                                    dan kalkulasi keuntungan bisnis.
                                </p>
                                <ul
                                    class="mt-4 flex flex-col space-y-2 border-t border-neutral-100 pt-4 text-[11px] text-neutral-400">
                                    <li class="flex items-center gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Ekspor
                                        laporan satu klik ke Excel/PDF
                                    </li>
                                    <li class="flex items-center gap-1.5">
                                        <span class="h-1 w-1 rounded-full bg-neutral-300 shrink-0"></span> Histori
                                        penjualan lengkap ber-pagination
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact"
            class="relative overflow-hidden bg-transparent min-h-[calc(100vh-5rem)] flex flex-col justify-center py-16 border-b border-neutral-200/50">
            <div
                class="absolute inset-0 -z-10 bg-[linear-gradient(to_right,#80808008_1px,transparent_1px),linear-gradient(to_bottom,#80808008_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_40%,#000_70%,transparent_100%)]">
            </div>
            <div
                class="absolute top-[15%] left-[5%] -z-10 h-28 w-28 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-100/10 border border-white/40 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.8),inset_-4px_-4px_12px_rgba(14,165,233,0.08),4px_8px_24px_rgba(14,165,233,0.04)] animate-float">
            </div>
            <div
                class="absolute bottom-[10%] right-[6%] -z-10 h-32 w-32 rounded-full bg-gradient-to-br from-white/80 via-sky-50/25 to-sky-200/10 border border-white/50 shadow-[inset_5px_5px_14px_rgba(255,255,255,0.9),inset_-5px_-5px_14px_rgba(14,165,233,0.1),5px_10px_28px_rgba(14,165,233,0.05)] animate-float-delayed">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 w-full">
                <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                    <div>
                        <span
                            class="text-[10px] font-bold uppercase tracking-wider text-sky-800 border border-sky-200 bg-sky-50/30 px-2.5 py-1 rounded">Hubungi
                            Kami</span>
                        <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-neutral-900 sm:text-3xl">
                            Ada pertanyaan atau butuh bantuan?
                        </h2>
                        <p class="mt-2 text-sm text-neutral-500 max-w-md">
                            Hubungi kami melalui media sosial resmi kami di bawah ini untuk konsultasi, bantuan setup,
                            atau keluhan teknis.
                        </p>

                        <div class="mt-8 space-y-3 max-w-md">
                            <a href="https://wa.me/6281527641306" target="_blank"
                                class="group flex items-center justify-start rounded-xl border border-neutral-200 bg-white p-4 transition-all duration-200 hover:border-sky-300 hover:bg-sky-50/20">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-9 w-9 items-center justify-center rounded bg-sky-50 text-sky-600">
                                        <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.458 5.704 1.459h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-sky-600/70 uppercase tracking-wider">
                                            WhatsApp</p>
                                        <p
                                            class="text-xs font-bold text-neutral-800 mt-0.5 group-hover:text-sky-600 transition-colors duration-200">
                                            +6281527641306</p>
                                    </div>
                                </div>
                            </a>

                            <a href="https://instagram.com/kuzuroken.20" target="_blank"
                                class="group flex items-center justify-start rounded-xl border border-neutral-200 bg-white p-4 transition-all duration-200 hover:border-sky-300 hover:bg-sky-50/20">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-9 w-9 items-center justify-center rounded bg-sky-50 text-sky-600">
                                        <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-sky-600/70 uppercase tracking-wider">
                                            Instagram</p>
                                        <p
                                            class="text-xs font-bold text-neutral-800 mt-0.5 group-hover:text-sky-600 transition-colors duration-200">
                                            @kuzuroken.20</p>
                                    </div>
                                </div>
                            </a>

                            <a href="https://tiktok.com/@kuzuroken" target="_blank"
                                class="group flex items-center justify-start rounded-xl border border-neutral-200 bg-white p-4 transition-all duration-200 hover:border-sky-300 hover:bg-sky-50/20">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-9 w-9 items-center justify-center rounded bg-sky-50 text-sky-600">
                                        <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.17-2.89-.74-3.94-1.78-.22-.22-.41-.47-.59-.73v7.02c0 3.74-3.11 7.01-6.93 6.98-3.8-.03-6.96-3.28-6.79-7.07.15-3.47 3.09-6.38 6.56-6.4v4.03c-1.92.05-3.56 1.64-3.56 3.56-.02 2.16 1.95 3.99 4.12 3.82 1.83-.14 3.23-1.69 3.23-3.53V0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-sky-600/70 uppercase tracking-wider">
                                            TikTok</p>
                                        <p
                                            class="text-xs font-bold text-neutral-800 mt-0.5 group-hover:text-sky-600 transition-colors duration-200">
                                            @kuzuroken</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="relative overflow-hidden rounded-2xl border border-neutral-200 bg-white p-1.5">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7703549413136!2d119.44030565436952!3d-5.140634619455414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd0fcdc03983%3A0xe1ad0fda136ccb8f!2sPS%20gaming%20(Rental%20PS3%20dan%20PS4)!5e0!3m2!1sid!2sid!4v1784214140421!5m2!1sid!2sid"
                                width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="strict-origin-when-cross-origin" class="rounded-xl">
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>


    <div id="mobile-sidebar" class="fixed inset-0 z-50 pointer-events-none transition-all duration-300">
        <div id="sidebar-overlay"
            class="absolute inset-0 bg-neutral-950/20 backdrop-blur-xs opacity-0 transition-opacity duration-300 pointer-events-none">
        </div>

        <div id="sidebar-panel"
            class="absolute top-0 right-0 bottom-0 w-64 max-w-xs bg-white p-6 border-l border-neutral-200 translate-x-full transition-transform duration-300 pointer-events-auto flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-6 border-b border-neutral-100">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
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

                <nav class="mt-6 flex flex-col gap-2">
                    <a href="{{ route('beranda.index') }}#home" id="mob-nav-home"
                        class="rounded-md px-3.5 py-2.5 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900">Home</a>
                    <a href="{{ route('info.index') }}#info" id="mob-nav-info"
                        class="rounded-md px-3.5 py-2.5 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900">Info</a>
                    <a href="{{ route('contact.index') }}#contact" id="mob-nav-contact"
                        class="rounded-md px-3.5 py-2.5 text-sm font-semibold tracking-wide transition-all duration-200 text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900">Contact</a>
                </nav>
            </div>

            <div class="border-t border-neutral-100 pt-6">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="block w-full text-center rounded-lg bg-sky-500 px-4 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-sky-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="block w-full text-center rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-neutral-800">Login</a>
                @endauth
            </div>
        </div>
    </div>
</body>

</html>
