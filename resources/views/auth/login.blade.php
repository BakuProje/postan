<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="min-h-screen bg-neutral-50/50 font-sans text-neutral-800 antialiased selection:bg-sky-500 selection:text-white">
    <main class="grid min-h-screen lg:grid-cols-2">
        <section
            class="relative hidden bg-gradient-to-br from-sky-100 via-sky-50 to-sky-200/30 p-12 text-neutral-800 lg:flex lg:flex-col lg:justify-between overflow-hidden border-r border-neutral-200/50">
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_left,_#bae6fd_0,_transparent_40rem)] opacity-60">
            </div>
            <div
                class="absolute top-[15%] right-[10%] h-24 w-24 rounded-full bg-gradient-to-br from-white/95 via-sky-50/30 to-sky-200/20 border border-white shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.1),4px_8px_24px_rgba(14,165,233,0.05)] animate-float">
            </div>
            <div
                class="absolute bottom-[25%] left-[8%] h-20 w-20 rounded-full bg-gradient-to-br from-white/95 via-sky-50/25 to-sky-100/20 border border-white shadow-[inset_3px_3px_8px_rgba(255,255,255,0.9),inset_-3px_-3px_8px_rgba(14,165,233,0.08),3px_6px_16px_rgba(14,165,233,0.04)] animate-float-delayed">
            </div>

            <a href="{{ url('/') }}"
                class="relative z-10 flex items-center gap-2.5 text-base font-bold tracking-wider text-neutral-900 transition-transform duration-250 hover:scale-[1.01]">
                <img src="{{ asset('images/logo.png') }}" alt="Postan Logo" class="h-8 w-auto">
                <span class="font-extrabold tracking-widest text-sm">POSTAN</span>
            </a>

            <div class="relative z-10 max-w-md">
                <p
                    class="mb-5 text-[10px] font-bold tracking-widest text-sky-900 border border-sky-250 bg-sky-100/50 w-fit px-2.5 py-1 rounded-md uppercase">
                    Kelola Toko Lebih Praktis</p>
                <h1 class="text-3xl font-extrabold leading-tight tracking-tight text-neutral-900 font-sans">Semua
                    transaksi toko Anda, dalam satu tempat.</h1>
                <p class="mt-4 text-sm leading-relaxed text-neutral-500">Pantau penjualan, kelola stok produk, dan
                    pantau performa kasir harian Anda dengan lebih praktis.</p>
            </div>

            <p class="relative z-10 text-xs text-neutral-400">© {{ date('Y') }} Postan. Semua hak dilindungi.</p>
        </section>
        <section
            class="relative flex items-center justify-center px-6 py-12 sm:px-10 overflow-hidden bg-white lg:bg-transparent">
            <div
                class="absolute inset-0 -z-10 bg-[linear-gradient(to_right,#80808008_1px,transparent_1px),linear-gradient(to_bottom,#80808008_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_40%,#000_70%,transparent_100%)]">
            </div>
            <div
                class="absolute top-[10%] right-[8%] -z-20 h-24 w-24 rounded-full bg-gradient-to-br from-white/80 via-sky-50/20 to-sky-200/10 border border-white/50 shadow-[inset_3px_3px_8px_rgba(255,255,255,0.9),inset_-3px_-3px_8px_rgba(14,165,233,0.1),3px_6px_16px_rgba(14,165,233,0.04)] animate-float-delayed">
            </div>

            <div class="w-full max-w-md">
                <div class="mb-6 flex items-center justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Postan Logo" class="h-12 w-auto">
                </div>

                <div class="mb-8 text-center">
                    <span
                        class="text-[10px] font-bold uppercase tracking-wider text-sky-800 border border-sky-200 bg-sky-50/30 px-2.5 py-1 rounded">Selamat
                        Datang Kembali</span>
                    <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-neutral-900">Masuk ke akun Anda</h2>
                    <p class="mt-2 text-xs text-neutral-500">Masukkan email dan kata sandi untuk melanjutkan ke dasbor.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-rose-200 bg-rose-50/50 p-4 text-xs text-rose-800 space-y-1">
                        <div class="flex items-center gap-1.5 font-bold text-rose-900 mb-1">
                            <svg class="h-4 w-4 shrink-0 text-rose-600" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            <span>Gagal Masuk</span>
                        </div>
                        <ul class="list-disc list-inside space-y-0.5 font-semibold text-rose-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="mb-5 rounded-xl border border-emerald-250 bg-emerald-50/50 p-4 text-xs text-emerald-800">
                        <div class="flex items-center gap-1.5 font-bold text-emerald-900 mb-1">
                            <svg class="h-4 w-4 shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>Berhasil</span>
                        </div>
                        <p class="leading-relaxed font-semibold text-emerald-700">{{ session('success') }}</p>
                    </div>
                @endif
                @if (session('status'))
                    <div class="mb-5 rounded-xl border border-emerald-250 bg-emerald-50/50 p-4 text-xs text-emerald-800">
                        <div class="flex items-center gap-1.5 font-bold text-emerald-900 mb-1">
                            <svg class="h-4 w-4 shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>Status</span>
                        </div>
                        <p class="leading-relaxed font-semibold text-emerald-700">{{ session('status') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email"
                            class="mb-2 block text-xs font-bold text-neutral-700 uppercase tracking-wide">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            autocomplete="email" required autofocus placeholder="nama@email.com"
                            class="block w-full rounded-lg border border-neutral-200 bg-white px-4 py-3 text-xs outline-none transition placeholder:text-neutral-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-100/50 @error('email') border-rose-500 @enderror">
                        @error('email')
                            <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="mb-2 flex items-center justify-between gap-4">
                            <label for="password"
                                class="text-xs font-bold text-neutral-700 uppercase tracking-wide">Kata sandi</label>
                            <a href="{{ route('password.request') }}"
                                class="text-xs font-semibold text-sky-600 hover:text-sky-700">Lupa kata sandi?</a>
                        </div>
                        <div class="relative">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required placeholder="Masukkan kata sandi"
                                class="block w-full rounded-lg border border-neutral-200 bg-white pl-4 pr-10 py-3 text-xs outline-none transition placeholder:text-neutral-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-100/50 @error('password') border-rose-500 @enderror">
                            <button type="button" id="toggle-password"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                                <svg id="eye-show" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eye-hide" class="h-4.5 w-4.5 hidden" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.895 7.895L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="flex cursor-pointer items-center gap-2.5 text-xs text-neutral-500">
                        <input type="checkbox" name="remember"
                            class="size-4 rounded border-neutral-200 text-sky-600 focus:ring-blue-500">
                        Ingat saya di perangkat ini
                    </label>

                    <button type="submit"
                        class="w-full rounded-lg bg-sky-500 px-4 py-3 text-xs font-semibold text-white transition-all duration-200 hover:bg-sky-600 shadow-sm">Masuk</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
