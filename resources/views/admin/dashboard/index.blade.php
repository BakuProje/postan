@extends('layouts.admin')

@section('title', $outlet && $outlet->name ? $outlet->name : 'Beranda Dashboard')

@section('konten')
    <div class="w-full relative space-y-6 pb-6 -mt-3">
        <div
            class="absolute -top-10 -right-10 h-32 w-32 rounded-full bg-gradient-to-tr from-sky-400/10 via-sky-300/5 to-transparent blur-md pointer-events-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 relative z-10">
            <div
                class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-5 sm:p-6 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.04)] hover:-translate-y-1 group flex flex-col justify-between min-h-[140px]">
                <div
                    class="absolute -bottom-8 -right-8 h-20 w-20 rounded-full bg-emerald-500/10 blur-xl pointer-events-none transition-all duration-500 group-hover:bg-emerald-500/15 group-hover:scale-125">
                </div>
                <div class="relative z-10 flex items-start justify-between">
                    <span class="text-[11px] font-bold text-neutral-400 uppercase tracking-widest">Total Pendapatan</span>
                    <div
                        class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center border border-emerald-100/40 shadow-sm transition-transform duration-350 group-hover:scale-110 shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 11V7a4 4 0 0 0-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                </div>
                <div class="relative z-10 mt-2">
                    <h3 class="text-xl sm:text-2xl font-black text-neutral-900 tracking-tight leading-none">Rp
                        {{ number_format($omset, 0, ',', '.') }}</h3>
                </div>
                <div class="relative z-10 mt-3 flex items-center justify-between">
                    <div class="flex items-center gap-1 text-[11px] font-bold select-none">
                        @if ($growth > 0)
                            <span
                                class="text-emerald-500 flex items-center gap-0.5 bg-emerald-50 border border-emerald-100/30 rounded-full px-2.5 py-0.5">
                                <svg class="h-3 w-3" viewBox="0 0 12 12" fill="currentColor">
                                    <path d="M6 2L2 7h8z" />
                                </svg>
                                {{ number_format($growth, 0) }}%
                            </span>
                        @elseif($growth < 0)
                            <span
                                class="text-rose-500 flex items-center gap-0.5 bg-rose-50 border border-rose-100/30 rounded-full px-2.5 py-0.5">
                                <svg class="h-3 w-3" viewBox="0 0 12 12" fill="currentColor">
                                    <path d="M6 10L2 5h8z" />
                                </svg>
                                {{ number_format(abs($growth), 0) }}%
                            </span>
                        @else
                            <span
                                class="text-neutral-400 bg-neutral-50 border border-neutral-200/30 rounded-full px-2.5 py-0.5">0%</span>
                        @endif
                    </div>
                </div>
            </div>

            <div
                class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-5 sm:p-6 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.04)] hover:-translate-y-1 group flex flex-col justify-between min-h-[140px]">
                <div
                    class="absolute -bottom-8 -right-8 h-20 w-20 rounded-full bg-sky-500/10 blur-xl pointer-events-none transition-all duration-500 group-hover:bg-sky-500/15 group-hover:scale-125">
                </div>
                <div class="relative z-10 flex items-start justify-between">
                    <span class="text-[11px] font-bold text-neutral-400 uppercase tracking-widest">Total Transaksi</span>
                    <div
                        class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-sky-50 text-sky-500 flex items-center justify-center border border-sky-100/40 shadow-sm transition-transform duration-350 group-hover:scale-110 shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </div>
                </div>
                <div class="relative z-10 mt-2">
                    <h3 class="text-xl sm:text-2xl font-black text-neutral-900 tracking-tight leading-none">
                        {{ number_format($penjualan, 0, ',', '.') }}</h3>
                </div>
                <div class="relative z-10 mt-3 flex items-center justify-between">
                    <div class="flex items-center gap-1 text-[11px] font-bold select-none">
                        @if ($growth > 0)
                            <span
                                class="text-sky-500 flex items-center gap-0.5 bg-sky-50 border border-sky-100/30 rounded-full px-2.5 py-0.5">
                                <svg class="h-3 w-3" viewBox="0 0 12 12" fill="currentColor">
                                    <path d="M6 2L2 7h8z" />
                                </svg>
                                12%
                            </span>
                        @elseif($growth < 0)
                            <span
                                class="text-rose-500 flex items-center gap-0.5 bg-rose-50 border border-rose-100/30 rounded-full px-2.5 py-0.5">
                                <svg class="h-3 w-3" viewBox="0 0 12 12" fill="currentColor">
                                    <path d="M6 10L2 5h8z" />
                                </svg>
                                12%
                            </span>
                        @else
                            <span
                                class="text-neutral-400 bg-neutral-50 border border-neutral-200/30 rounded-full px-2.5 py-0.5">0%</span>
                        @endif
                    </div>
                </div>
            </div>

            <div
                class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-5 sm:p-6 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.04)] hover:-translate-y-1 group flex flex-col justify-between min-h-[140px]">
                <div
                    class="absolute -bottom-8 -right-8 h-20 w-20 rounded-full bg-orange-500/10 blur-xl pointer-events-none transition-all duration-500 group-hover:bg-orange-500/15 group-hover:scale-125">
                </div>
                <div class="relative z-10 flex items-start justify-between">
                    <span class="text-[11px] font-bold text-neutral-400 uppercase tracking-widest">Produk Terjual</span>
                    <div
                        class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center border border-orange-100/40 shadow-sm transition-transform duration-350 group-hover:scale-110 shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25M9 7.5v9" />
                        </svg>
                    </div>
                </div>
                <div class="relative z-10 mt-2">
                    <h3 class="text-xl sm:text-2xl font-black text-neutral-900 tracking-tight leading-none">
                        {{ number_format($produkTerjual, 0, ',', '.') }}</h3>
                </div>
                <div class="relative z-10 mt-3 flex items-center justify-between">
                    <div class="flex items-center gap-1 text-[11px] font-bold select-none">
                        @if ($growth > 0)
                            <span
                                class="text-orange-500 flex items-center gap-0.5 bg-orange-50 border border-orange-100/30 rounded-full px-2.5 py-0.5">
                                <svg class="h-3 w-3" viewBox="0 0 12 12" fill="currentColor">
                                    <path d="M6 2L2 7h8z" />
                                </svg>
                                8%
                            </span>
                        @elseif($growth < 0)
                            <span
                                class="text-rose-500 flex items-center gap-0.5 bg-rose-50 border border-rose-100/30 rounded-full px-2.5 py-0.5">
                                <svg class="h-3 w-3" viewBox="0 0 12 12" fill="currentColor">
                                    <path d="M6 10L2 5h8z" />
                                </svg>
                                8%
                            </span>
                        @else
                            <span
                                class="text-neutral-400 bg-neutral-50 border border-neutral-200/30 rounded-full px-2.5 py-0.5">0%</span>
                        @endif
                    </div>
                </div>
            </div>

            <div
                class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-5 sm:p-6 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.04)] hover:-translate-y-1 group flex flex-col justify-between min-h-[140px]">
                <div
                    class="absolute -bottom-8 -right-8 h-20 w-20 rounded-full bg-violet-500/10 blur-xl pointer-events-none transition-all duration-500 group-hover:bg-violet-500/15 group-hover:scale-125">
                </div>
                <div class="relative z-10 flex items-start justify-between">
                    <span class="text-[11px] font-bold text-neutral-400 uppercase tracking-widest">Kasir Aktif</span>
                    <div
                        class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-violet-50 text-violet-500 flex items-center justify-center border border-violet-100/40 shadow-sm transition-transform duration-350 group-hover:scale-110 shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                </div>
                <div class="relative z-10 mt-2">
                    <h3 class="text-xl sm:text-2xl font-black text-neutral-900 tracking-tight leading-none">
                        {{ number_format($kasirAktif, 0, ',', '.') }}</h3>
                </div>
                <div class="relative z-10 mt-3 flex items-center justify-between">
                    <div class="flex items-center gap-1 text-[11px] font-bold select-none">
                        <span
                            class="text-emerald-500 flex items-center gap-1.5 bg-emerald-50 border border-emerald-100/30 rounded-full px-2.5 py-0.5">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Aktif
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- STATISTIK GRAFIK & KASIR -->
        <div class="grid gap-6 2xl:grid-cols-3 relative z-10 mb-6">
            <div
                class="2xl:col-span-2 bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-4 sm:p-7 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.05)] hover:-translate-y-1">
                <div
                    class="absolute inset-0 bg-[linear-gradient(to_right,#80808003_1px,transparent_1px),linear-gradient(to_bottom,#80808003_1px,transparent_1px)] bg-[size:20px_20px] pointer-events-none">
                </div>
                <div class="relative z-10 flex items-center justify-between mb-4 sm:mb-6">
                    <span class="text-xs font-black text-neutral-900 uppercase tracking-widest">Tren Pemasukan 7 Hari
                        Terakhir</span>
                </div>
                <div class="relative z-10 w-full h-[220px] sm:h-[250px]">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Performa Kasir -->
            <div
                class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-6 sm:p-8 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.05)] hover:-translate-y-1 flex flex-col justify-between">
                <div
                    class="absolute inset-0 bg-[linear-gradient(to_right,#80808003_1px,transparent_1px),linear-gradient(to_bottom,#80808003_1px,transparent_1px)] bg-[size:20px_20px] pointer-events-none">
                </div>
                <div class="relative z-10 w-full">
                    <div class="flex items-center justify-between mb-5">
                        <span class="text-xs font-black text-neutral-900 uppercase tracking-widest block">Performa
                            Kasir</span>
                        <div class="relative">
                            <select
                                class="bg-neutral-50/80 border border-neutral-200/80 text-[10px] font-bold text-neutral-600 px-2.5 py-1.5 rounded-xl focus:outline-none appearance-none pr-7 cursor-pointer">
                                <option>Hari Ini</option>
                                <option>Bulan Ini</option>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none text-neutral-400">
                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="space-y-4 max-h-[230px] overflow-y-auto pr-1 no-scrollbar">
                        @php
                            $maxSales = $performaKasir->max('total_sales') ?: 1;
                        @endphp
                        @forelse($performaKasir as $user)
                            <div
                                class="flex items-center justify-between gap-3 border-b border-neutral-100/60 pb-3.5 last:border-0 last:pb-0">
                                <div class="flex items-center gap-2.5 min-w-0 flex-1">
                                    @if ($loop->iteration == 1)
                                        <div
                                            class="flex items-center justify-center rounded-full size-6 bg-amber-400 text-white font-black text-[10px] shadow-2xs shrink-0">
                                            1</div>
                                    @elseif ($loop->iteration == 2)
                                        <div
                                            class="flex items-center justify-center rounded-full size-6 bg-slate-300 text-white font-black text-[10px] shadow-2xs shrink-0">
                                            2</div>
                                    @elseif ($loop->iteration == 3)
                                        <div
                                            class="flex items-center justify-center rounded-full size-6 bg-orange-350 text-white font-black text-[10px] shadow-2xs shrink-0">
                                            3</div>
                                    @else
                                        <div
                                            class="flex items-center justify-center rounded-full size-6 bg-neutral-100 text-neutral-500 font-black text-[10px] shrink-0">
                                            4</div>
                                    @endif
                                    <div
                                        class="h-9 w-9 rounded-full overflow-hidden border border-neutral-200 shrink-0 shadow-2xs">
                                        @if ($user->profile_picture)
                                            <img src="{{ asset($user->profile_picture) }}" alt="{{ $user->name }}"
                                                class="h-full w-full object-cover">
                                        @else
                                            <div
                                                class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-xs uppercase">
                                                {{ substr($user->name, 0, 2) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pr-1">
                                        <p class="text-xs font-bold text-neutral-900 leading-none truncate">{{ $user->name }}</p>
                                        <div class="w-full max-w-[80px] sm:max-w-[120px] bg-neutral-100 h-1.5 rounded-full overflow-hidden mt-1.5">
                                            <div class="bg-sky-500 h-full rounded-full transition-all duration-500"
                                                style="width: {{ ($user->total_sales / $maxSales) * 100 }}%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0">
                                    <p class="text-xs font-black text-neutral-900 leading-none whitespace-nowrap">Rp
                                        {{ number_format($user->total_sales, 0, ',', '.') }}</p>
                                    <p class="text-[10px] text-neutral-400 font-semibold mt-1 whitespace-nowrap">
                                        {{ $user->transactions_count }} transaksi</p>
                                </div>
                            </div>
                        @empty
                            <div class="py-12 flex flex-col items-center justify-center text-center space-y-2">
                                <p class="text-xs text-neutral-400 italic">Belum ada riwayat performa kasir.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- TABEL STOK KRITIS & TRANSAKSI TERBARU -->
        @php
            $notifications = \App\Models\Notification::latest()->take(4)->get();
        @endphp

        <div class="grid gap-6 md:grid-cols-2 2xl:grid-cols-3 relative z-10">
            <div
                class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-6 sm:p-7 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.05)] hover:-translate-y-1 min-h-[340px] flex flex-col">
                <div
                    class="absolute inset-0 bg-[linear-gradient(to_right,#80808003_1px,transparent_1px),linear-gradient(to_bottom,#80808003_1px,transparent_1px)] bg-[size:20px_20px] pointer-events-none">
                </div>
                <div class="relative z-10 flex items-center justify-between mb-5 shrink-0">
                    <span class="text-sm font-bold text-neutral-800">Stok Produk</span>
                    <a href="{{ route('admin.products') }}"
                        class="text-xs text-sky-600 hover:text-sky-700 font-semibold transition">Lihat Semua</a>
                </div>
                <div class="relative z-10 space-y-4 overflow-y-auto pr-1 no-scrollbar flex-1">
                    @forelse($productsStock->take(4) as $prod)
                        <div
                            class="grid grid-cols-12 items-center gap-2 border-b border-neutral-100/60 py-3.5 last:border-0 last:pb-0">
                            <div class="col-span-7 flex items-center gap-3">
                                <div
                                    class="h-11 w-11 rounded-xl overflow-hidden border border-neutral-200/80 shadow-3xs bg-white shrink-0">
                                    @if ($prod->photo)
                                        <img src="{{ asset($prod->photo) }}" alt="{{ $prod->name }}"
                                            class="h-full w-full object-cover">
                                    @else
                                        <div
                                            class="h-full w-full bg-gradient-to-tr from-sky-50 to-sky-100/50 text-sky-600 flex items-center justify-center font-bold text-sm uppercase">
                                            {{ substr($prod->name, 0, 2) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="overflow-hidden">
                                    <p class="text-sm font-bold text-neutral-800 leading-tight truncate">
                                        {{ $prod->name }}</p>
                                    <p class="text-xs text-neutral-400 font-medium leading-none mt-1 truncate">
                                        {{ $prod->category->name }}</p>
                                </div>
                            </div>
                            <div class="col-span-2 text-center">
                                <span class="text-sm text-slate-700 font-semibold whitespace-nowrap">
                                    <span class="font-bold text-slate-800">{{ $prod->stock }}</span> <span
                                        class="text-neutral-400 text-xs font-normal">pcs</span>
                                </span>
                            </div>
                            <div class="col-span-3 text-right">
                                @if ($prod->stock <= 5)
                                    <span
                                        class="inline-block text-[11px] font-semibold text-rose-500 bg-rose-50 border border-rose-100/50 rounded-full px-2.5 py-0.5 shrink-0">Kritis</span>
                                @elseif($prod->stock <= 15)
                                    <span
                                        class="inline-block text-[11px] font-semibold text-amber-600 bg-amber-50 border border-amber-100/50 rounded-full px-2.5 py-0.5 shrink-0">Rendah</span>
                                @else
                                    <span
                                        class="inline-block text-[11px] font-semibold text-emerald-600 bg-emerald-50 border border-emerald-100/50 rounded-full px-2.5 py-0.5 shrink-0">Aman</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="py-16 flex flex-col items-center justify-center text-center space-y-2">
                            <svg class="h-8 w-8 text-neutral-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                            <p class="text-xs text-neutral-400 italic">Belum ada produk terdaftar.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Transaksi Terbaru -->
            <div
                class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-6 sm:p-7 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.05)] hover:-translate-y-1 min-h-[340px] flex flex-col">
                <div
                    class="absolute inset-0 bg-[linear-gradient(to_right,#80808003_1px,transparent_1px),linear-gradient(to_bottom,#80808003_1px,transparent_1px)] bg-[size:20px_20px] pointer-events-none">
                </div>
                <div class="relative z-10 flex items-center justify-between mb-5 shrink-0">
                    <span class="text-sm font-bold text-neutral-800">Transaksi Terbaru</span>
                    <a href="{{ route('admin.history') }}"
                        class="text-xs text-sky-600 hover:text-sky-700 font-semibold transition">Lihat Semua</a>
                </div>
                <div class="relative z-10 overflow-x-auto overflow-y-auto no-scrollbar flex-1 w-full">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="border-b border-neutral-100 text-[10px] font-bold text-neutral-400 uppercase tracking-wider">
                                <th class="pb-3 pl-1">KASIR</th>
                                <th class="pb-3 px-1 text-center">WAKTU</th>
                                <th class="pb-3 px-1 text-center">METODE</th>
                                <th class="pb-3 pr-1 text-right">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-100 text-xs">
                            @forelse($recentTransactions->take(4) as $tx)
                                <tr class="group/row">
                                    <td class="py-2.5 pl-1 font-semibold text-neutral-800 flex items-center gap-1.5 whitespace-nowrap">
                                        <div
                                            class="h-5.5 w-5.5 rounded-full overflow-hidden border border-neutral-200 shrink-0">
                                            @if ($tx->user && $tx->user->profile_picture)
                                                <img src="{{ asset($tx->user->profile_picture) }}"
                                                    alt="{{ $tx->user->name }}" class="h-full w-full object-cover">
                                            @else
                                                <div
                                                    class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-bold text-[8px] uppercase">
                                                    {{ substr($tx->user ? $tx->user->name : 'KS', 0, 2) }}
                                                </div>
                                            @endif
                                        </div>
                                        <span class="truncate max-w-[55px] font-semibold text-[11px]">{{ $tx->user ? $tx->user->name : ($tx->customer_name ?? 'Kasir') }}</span>
                                    </td>
                                    <td class="py-2.5 px-1 text-neutral-400 text-[10px] font-medium text-center whitespace-nowrap">
                                        {{ $tx->created_at ? $tx->created_at->format('H:i') : '-' }}</td>
                                    <td class="py-2.5 px-1 text-center whitespace-nowrap">
                                        @if (strtolower($tx->payment_method) === 'qris')
                                            <span
                                                class="inline-flex items-center rounded bg-violet-50 border border-violet-100 px-1.5 py-0.5 text-[9px] font-bold text-violet-600 uppercase tracking-wider">
                                                QRIS
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center rounded bg-emerald-50 border border-emerald-100 px-1.5 py-0.5 text-[9px] font-bold text-emerald-600 uppercase tracking-wider">
                                                CASH
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-2.5 pr-1 text-right font-black text-neutral-900 text-[11px] whitespace-nowrap">Rp
                                        {{ number_format($tx->total_price, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-12 text-center text-xs text-neutral-400 italic">Belum ada
                                        transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Notifikasi -->
            <div
                class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-6 sm:p-7 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.05)] hover:-translate-y-1 min-h-[340px] flex flex-col">
                <div
                    class="absolute inset-0 bg-[linear-gradient(to_right,#80808003_1px,transparent_1px),linear-gradient(to_bottom,#80808003_1px,transparent_1px)] bg-[size:20px_20px] pointer-events-none">
                </div>
                <div class="relative z-10 flex items-center justify-between mb-5 shrink-0">
                    <span class="text-sm font-bold text-neutral-800">Notifikasi</span>
                </div>
                <div class="relative z-10 space-y-4 overflow-y-auto pr-1 no-scrollbar flex-1">
                    @forelse ($notifications as $n)
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
                            class="flex items-start justify-between border-b border-neutral-100/60 pb-3 last:border-0 last:pb-0">
                            <div class="flex items-start gap-2.5 min-w-0">
                                <div
                                    class="h-9 w-9 rounded-full flex items-center justify-center shrink-0 @if ($color === 'rose') bg-rose-50 text-rose-500 @elseif($color === 'emerald') bg-emerald-50 text-emerald-500 @elseif($color === 'amber') bg-amber-50 text-amber-500 @else bg-blue-50 text-blue-500 @endif">
                                    @if ($n->type === 'stock')
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25M9 7.5v9" />
                                        </svg>
                                    @elseif($n->type === 'transaction')
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg>
                                    @elseif($n->type === 'login')
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    @else
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.5 1.5 0 0 0 2.122 0l4.318-4.318a1.5 1.5 0 0 0 0-2.122L11.16 3.659A2.25 2.25 0 0 0 9.568 3Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 6h.008v.008H6V6Z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="space-y-0.5 min-w-0 pr-2">
                                    <p class="text-[12px] font-bold text-neutral-800 leading-tight truncate">
                                        {{ $n->title }}
                                    </p>
                                    <p class="text-[11px] text-neutral-400 font-normal leading-normal truncate">
                                        {{ $n->subtitle }}
                                    </p>
                                </div>
                            </div>
                            <span
                                class="text-[10px] text-neutral-400 font-normal shrink-0 text-right mt-0.5 whitespace-nowrap">
                                {{ $n->created_at->diffForHumans() }}
                            </span>
                        </div>
                    @empty
                        <div class="py-16 flex flex-col items-center justify-center text-center space-y-2">
                            <svg class="h-8 w-8 text-neutral-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                            <p class="text-xs text-neutral-400 italic">Tidak ada notifikasi baru.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div id="sales-chart-data" class="hidden" style="display: none !important;"
        data-labels="{{ json_encode($chartLabels) }}" data-sales="{{ json_encode($chartSales) }}">
    </div>
@endsection
