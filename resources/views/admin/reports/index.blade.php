@extends('layouts.admin')
@section('title', '')

@section('konten')
    <div class="max-w-[1440px] w-full mx-auto pb-12">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-black text-neutral-900 tracking-tight">Laporan Penjualan</h1>
                <p class="text-xs font-semibold text-neutral-400 mt-1">Rekapitulasi seluruh data penjualan toko Anda.</p>
            </div>
            <button type="button" onclick="openExportReportModal()"
                class="px-4 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-extrabold text-xs rounded-xl transition flex items-center gap-2 shadow-xs active:scale-98 cursor-pointer select-none">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                Ekspor Laporan
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <!-- Card 1: Total Penjualan -->
            <div
                class="bg-white rounded-2xl border border-neutral-200/80 p-5 shadow-xs transition hover:border-neutral-300 flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0 border border-sky-100/60 shadow-2xs">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <span class="text-[11px] font-bold text-neutral-400 block tracking-wide whitespace-nowrap">Total Penjualan</span>
                    <h3 class="text-xl sm:text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1.5 whitespace-nowrap">Rp
                        {{ number_format($totalSales, 0, ',', '.') }}</h3>
                </div>
            </div>

            <!-- Card 2: Total Item Terjual -->
            <div
                class="bg-white rounded-2xl border border-neutral-200/80 p-5 shadow-xs transition hover:border-neutral-300 flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 border border-amber-100/60 shadow-2xs">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m20.25 7.5-8.25 4.5m0 0L3.75 7.5m8.25 4.5v11.25c0 .621.504 1.125 1.125 1.125h.375a1.125 1.125 0 0 0 1.125-1.125V12m-5.25 0L3.75 7.5M12 12 3.75 7.5m8.25 4.5 8.25-4.5M20.25 7.5l-8.25 4.5M20.25 7.5v11.25c0 .621-.504 1.125-1.125 1.125h-.375a1.125 1.125 0 0 1-1.125-1.125V12" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <span class="text-[11px] font-bold text-neutral-400 block tracking-wide whitespace-nowrap">Total Item Terjual</span>
                    <h3 class="text-xl sm:text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1.5 whitespace-nowrap">
                        {{ number_format($totalItemsSold, 0, ',', '.') }} <span class="text-xs text-neutral-400 font-bold">pcs</span></h3>
                </div>
            </div>

            <!-- Card 3: TUNAI -->
            <div
                class="bg-white rounded-2xl border border-neutral-200/80 p-5 shadow-xs transition hover:border-neutral-300 flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-100/60 shadow-2xs">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5M3.75 20.25h16.5M3 6.75h18M3.75 9h16.5M3 11.25h18M3.75 13.5h16.5M3 15.75h18M3.75 18h16.5" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <span class="text-[11px] font-bold text-neutral-400 block tracking-wide whitespace-nowrap">TUNAI</span>
                    <h3 class="text-xl sm:text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1.5 whitespace-nowrap">Rp
                        {{ number_format($cashAmount, 0, ',', '.') }}</h3>
                </div>
            </div>

            <!-- Card 4: QRIS -->
            <div
                class="bg-white rounded-2xl border border-neutral-200/80 p-5 shadow-xs transition hover:border-neutral-300 flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0 border border-purple-100/60 shadow-2xs">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <span class="text-[11px] font-bold text-neutral-400 block tracking-wide whitespace-nowrap">QRIS</span>
                    <h3 class="text-xl sm:text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1.5 whitespace-nowrap">Rp
                        {{ number_format($qrisAmount, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.reports') }}" method="GET"
            class="bg-white p-4 rounded-2xl border border-neutral-200/80 mb-6 flex flex-wrap items-center justify-between gap-3 shadow-xs">
            <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                <div class="w-36">
                    <label class="block text-[10px] font-extrabold text-neutral-400 mb-1 capitalize">Periode</label>
                    <select name="period" onchange="this.form.submit()"
                        class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-700 rounded-xl px-3 py-2 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                        <option value="7days" {{ $period === '7days' ? 'selected' : '' }}>7 Hari Terakhir</option>
                        <option value="today" {{ $period === 'today' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="30days" {{ $period === '30days' ? 'selected' : '' }}>30 Hari Terakhir</option>
                    </select>
                </div>

                <div class="w-40">
                    <label class="block text-[10px] font-extrabold text-neutral-400 mb-1 capitalize">Mulai Tanggal</label>
                    <input type="date" name="start_date" value="{{ $startDate }}" onchange="this.form.submit()"
                        class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3 py-2 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                </div>

                <div class="w-40">
                    <label class="block text-[10px] font-extrabold text-neutral-400 mb-1 capitalize">Sampai Tanggal</label>
                    <input type="date" name="end_date" value="{{ $endDate }}" onchange="this.form.submit()"
                        class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3 py-2 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                </div>

                <div class="w-40">
                    <label class="block text-[10px] font-extrabold text-neutral-400 mb-1 capitalize">Kasir</label>
                    <select name="kasir_id" onchange="this.form.submit()"
                        class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-700 rounded-xl px-3 py-2 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                        <option value="all">Semua Kasir</option>
                        @foreach ($cashiers as $c)
                            <option value="{{ $c->id }}" {{ $kasirId == $c->id ? 'selected' : '' }}>
                                {{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-44">
                    <label class="block text-[10px] font-extrabold text-neutral-400 mb-1 capitalize">Metode
                        Pembayaran</label>
                    <select name="payment_method" onchange="this.form.submit()"
                        class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-700 rounded-xl px-3 py-2 outline-hidden focus:border-sky-500 focus:bg-white transition-all cursor-pointer">
                        <option value="all">Semua Metode</option>
                        <option value="cash"
                            {{ $paymentMethod === 'cash' || $paymentMethod === 'tunai' ? 'selected' : '' }}>Tunai</option>
                        <option value="qris" {{ $paymentMethod === 'qris' ? 'selected' : '' }}>QRIS</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center gap-2 self-end pb-0.5">
                <button type="submit"
                    class="px-5 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 cursor-pointer shadow-xs active:scale-98">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                    Filter
                </button>
            </div>
        </form>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white rounded-2xl border border-neutral-200/80 p-6 shadow-xs relative">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-sm font-black text-neutral-900">Grafik Penjualan</h3>
                            <p class="text-[11px] text-neutral-400 font-medium mt-0.5">Arahkan kursor ke titik grafik untuk
                                melihat rincian detail</p>
                        </div>
                    </div>

                    @php
                        $maxVal = max(max($chartData), 100000);
                        $chartPoints = [];
                        $count = count($chartData);
                        foreach ($chartData as $idx => $val) {
                            $x = $count > 1 ? ($idx / ($count - 1)) * 680 + 10 : 350;
                            $y = 175 - ($val / $maxVal) * 135;
                            $label = $chartLabels[$idx] ?? '';
                            $chartPoints[] = ['x' => $x, 'y' => $y, 'val' => $val, 'label' => $label];
                        }

                        $pathD = '';
                        if (count($chartPoints) > 0) {
                            $pathD = 'M ' . $chartPoints[0]['x'] . ',' . $chartPoints[0]['y'];
                            for ($i = 0; $i < count($chartPoints) - 1; $i++) {
                                $p1 = $chartPoints[$i];
                                $p2 = $chartPoints[$i + 1];
                                $cx = ($p1['x'] + $p2['x']) / 2;
                                $pathD .=
                                    ' C ' .
                                    $cx .
                                    ',' .
                                    $p1['y'] .
                                    ' ' .
                                    $cx .
                                    ',' .
                                    $p2['y'] .
                                    ' ' .
                                    $p2['x'] .
                                    ',' .
                                    $p2['y'];
                            }
                        }
                        $areaD = $pathD . ' L 690,185 L 10,185 Z';
                    @endphp

                    <div class="relative h-64 w-full pt-4 group">
                        <div id="chart-tooltip"
                            class="hidden absolute z-30 bg-neutral-900 text-white rounded-xl px-3.5 py-2 text-xs font-bold shadow-xl pointer-events-none whitespace-nowrap min-w-[110px] text-center transform -translate-x-1/2 -translate-y-full transition-all duration-75">
                            <div id="tooltip-date"
                                class="text-[10px] text-sky-400 font-extrabold mb-0.5 whitespace-nowrap"></div>
                            <div id="tooltip-val" class="text-xs font-black whitespace-nowrap text-white"></div>
                        </div>

                        <svg class="w-full h-full overflow-visible" viewBox="0 0 700 200" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="reportChartGrad" x1="0" y1="0" x2="0"
                                    y2="1">
                                    <stop offset="0%" stop-color="#0284c7" stop-opacity="0.35" />
                                    <stop offset="100%" stop-color="#0284c7" stop-opacity="0.0" />
                                </linearGradient>
                            </defs>

                            <line x1="0" y1="40" x2="700" y2="40" stroke="#f1f5f9"
                                stroke-width="1.5" stroke-dasharray="4 4" />
                            <line x1="0" y1="90" x2="700" y2="90" stroke="#f1f5f9"
                                stroke-width="1.5" stroke-dasharray="4 4" />
                            <line x1="0" y1="140" x2="700" y2="140" stroke="#f1f5f9"
                                stroke-width="1.5" stroke-dasharray="4 4" />
                            <line x1="0" y1="185" x2="700" y2="185" stroke="#cbd5e1"
                                stroke-width="1.5" />

                            @if (!empty($pathD))
                                <path d="{{ $areaD }}" fill="url(#reportChartGrad)" />

                                <path d="{{ $pathD }}" fill="none" stroke="#0284c7" stroke-width="3.5"
                                    stroke-linecap="round" />

                                @foreach ($chartPoints as $idx => $pt)
                                    @php
                                        $colW = $count > 1 ? 680 / ($count - 1) : 100;
                                        $rectX = max(0, $pt['x'] - $colW / 2);
                                    @endphp
                                    <g class="group/pt cursor-pointer"
                                        onmouseenter="showChartTooltip(event, '{{ $pt['label'] }}', 'Rp {{ number_format($pt['val'], 0, ',', '.') }}', {{ $pt['x'] }}, {{ $pt['y'] }})"
                                        onmouseleave="hideChartTooltip()">
                                        <rect x="{{ $rectX }}" y="0" width="{{ $colW }}" height="185"
                                            fill="transparent" />
                                        <circle cx="{{ $pt['x'] }}" cy="{{ $pt['y'] }}" r="6" fill="#0284c7"
                                            stroke="#ffffff" stroke-width="2.5"
                                            class="transition-all group-hover/pt:r-8 group-hover/pt:fill-sky-400" />
                                    </g>
                                @endforeach
                            @endif
                        </svg>


                        <div class="flex justify-between items-center text-[10px] font-bold text-neutral-400 mt-2 px-1">
                            @foreach ($chartLabels as $label)
                                <span>{{ $label }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-neutral-200/80 p-6 shadow-xs">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                        <h3 class="text-sm font-black text-neutral-900">Detail Transaksi</h3>
                        <div class="flex items-center gap-2">
                            <div class="relative">
                                <input type="text" name="table_search" placeholder="Cari no. transaksi / kasir..."
                                    class="bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl pl-9 pr-3 py-2 outline-hidden focus:border-sky-500 focus:bg-white transition-all w-60">
                                <svg class="h-4 w-4 text-neutral-400 absolute left-3 top-2.5" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="border-b border-neutral-100 text-[10px] font-black text-neutral-400 uppercase tracking-wider">
                                    <th class="pb-3 pr-2">NO. TRANSAKSI</th>
                                    <th class="pb-3 px-2">TANGGAL</th>
                                    <th class="pb-3 px-2">KASIR</th>
                                    <th class="pb-3 px-2">METODE</th>
                                    <th class="pb-3 px-2">TOTAL</th>
                                    <th class="pb-3 px-2 text-center">ITEM</th>
                                    <th class="pb-3 pl-2 text-right">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-100 text-xs">
                                @if ($transactions->isEmpty())
                                    <tr>
                                        <td colspan="7" class="py-8 text-center text-neutral-400 font-medium">Belum ada
                                            data transaksi pada periode ini.</td>
                                    </tr>
                                @else
                                    @foreach ($transactions as $tx)
                                        @php
                                            $methodBg = match (strtolower($tx->payment_method)) {
                                                'qris' => 'bg-sky-50 text-sky-700 border-sky-200',
                                                default => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                            };
                                        @endphp
                                        <tr class="hover:bg-neutral-50/80 transition">
                                            <td class="py-3.5 pr-2 font-bold text-neutral-800">{{ $tx->transaction_code }}
                                            </td>
                                            <td class="py-3.5 px-2 text-neutral-500 font-medium">
                                                {{ $tx->created_at ? $tx->created_at->format('d M Y, H:i') : '-' }}</td>
                                            <td class="py-3.5 px-2 font-bold text-neutral-700">
                                                {{ $tx->user ? $tx->user->name : $tx->customer_name ?? 'Kasir' }}</td>
                                            <td class="py-3.5 px-2">
                                                <span
                                                    class="inline-block px-2.5 py-1 text-[10px] font-extrabold rounded-full border {{ $methodBg }}">
                                                    {{ strtoupper($tx->payment_method) }}
                                                </span>
                                            </td>
                                            <td class="py-3.5 px-2 font-black text-neutral-900">Rp
                                                {{ number_format($tx->total_price, 0, ',', '.') }}</td>
                                            <td class="py-3.5 px-2 text-center font-bold text-neutral-600">
                                                {{ $tx->items ? $tx->items->sum('quantity') : 1 }}</td>
                                            <td class="py-3.5 pl-2 text-right">
                                                <a href="{{ route('admin.history') }}?search={{ urlencode($tx->transaction_code) }}"
                                                    title="Lihat Detail di Halaman Transaksi"
                                                    class="h-8 w-8 rounded-lg border border-neutral-200 bg-white hover:bg-sky-50 text-sky-600 hover:border-sky-200 inline-flex items-center justify-center transition cursor-pointer active:scale-95">
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 pt-3 border-t border-neutral-100">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-2xl border border-neutral-200/80 p-6 shadow-xs">
                    <h3 class="text-sm font-black text-neutral-900 mb-6">Ringkasan Metode Pembayaran</h3>

                    @php
                        $qPct = $paymentBreakdown['qris']['percent'];
                        $tPct = $paymentBreakdown['tunai']['percent'];
                    @endphp

                    <div class="relative w-44 h-44 mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                            <circle cx="18" cy="18" r="15.915" fill="none" stroke="#e2e8f0"
                                stroke-width="3.8" />
                            <circle cx="18" cy="18" r="15.915" fill="none" stroke="#0284c7"
                                stroke-width="3.8" stroke-dasharray="{{ $qPct }} {{ 100 - $qPct }}"
                                stroke-dashoffset="0" />
                            @if ($tPct > 0)
                                <circle cx="18" cy="18" r="15.915" fill="none" stroke="#10b981"
                                    stroke-width="3.8" stroke-dasharray="{{ $tPct }} {{ 100 - $tPct }}"
                                    stroke-dashoffset="-{{ $qPct }}" />
                            @endif
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
                            <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-wider">TOTAL</span>
                            <strong class="text-xs font-black text-neutral-900 mt-0.5">Rp
                                {{ number_format($totalSales, 0, ',', '.') }}</strong>
                        </div>
                    </div>

                    <!-- Tunai & QRIS List -->
                    <div class="space-y-3 text-xs">
                        @foreach ($paymentBreakdown as $key => $item)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="h-2.5 w-2.5 rounded-full shrink-0"
                                        style="background-color: {{ $item['color'] }}"></span>
                                    <span class="font-bold text-neutral-700">{{ $item['label'] }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <strong class="font-black text-neutral-900">Rp
                                        {{ number_format($item['amount'], 0, ',', '.') }}</strong>
                                    <span
                                        class="text-[11px] font-extrabold text-neutral-400 w-8 text-right">{{ $item['percent'] }}%</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="pt-3 border-t border-neutral-100 flex items-center justify-between">
                            <span class="font-black text-neutral-800">Total</span>
                            <strong class="font-black text-sky-600 text-sm">Rp
                                {{ number_format($totalSales, 0, ',', '.') }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="export-report-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="fixed inset-0 bg-neutral-900/60 backdrop-blur-xs" onclick="closeExportReportModal()"></div>
        <div
            class="relative bg-white rounded-3xl border border-neutral-200 max-w-md w-full p-6 animate-in fade-in zoom-in-95 duration-200 shadow-xl z-10">
            <div class="flex items-center justify-between pb-3.5 border-b border-neutral-100 mb-4">
                <div>
                    <h3 class="text-sm font-black text-neutral-900">Ekspor Laporan</h3>
                    <p class="text-[11px] text-neutral-400 font-medium mt-0.5">Pilih format dan periode laporan yang ingin
                        diekspor.</p>
                </div>
                <button type="button" onclick="closeExportReportModal()"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer select-none">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="export-form" action="{{ route('admin.reports.export.excel') }}" method="GET" target="_blank">
                <div class="mb-4 space-y-2">
                    <label class="block text-[10px] font-extrabold text-neutral-400 uppercase tracking-wider">Format
                        File</label>
                    <div class="grid grid-cols-1 gap-2.5">
                        <label id="label-excel-opt"
                            class="flex items-center justify-between p-3.5 rounded-2xl border border-sky-500 bg-sky-50/40 cursor-pointer transition">
                            <div class="flex items-center gap-3">
                                <div
                                    class="h-9 w-9 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-black text-xs shrink-0 shadow-xs">
                                    XLS
                                </div>
                                <div>
                                    <span class="block text-xs font-black text-neutral-900">Excel (.xlsx)</span>
                                    <span class="block text-[10px] text-neutral-400 font-medium">Data siap diolah</span>
                                </div>
                            </div>
                            <input type="radio" name="export_type" value="excel" checked
                                onchange="updateExportFormat('excel')" class="accent-sky-500 h-4 w-4 cursor-pointer">
                        </label>

                        <!-- PDF Option -->
                        <label id="label-pdf-opt"
                            class="flex items-center justify-between p-3.5 rounded-2xl border border-neutral-200 bg-white hover:bg-neutral-50 cursor-pointer transition">
                            <div class="flex items-center gap-3">
                                <div
                                    class="h-9 w-9 rounded-xl bg-rose-500 text-white flex items-center justify-center font-black text-xs shrink-0 shadow-xs">
                                    PDF
                                </div>
                                <div>
                                    <span class="block text-xs font-black text-neutral-900">PDF (.pdf)</span>
                                    <span class="block text-[10px] text-neutral-400 font-medium">Siap cetak & arsip</span>
                                </div>
                            </div>
                            <input type="radio" name="export_type" value="pdf" onchange="updateExportFormat('pdf')"
                                class="accent-sky-500 h-4 w-4 cursor-pointer">
                        </label>
                    </div>
                </div>

                <!-- PERIODE LAPORAN (Functional Start Date & End Date) -->
                <div class="mb-4">
                    <label
                        class="block text-[10px] font-extrabold text-neutral-400 uppercase tracking-wider mb-1.5">Periode
                        Laporan</label>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <span class="block text-[9px] font-bold text-neutral-400 mb-0.5">Mulai</span>
                            <input type="date" name="start_date" value="{{ $startDate }}"
                                class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3 py-2 outline-hidden focus:border-sky-500 cursor-pointer">
                        </div>
                        <div>
                            <span class="block text-[9px] font-bold text-neutral-400 mb-0.5">Sampai</span>
                            <input type="date" name="end_date" value="{{ $endDate }}"
                                class="w-full bg-neutral-50 border border-neutral-200 text-xs font-bold text-neutral-800 rounded-xl px-3 py-2 outline-hidden focus:border-sky-500 cursor-pointer">
                        </div>
                    </div>
                </div>

                <!-- INCLUDE DATA (Functional Checkboxes) -->
                <div class="mb-6 space-y-2">
                    <label
                        class="block text-[10px] font-extrabold text-neutral-400 uppercase tracking-wider mb-1.5">Include
                        Data</label>
                    <label class="flex items-center gap-2 text-xs font-bold text-neutral-700 cursor-pointer">
                        <input type="checkbox" name="inc_ringkasan" value="1" checked
                            class="accent-sky-500 rounded h-4 w-4">
                        <span>Ringkasan Penjualan</span>
                    </label>
                    <label class="flex items-center gap-2 text-xs font-bold text-neutral-700 cursor-pointer">
                        <input type="checkbox" name="inc_detail" value="1" checked
                            class="accent-sky-500 rounded h-4 w-4">
                        <span>Detail Transaksi</span>
                    </label>
                    <label class="flex items-center gap-2 text-xs font-bold text-neutral-700 cursor-pointer">
                        <input type="checkbox" name="inc_metode" value="1" checked
                            class="accent-sky-500 rounded h-4 w-4">
                        <span>Metode Pembayaran</span>
                    </label>
                    <label class="flex items-center gap-2 text-xs font-bold text-neutral-700 cursor-pointer">
                        <input type="checkbox" name="inc_kasir" value="1" checked
                            class="accent-sky-500 rounded h-4 w-4">
                        <span>Data Kasir</span>
                    </label>
                </div>

                <!-- EKSPOR SEKARANG BUTTON -->
                <button type="submit" onclick="closeExportReportModal()"
                    class="w-full bg-sky-500 hover:bg-sky-600 text-white font-extrabold text-xs py-3 rounded-2xl transition flex items-center justify-center gap-2 shadow-xs active:scale-98 cursor-pointer select-none">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    Ekspor Sekarang
                </button>
            </form>
        </div>
    </div>

@endsection
