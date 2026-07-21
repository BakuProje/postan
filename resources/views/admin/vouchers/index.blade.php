@extends('layouts.admin')
@section('title', '')
@section('konten')
    <div class="space-y-6 relative">
        <div
            class="relative bg-gradient-to-br from-sky-50/60 via-white/80 to-blue-50/50 rounded-2xl border border-sky-100/60 p-6 md:p-8">

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">
                <div class="max-w-xl">
                    <h2 class="text-2xl font-black text-neutral-900 tracking-tight">Voucher</h2>
                    <p class="text-xs text-neutral-500 mt-1.5 leading-relaxed">Kelola voucher diskon dan promo untuk
                        meningkatkan penjualan toko.</p>
                </div>

                <div class="relative z-10 flex flex-wrap items-center gap-2">
                    <button type="button" onclick="openCreateVoucherModal()"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-sky-600 active:scale-98 cursor-pointer select-none">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Buat Voucher
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 relative z-10">
                <div
                    class="bg-white/95 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                    <div
                        class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center shrink-0 border border-blue-100/50">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.5 1.5 0 0 0 2.122 0l4.318-4.318a1.5 1.5 0 0 0 0-2.122L11.159 3.659A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 7.5h.008v.008H6V7.5Z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-neutral-400 capitalize tracking-wide block">Total
                            Voucher</span>
                        <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                            {{ $totalVouchers }}</h3>
                        <span class="text-[11px] font-bold text-neutral-400 block mt-1.5">Semua voucher</span>
                    </div>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                    <div
                        class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 border border-emerald-100/50">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-neutral-400 capitalize tracking-wide block">Voucher
                            Aktif</span>
                        <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                            {{ $activeVouchers }}</h3>
                        <span class="text-[11px] font-bold text-emerald-600 block mt-1.5">Sedang aktif</span>
                    </div>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                    <div
                        class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center shrink-0 border border-amber-100/50">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-neutral-400 capitalize tracking-wide block">Akan
                            Berakhir</span>
                        <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                            {{ $expiringVouchers }}</h3>
                        <span class="text-[11px] font-bold text-sky-600 block mt-1.5">Status promo</span>
                    </div>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                    <div
                        class="h-12 w-12 rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center shrink-0 border border-purple-100/50">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-neutral-400 capitalize tracking-wide block">Total
                            Digunakan</span>
                        <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                            {{ number_format($totalUsed, 0, ',', '.') }}x</h3>
                        <span class="text-[11px] font-bold text-purple-600 block mt-1.5">Total penggunaan</span>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.vouchers') }}" method="GET"
            class="bg-white/95 backdrop-blur-md p-4 rounded-2xl border border-neutral-200/80 mb-6 flex flex-wrap items-center gap-3">
            <div class="flex-1 min-w-[240px] relative">
                <svg class="h-4 w-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-neutral-400" fill="none"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari kode atau nama voucher..."
                    class="w-full bg-neutral-50 border border-neutral-200/80 rounded-xl pl-9 pr-4 py-2 text-xs font-bold text-neutral-700 outline-hidden focus:border-sky-500 focus:bg-white transition-all placeholder:text-neutral-400">
            </div>

            <div class="w-40 shrink-0">
                <select name="status" onchange="this.form.submit()"
                    class="w-full bg-neutral-50 border border-neutral-200/80 rounded-xl px-3 py-2 text-xs font-bold text-neutral-700 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                    <option value="expiring" {{ request('status') === 'expiring' ? 'selected' : '' }}>Akan Berakhir</option>
                </select>
            </div>

            <div class="w-40 shrink-0">
                <select name="type" onchange="this.form.submit()"
                    class="w-full bg-neutral-50 border border-neutral-200/80 rounded-xl px-3 py-2 text-xs font-bold text-neutral-700 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                    <option value="">Semua Jenis</option>
                    <option value="discount_percent" {{ request('type') === 'discount_percent' ? 'selected' : '' }}>Diskon
                        (%)</option>
                    <option value="discount_nominal" {{ request('type') === 'discount_nominal' ? 'selected' : '' }}>
                        Potongan Harga (Rp)</option>
                </select>
            </div>

            <button type="submit"
                class="px-4 py-2 bg-sky-50 border border-sky-100 text-sky-600 rounded-xl text-xs font-bold hover:bg-sky-100 transition flex items-center gap-1.5 cursor-pointer">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
                Filter
            </button>
        </form>
        @if ($vouchers->isEmpty())
            <div class="bg-white/95 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-12 text-center">
                <div
                    class="h-16 w-16 bg-neutral-100 rounded-full flex items-center justify-center mx-auto mb-4 text-neutral-400">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-12v.75m0 3v.75m0 3v.75m0 3V18m-3-12h15a2.25 2.25 0 0 1 2.25 2.25v9a2.25 2.25 0 0 1-2.25 2.25H4.5A2.25 2.25 0 0 1 2.25 15V8.25A2.25 2.25 0 0 1 4.5 6Z" />
                    </svg>
                </div>
                <h3 class="text-sm font-extrabold text-neutral-800">Voucher Tidak Ditemukan</h3>
                <p class="text-xs text-neutral-500 max-w-sm mx-auto mt-1">Belum ada voucher yang cocok dengan filter atau
                    kata kunci pencarian Anda.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-6">
                @foreach ($vouchers as $voucher)
                    @php
                        $today = \Carbon\Carbon::today();
                        $endDate = \Carbon\Carbon::parse($voucher->end_date);
                        $diffInDays = $today->diffInDays($endDate, false);

                        $statusLabel = 'Aktif';
                        $statusClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200/60';
                        $isExpiredOrInactive = !$voucher->is_active || $diffInDays < 0;

                        if ($isExpiredOrInactive) {
                            $statusLabel = 'Nonaktif';
                            $statusClass = 'bg-neutral-100 text-neutral-600 border border-neutral-200';
                            $themeColor = 'neutral';
                        } elseif ($diffInDays == 0) {
                            $statusLabel = 'Berakhir Hari Ini';
                            $statusClass = 'bg-sky-50 text-sky-700 font-extrabold border border-sky-200';
                            $themeColor = 'sky';
                        } elseif ($diffInDays == 1) {
                            $statusLabel = 'Berakhir 1 Hari lagi';
                            $statusClass = 'bg-sky-50 text-sky-700 font-extrabold border border-sky-200';
                            $themeColor = 'sky';
                        } elseif ($diffInDays <= 7) {
                            $statusLabel = "Berakhir {$diffInDays} Hari lagi";
                            $statusClass = 'bg-sky-50 text-sky-700 font-extrabold border border-sky-200';
                            $themeColor = 'sky';
                        } else {
                            $statusLabel = 'Aktif';
                            $statusClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200/60';
                            $themeColor = 'sky';
                        }

                        if ($isExpiredOrInactive) {
                            $iconHtml =
                                '<svg class="h-4 w-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>';
                        } else {
                            if ($voucher->type === 'discount_nominal') {
                                $iconHtml = '<span class="text-[9px] font-black text-sky-600 select-none">Rp</span>';
                            } else {
                                $iconHtml = '<span class="text-xs font-black text-sky-600 select-none">%</span>';
                            }
                        }

                        $stripBg =
                            $themeColor === 'neutral'
                                ? 'bg-neutral-400'
                                : 'bg-gradient-to-br from-sky-400 via-sky-500 to-blue-600';
                    @endphp
                    <div
                        class="relative bg-white rounded-2xl border border-neutral-200/80 shadow-xs flex min-h-[175px] h-auto overflow-visible transition hover:border-sky-300 hover:shadow-md group">
                        <div
                            class="w-20 {{ $stripBg }} rounded-l-2xl flex flex-col items-center justify-center shrink-0 relative overflow-hidden text-white">
                            <div
                                class="h-10 w-10 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center shadow-inner shrink-0 border border-white/30">
                                {!! $iconHtml !!}
                            </div>
                            <span class="text-[9px] font-black tracking-widest uppercase mt-2 text-white/90">
                                {{ $voucher->type === 'discount_percent' ? 'DISKON' : 'POTONGAN' }}
                            </span>
                        </div>

                        <div class="ticket-notch-top"></div>
                        <div class="ticket-notch-bottom"></div>
                        <div class="ticket-divider"></div>

                        <div class="flex-1 p-4 pl-7 flex flex-col justify-between overflow-hidden">
                            <div>
                                <div class="flex items-center justify-between gap-2">
                                    <h4 class="text-base font-black text-neutral-900 tracking-wider truncate uppercase">
                                        {{ $voucher->code }}</h4>
                                    <span
                                        class="px-2.5 py-1 text-[9px] font-black rounded-lg shrink-0 uppercase tracking-wide {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </span>
                                </div>

                                <div
                                    class="mt-1.5 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-100/80">
                                    <svg class="h-3.5 w-3.5 text-sky-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.5 1.5 0 0 0 2.122 0l4.318-4.318a1.5 1.5 0 0 0 0-2.122L11.159 3.659A2.25 2.25 0 0 0 9.568 3Z" />
                                    </svg>
                                    <span class="text-xs font-black">
                                        @if ($voucher->type === 'discount_percent')
                                            Diskon {{ round($voucher->value) }}%
                                        @else
                                            Potongan Rp {{ number_format($voucher->value, 0, ',', '.') }}
                                        @endif
                                    </span>
                                </div>

                                <p class="text-xs font-medium text-neutral-500 mt-1 leading-snug line-clamp-1">
                                    {{ $voucher->description }}</p>
                            </div>

                            <div
                                class="pt-2 border-t border-neutral-100 flex items-center justify-between gap-2 text-[11px] font-bold">
                                <div class="flex items-center gap-2.5 text-neutral-400 whitespace-nowrap">
                                    <span class="flex items-center gap-1 text-[10px] whitespace-nowrap">
                                        <svg class="h-3.5 w-3.5 text-neutral-400 shrink-0" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        {{ $endDate->format('d M Y') }}
                                    </span>
                                    <span>•</span>
                                    <span class="text-neutral-600 font-extrabold flex items-center gap-1 text-[10px] whitespace-nowrap">
                                        <svg class="h-3.5 w-3.5 text-neutral-400 shrink-0" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                        {{ $voucher->used_count }}x dipakai
                                    </span>
                                </div>

                                <div class="flex items-center gap-1.5 relative">
                                    <button type="button"
                                        onclick="openEditVoucherModalDirect(event, {{ $voucher->id }}, '{{ addslashes($voucher->code) }}', '{{ $voucher->type }}', {{ (float) $voucher->value }}, '{{ $voucher->end_date }}', '{{ addslashes($voucher->description ?? '') }}')"
                                        title="Ubah Voucher"
                                        class="h-7 w-7 rounded-lg border border-neutral-200 bg-white text-neutral-600 hover:bg-sky-50 hover:text-sky-600 hover:border-sky-200 flex items-center justify-center transition cursor-pointer select-none">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>

                                    <div class="relative inline-block text-left"
                                        id="action-dropdown-{{ $voucher->id }}">
                                        <button type="button"
                                            onclick="toggleDropdownMenu(event, 'dropdown-menu-{{ $voucher->id }}')"
                                            class="h-7 w-7 rounded-lg border border-neutral-200 bg-white text-neutral-600 hover:bg-neutral-50 flex items-center justify-center transition cursor-pointer select-none">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                            </svg>
                                        </button>
                                        <div id="dropdown-menu-{{ $voucher->id }}"
                                            class="hidden absolute right-0 bottom-8 w-44 bg-white rounded-xl border border-neutral-200 p-1.5 z-50 shadow-md">
                                            <form action="{{ route('admin.vouchers.toggle', $voucher->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="w-full text-left flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-neutral-700 hover:bg-neutral-50 rounded-lg transition cursor-pointer">
                                                    <svg class="h-4 w-4 text-neutral-500" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                                                    </svg>
                                                    {{ $voucher->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                                </button>
                                            </form>
                                            <button type="button"
                                                onclick="confirmDeleteVoucher('{{ $voucher->id }}', '{{ $voucher->code }}')"
                                                class="w-full text-left flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-rose-600 hover:bg-rose-50 rounded-lg transition cursor-pointer">
                                                <svg class="h-4 w-4 text-rose-500" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                                Hapus Voucher
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div id="create-voucher-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-xs opacity-0 pointer-events-none transition-all duration-200 hidden">
        <div
            class="relative bg-white rounded-2xl border border-neutral-200 max-w-lg w-full p-6 scale-95 opacity-0 transition-all duration-200 shadow-2xl">
            <div class="flex items-center justify-between pb-3.5 border-b border-neutral-100">
                <h3 class="text-sm font-black text-neutral-900">Buat Voucher Baru</h3>
                <button type="button" onclick="closeModal('create-voucher-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer select-none">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('admin.vouchers.store') }}" method="POST" class="mt-4 space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Kode Voucher</label>
                        <input type="text" name="code" required placeholder="Contoh: PROMO20"
                            class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all uppercase">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Jenis Voucher</label>
                        <select name="type" id="create-type" required onchange="updateValueHelperText('create')"
                            class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-700 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                            <option value="discount_percent">Diskon (%)</option>
                            <option value="discount_nominal">Potongan Harga (Rp)</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Nilai Voucher</label>
                        <input type="text" id="create-value-display" required placeholder="Contoh: 20 atau 200.000"
                            oninput="formatVoucherValueInput('create')"
                            class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all">
                        <input type="hidden" name="value" id="create-value">
                        <p id="create-value-helper" class="text-[10px] text-neutral-400 mt-1 font-medium">Masukkan angka
                            persentase diskon (contoh: 20 untuk diskon 20%)</p>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Berlaku Sampai
                            Tanggal</label>
                        <input type="date" name="end_date" required value="{{ date('Y-m-d') }}"
                            class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Deskripsi Singkat</label>
                    <input type="text" name="description" required placeholder="Diskon 20% untuk semua produk"
                        class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all">
                </div>

                <div class="flex justify-end gap-2.5 pt-3 border-t border-neutral-100">
                    <button type="button" onclick="closeModal('create-voucher-modal')"
                        class="px-4 py-2.5 rounded-xl border border-neutral-200 bg-white text-xs font-bold text-neutral-500 hover:bg-neutral-50 transition cursor-pointer select-none">Batal</button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-sky-500 hover:bg-sky-600 text-xs font-bold text-white transition active:scale-98 cursor-pointer select-none">Simpan
                        Voucher</button>
                </div>
            </form>
        </div>
    </div>

    <div id="edit-voucher-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-xs opacity-0 pointer-events-none transition-all duration-200 hidden">
        <div
            class="relative bg-white rounded-2xl border border-neutral-200 max-w-lg w-full p-6 scale-95 opacity-0 transition-all duration-200 shadow-2xl">
            <div class="flex items-center justify-between pb-3.5 border-b border-neutral-100">
                <h3 class="text-sm font-black text-neutral-900">Ubah Data Voucher</h3>
                <button type="button" onclick="closeModal('edit-voucher-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer select-none">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="edit-voucher-form" method="POST" class="mt-4 space-y-4">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Kode Voucher</label>
                        <input type="text" name="code" id="edit-code" required
                            class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all uppercase">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Jenis Voucher</label>
                        <select name="type" id="edit-type" required onchange="updateValueHelperText('edit')"
                            class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-700 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                            <option value="discount_percent">Diskon (%)</option>
                            <option value="discount_nominal">Potongan Harga (Rp)</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Nilai Voucher</label>
                        <input type="text" id="edit-value-display" required placeholder="Contoh: 20 atau 200.000"
                            oninput="formatVoucherValueInput('edit')"
                            class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all">
                        <input type="hidden" name="value" id="edit-value">
                        <p id="edit-value-helper" class="text-[10px] text-neutral-400 mt-1 font-medium">Masukkan angka
                            persentase diskon (contoh: 20 untuk diskon 20%)</p>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Berlaku Sampai
                            Tanggal</label>
                        <input type="date" name="end_date" id="edit-end_date" required
                            class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-neutral-400 capitalize mb-1.5">Deskripsi Singkat</label>
                    <input type="text" name="description" id="edit-description" required
                        class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3.5 py-2.5 outline-hidden focus:border-sky-500 focus:bg-white transition-all">
                </div>

                <div class="flex justify-end gap-2.5 pt-3 border-t border-neutral-100">
                    <button type="button" onclick="closeModal('edit-voucher-modal')"
                        class="px-4 py-2.5 rounded-xl border border-neutral-200 bg-white text-xs font-bold text-neutral-500 hover:bg-neutral-50 transition cursor-pointer select-none">Batal</button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-sky-500 hover:bg-sky-600 text-xs font-bold text-white transition active:scale-98 cursor-pointer select-none">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="delete-confirmation-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-xs opacity-0 pointer-events-none transition-all duration-200 hidden">
        <div
            class="relative bg-white rounded-2xl border border-neutral-200 max-w-sm w-full p-6 scale-95 opacity-0 transition-all duration-200 text-center shadow-2xl">
            <div
                class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-rose-50 border border-rose-100 text-rose-500 mb-4 shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </div>
            <h3 class="text-sm font-black text-neutral-900 mb-1.5">Hapus Voucher</h3>
            <p class="text-xs text-neutral-500 mb-6">Apakah Anda yakin ingin menghapus voucher <strong
                    id="delete-voucher-code" class="text-neutral-800 font-extrabold"></strong>? Tindakan ini tidak dapat
                dibatalkan.</p>

            <div class="flex justify-center gap-2.5">
                <button type="button" onclick="closeModal('delete-confirmation-modal')"
                    class="px-4 py-2.5 border border-neutral-200 bg-white hover:bg-neutral-50 text-xs font-bold text-neutral-700 rounded-xl transition cursor-pointer select-none">Batal</button>
                <form id="confirm-delete-form" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2.5 bg-rose-500 hover:bg-rose-600 text-xs font-bold text-white rounded-xl transition active:scale-98 cursor-pointer select-none">Ya,
                        Hapus</button>
                </form>
            </div>
        </div>
    </div>

@endsection
