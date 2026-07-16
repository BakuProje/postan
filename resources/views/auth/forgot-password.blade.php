<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Kata Sandi — Postan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(2deg); }
        }
        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(12px) rotate(-2deg); }
        }
        .animate-float {
            animation: float 7s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: float-delayed 9s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen bg-neutral-50/50 font-sans text-neutral-800 antialiased selection:bg-sky-500 selection:text-white">
    <main class="relative grid min-h-screen place-items-center px-6 py-12 overflow-hidden">
        <!-- Background Grid Pattern -->
        <div class="absolute inset-0 -z-10 bg-[linear-gradient(to_right,#80808008_1px,transparent_1px),linear-gradient(to_bottom,#80808008_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_40%,#000_70%,transparent_100%)]"></div>

        <!-- 3D Glassy Bubbles in Background -->
        <div class="absolute top-[12%] left-[10%] -z-20 h-28 w-28 rounded-full bg-gradient-to-br from-white/80 via-sky-50/30 to-sky-200/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.1),4px_8px_24px_rgba(14,165,233,0.06)] animate-float"></div>
        <div class="absolute bottom-[15%] right-[12%] -z-20 h-32 w-32 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-100/10 border border-white/40 shadow-[inset_5px_5px_14px_rgba(255,255,255,0.8),inset_-5px_-5px_14px_rgba(14,165,233,0.08),5px_10px_28px_rgba(14,165,233,0.04)] animate-float-delayed"></div>

        <section class="w-full max-w-md rounded-2xl border border-neutral-200 bg-white p-7 shadow-sm sm:p-9 relative z-10">
            <!-- Custom Logo replacing the Mail Icon (Centered) -->
            <div class="mb-6 flex items-center justify-center">
                <img src="{{ asset('logo.png') }}" alt="Postan Logo" class="h-12 w-auto">
            </div>
            
            <h1 class="text-2xl font-extrabold tracking-tight text-neutral-900 text-center">Lupa kata sandi?</h1>
            <p class="mt-2 text-xs leading-relaxed text-neutral-500 text-center">Masukkan alamat email terdaftar Anda. Kami akan mengirimkan tautan untuk mengatur ulang kata sandi.</p>

            @if (session('status'))
                <div class="mt-5 rounded-lg border border-emerald-250 bg-emerald-50 px-4 py-3 text-xs text-emerald-700">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-5">
                @csrf
                <div>
                    <label for="email" class="mb-2 block text-xs font-bold text-neutral-700 uppercase tracking-wide">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus placeholder="nama@email.com" class="block w-full rounded-lg border border-neutral-200 bg-white px-4 py-3 text-xs outline-none transition placeholder:text-neutral-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-100/50 @error('email') border-rose-500 @enderror">
                    @error('email')<p class="mt-2 text-xs text-rose-600">{{ $message }}</p>@enderror
                </div>
                
                <button type="submit" class="w-full rounded-lg bg-sky-500 px-4 py-3 text-xs font-semibold text-white transition-all duration-200 hover:bg-sky-600 shadow-sm">Kirim tautan reset</button>
            </form>

            <!-- Moved Back Link below Submit Button -->
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-neutral-500 transition-colors hover:text-sky-600">
                    <span aria-hidden="true">←</span> Kembali ke halaman masuk
                </a>
            </div>
        </section>
    </main>
</body>
</html>
