<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk — Postan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-900">
    <main class="grid min-h-screen lg:grid-cols-2">
        <section class="hidden bg-indigo-600 p-12 text-white lg:flex lg:flex-col lg:justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-3 text-xl font-bold">
                <span class="grid size-11 place-items-center rounded-xl bg-white text-lg font-black text-indigo-600">P</span>
                POSTAN
            </a>
            <div class="max-w-md">
                <p class="mb-5 text-sm font-semibold tracking-[0.2em] text-indigo-200">KELOLA TOKO LEBIH MUDAH</p>
                <h1 class="text-4xl font-bold leading-tight">Semua transaksi toko Anda, dalam satu tempat.</h1>
                <p class="mt-5 text-lg leading-8 text-indigo-100">Pantau penjualan dan operasional bisnis Anda dengan lebih praktis.</p>
            </div>
            <p class="text-sm text-indigo-200">© {{ date('Y') }} Postan. Semua hak dilindungi.</p>
        </section>

        <section class="flex items-center justify-center px-6 py-12 sm:px-10">
            <div class="w-full max-w-md">
                <a href="{{ url('/') }}" class="mb-10 flex items-center gap-3 text-xl font-bold lg:hidden">
                    <span class="grid size-11 place-items-center rounded-xl bg-indigo-600 text-lg font-black text-white">P</span>
                    POSTAN
                </a>
                <div class="mb-8">
                    <p class="text-sm font-semibold text-indigo-600">SELAMAT DATANG KEMBALI</p>
                    <h2 class="mt-2 text-3xl font-bold tracking-tight">Masuk ke akun Anda</h2>
                    <p class="mt-2 text-sm text-slate-500">Masukkan email dan kata sandi untuk melanjutkan.</p>
                </div>

                @if (session('status'))
                    <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus placeholder="nama@email.com" class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 @error('email') border-rose-500 @enderror">
                        @error('email')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <div class="mb-2 flex items-center justify-between gap-4">
                            <label for="password" class="text-sm font-semibold text-slate-700">Kata sandi</label>
                            <a href="{{ route('password.request') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Lupa kata sandi?</a>
                        </div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Masukkan kata sandi" class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 @error('password') border-rose-500 @enderror">
                        @error('password')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>
                    <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-600">
                        <input type="checkbox" name="remember" class="size-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                        Ingat saya di perangkat ini
                    </label>
                    <button type="submit" class="w-full rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200">Masuk</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
