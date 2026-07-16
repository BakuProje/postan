<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Postan - Sistem Kasir</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans text-slate-900">
    <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur">
        <nav class="mx-auto flex h-20 max-w-7xl items-center px-4 sm:px-6 lg:px-8" aria-label="Navigasi utama">
            <a href="{{ route('beranda.index') }}#home" class="flex items-center gap-3 text-xl font-bold tracking-tight">
                <span class="grid size-10 place-items-center rounded-xl bg-indigo-600 text-base font-black text-white shadow-lg shadow-indigo-200">P</span>
                POSTAN
            </a>

            <div class="ml-auto flex items-center gap-2 sm:gap-4">
                <div class="hidden items-center rounded-xl bg-slate-100 p-1 md:flex">
                    <a href="{{ route('beranda.index') }}#home" class="rounded-lg px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('beranda.*') ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-600 hover:text-indigo-600' }}">Home</a>
                    <a href="{{ route('info.index') }}#info" class="rounded-lg px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('info.*') ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-600 hover:text-indigo-600' }}">Info</a>
                    <a href="{{ route('contact.index') }}#contact" class="rounded-lg px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('contact.*') ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-600 hover:text-indigo-600' }}">Contact</a>
                </div>
                <details class="relative md:hidden">
                    <summary class="cursor-pointer list-none rounded-xl border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-700 transition hover:border-indigo-300 hover:text-indigo-600">Menu</summary>
                    <div class="absolute right-0 mt-3 w-44 rounded-xl border border-slate-200 bg-white p-2 shadow-xl shadow-slate-200">
                        <a href="{{ route('beranda.index') }}#home" class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('beranda.*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">Home</a>
                        <a href="{{ route('info.index') }}#info" class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('info.*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">Info</a>
                        <a href="{{ route('contact.index') }}#contact" class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('contact.*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">Contact</a>
                    </div>
                </details>
                <a href="{{ route('login') }}" class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200">Login</a>
            </div>
        </nav>
    </header>

    <main>
        <section id="home" class="relative overflow-hidden">
            <div class="absolute inset-x-0 top-0 -z-10 h-full bg-[radial-gradient(circle_at_top_right,_#c7d2fe_0,_transparent_32rem)]"></div>
            <div class="mx-auto grid max-w-7xl gap-12 px-6 py-20 sm:py-28 lg:grid-cols-2 lg:items-center lg:px-8">
                <div>
                    <p class="mb-5 inline-flex rounded-full bg-indigo-50 px-4 py-2 text-xs font-bold tracking-widest text-indigo-700">SISTEM KASIR MODERN</p>
                    <h1 class="max-w-xl text-4xl font-bold tracking-tight text-slate-900 sm:text-6xl">Kelola toko jadi lebih mudah bersama Postan.</h1>
                    <p class="mt-6 max-w-lg text-lg leading-8 text-slate-600">Catat penjualan, pantau transaksi, dan bantu operasional bisnis Anda tetap rapi dalam satu sistem.</p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('login') }}" class="rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700">Mulai sekarang</a>
                        <a href="{{ route('info.index') }}#info" class="rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:border-indigo-300 hover:text-indigo-700">Pelajari lebih lanjut</a>
                    </div>
                </div>

                <div class="rounded-3xl border border-indigo-100 bg-white p-6 shadow-2xl shadow-indigo-100 sm:p-8">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-5">
                        <div><p class="text-sm text-slate-500">Penjualan hari ini</p><p class="mt-1 text-2xl font-bold">Rp 2.450.000</p></div>
                        <span class="rounded-lg bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-600">+12,5%</span>
                    </div>
                    <div class="mt-6 grid grid-cols-3 gap-3 text-center">
                        <div class="rounded-xl bg-slate-50 p-4"><p class="text-lg font-bold text-indigo-600">28</p><p class="mt-1 text-xs text-slate-500">Transaksi</p></div>
                        <div class="rounded-xl bg-slate-50 p-4"><p class="text-lg font-bold text-indigo-600">16</p><p class="mt-1 text-xs text-slate-500">Produk</p></div>
                        <div class="rounded-xl bg-slate-50 p-4"><p class="text-lg font-bold text-indigo-600">8</p><p class="mt-1 text-xs text-slate-500">Pelanggan</p></div>
                    </div>
                    <div class="mt-6 h-24 rounded-xl bg-gradient-to-r from-indigo-100 via-indigo-50 to-violet-100"></div>
                </div>
            </div>
        </section>

        <section id="info" class="bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="max-w-2xl"><p class="text-sm font-bold tracking-widest text-indigo-600">TENTANG POSTAN</p><h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">Fitur sederhana untuk operasional yang lebih teratur.</h2></div>
                <div class="mt-12 grid gap-6 md:grid-cols-3">
                    <article class="rounded-2xl border border-slate-200 p-6"><div class="grid size-11 place-items-center rounded-xl bg-indigo-50 font-bold text-indigo-600">01</div><h3 class="mt-5 text-lg font-bold">Transaksi cepat</h3><p class="mt-2 text-sm leading-6 text-slate-600">Catat transaksi penjualan secara ringkas dan akurat.</p></article>
                    <article class="rounded-2xl border border-slate-200 p-6"><div class="grid size-11 place-items-center rounded-xl bg-indigo-50 font-bold text-indigo-600">02</div><h3 class="mt-5 text-lg font-bold">Data terpusat</h3><p class="mt-2 text-sm leading-6 text-slate-600">Simpan data penjualan dan produk pada satu tempat.</p></article>
                    <article class="rounded-2xl border border-slate-200 p-6"><div class="grid size-11 place-items-center rounded-xl bg-indigo-50 font-bold text-indigo-600">03</div><h3 class="mt-5 text-lg font-bold">Mudah dipantau</h3><p class="mt-2 text-sm leading-6 text-slate-600">Lihat gambaran aktivitas toko dengan lebih jelas.</p></article>
                </div>
            </div>
        </section>

        <section id="contact" class="bg-slate-900 py-20 text-white sm:py-24">
            <div class="mx-auto flex max-w-7xl flex-col justify-between gap-8 px-6 lg:flex-row lg:items-center lg:px-8">
                <div><p class="text-sm font-bold tracking-widest text-indigo-300">HUBUNGI KAMI</p><h2 class="mt-3 text-3xl font-bold tracking-tight">Butuh bantuan menggunakan Postan?</h2><p class="mt-3 text-slate-300">Kami siap membantu kebutuhan bisnis Anda.</p></div>
                <a href="mailto:halo@postan.test" class="inline-flex w-fit rounded-xl bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition hover:bg-indigo-50">halo@postan.test</a>
            </div>
        </section>
    </main>

    <footer class="border-t border-slate-800 bg-slate-900 px-6 py-6 text-center text-sm text-slate-400">© {{ date('Y') }} Postan. Semua hak dilindungi.</footer>
</body>
</html>
