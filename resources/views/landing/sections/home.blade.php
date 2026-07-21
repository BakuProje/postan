<section id="home"
    class="relative overflow-hidden min-h-[calc(100vh-5rem)] flex items-center py-12 lg:py-16 border-b border-neutral-200/50">
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
                    class="mt-5 text-3xl font-extrabold tracking-tight text-neutral-900 sm:text-5xl lg:leading-[1.15] max-w-2xl">
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

                <div class="mt-10 flex flex-wrap items-center gap-6 sm:gap-8 border-t border-neutral-200/60 pt-8">
                    <div class="flex items-center gap-2">
                        <div class="flex items-center justify-center text-sky-500 shrink-0">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                                <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-neutral-800 whitespace-nowrap">Tanpa Install</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="flex items-center justify-center text-sky-500 shrink-0">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="6" width="18" height="14" rx="2" stroke="currentColor" stroke-width="2"/>
                                <path d="M8 10h8M8 14h5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M16 14h.01" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-neutral-800 whitespace-nowrap">Multi Kasir</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="flex items-center justify-center text-sky-500 shrink-0">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-neutral-800 whitespace-nowrap">Real-time</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="flex items-center justify-center text-sky-500 shrink-0">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                                <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-neutral-800 whitespace-nowrap">Cloud Ready</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 relative">
                <div
                    class="w-full lg:w-[560px] xl:w-[640px] transition-transform duration-300 hover:scale-[1.01]">
                    <img src="{{ asset('images/beranda.png') }}" alt="Dashboard Preview"
                        class="w-full h-auto select-none pointer-events-none drop-shadow-xl" />
                </div>
            </div>
        </div>
    </div>
</section>
