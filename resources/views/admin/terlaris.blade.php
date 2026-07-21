@extends('layouts.admin')
@section('title', '')
@section('konten')
    <div class="space-y-6 relative">
        <div
            class="absolute -top-10 -right-6 -z-10 h-28 w-28 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-200/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.06)] pointer-events-none">
        </div>
        <div
            class="absolute -bottom-8 -left-10 -z-10 h-32 w-32 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-100/10 border border-white/40 shadow-[inset_5px_5px_14px_rgba(255,255,255,0.8),inset_-5px_-5px_14px_rgba(14,165,233,0.08)] pointer-events-none">
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 relative z-20">
            <div>
                <h2 class="text-2xl font-black text-neutral-900 tracking-tight">Produk Terlaris</h2>
                <p class="text-xs text-neutral-500 mt-1">Lihat produk yang paling banyak terjual dalam periode tertentu.</p>
            </div>
            <div class="relative z-30" id="export-dropdown-container">
                <button type="button" onclick="toggleExportMenu(event)"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-sky-600 active:scale-98 cursor-pointer select-none">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    Export Laporan
                    <svg class="h-3.5 w-3.5 ml-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
                <div id="export-menu"
                    class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl border border-neutral-200 p-1.5 z-30 shadow-lg">
                    <a href="{{ route('admin.dashboard.terlaris.export.pdf') }}" target="_blank"
                        class="flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-neutral-700 hover:bg-rose-50 hover:text-rose-600 rounded-lg transition">
                        <svg class="h-4 w-4 text-rose-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        Export PDF
                    </a>
                    <a href="{{ route('admin.dashboard.terlaris.export.excel') }}"
                        class="flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-neutral-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition">
                        <svg class="h-4 w-4 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.375 19.5h17.25m-17.25-3h17.25M3.375 12h17.25m-17.25-3h17.25M3.375 4.5h17.25" />
                        </svg>
                        Export Excel (.csv)
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 relative z-10">
            <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center shrink-0 border border-blue-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-neutral-500 capitalize tracking-wide">Total Produk Terlaris</p>
                    <h3 class="text-xl font-black text-neutral-900 mt-0.5">{{ $totalTerlarisCount }} <span
                            class="text-xs font-semibold text-neutral-500">Produk</span></h3>
                </div>
            </div>

            <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 border border-emerald-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 0 5.814-5.518l2.74-1.22m0 0-3.976-4.043m3.976 4.043-4.043 3.976" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-neutral-500 capitalize tracking-wide">Total Terjual</p>
                    <h3 class="text-xl font-black text-neutral-900 mt-0.5">
                        {{ number_format($totalItemsSoldAll, 0, ',', '.') }} <span
                            class="text-xs font-semibold text-neutral-500">Item</span></h3>
                </div>
            </div>

            <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center shrink-0 border border-amber-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-neutral-500 capitalize tracking-wide">Total Pendapatan</p>
                    <h3 class="text-xl font-black text-neutral-900 mt-0.5">Rp
                        {{ number_format($totalRevenueAll, 0, ',', '.') }}</h3>
                </div>
            </div>

            <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center shrink-0 border border-purple-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-neutral-500 capitalize tracking-wide">Rata-rata Harga</p>
                    <h3 class="text-xl font-black text-neutral-900 mt-0.5">Rp {{ number_format($avgPrice, 0, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>

        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 bg-white/90 backdrop-blur-md p-3.5 rounded-2xl border border-neutral-200/80 relative z-10">
            <div class="flex flex-wrap items-center gap-3">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-neutral-400 pointer-events-none">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </span>
                    <input type="text" value="13 Juli 2026 - 20 Juli 2026" readonly
                        class="pl-9 pr-8 py-2 rounded-xl border border-neutral-200 bg-neutral-50/50 text-xs font-semibold text-neutral-700 outline-none focus:border-sky-500 cursor-pointer">
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2.5 text-neutral-400 pointer-events-none">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </div>

                <div class="relative">
                    <select id="category-filter"
                        class="appearance-none pl-4 pr-9 py-2 rounded-xl border border-neutral-200 bg-neutral-50/50 text-xs font-semibold text-neutral-700 outline-none focus:border-sky-500 cursor-pointer">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $cat)
                            <option value="{{ strtolower($cat->name) }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-neutral-400 pointer-events-none">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </div>
            </div>

            <div>
                <button type="button"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-sky-200 bg-sky-50 text-xs font-bold text-sky-700 hover:bg-sky-100 transition cursor-pointer">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                    Filter
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 relative z-10">
            <div class="lg:col-span-8 bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-6">
                <div class="mb-5 flex items-center justify-between">
                    <h3 class="text-sm font-bold text-neutral-900">Daftar Produk Terlaris</h3>
                    <span class="text-[11px] font-semibold text-neutral-400">Total: {{ count($products) }} item</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="border-b border-neutral-100 text-[11px] font-bold text-neutral-500 capitalize tracking-wide">
                                <th class="pb-3 pl-2 w-8">#</th>
                                <th class="pb-3 min-w-[180px]">Produk</th>
                                <th class="pb-3">Kategori</th>
                                <th class="pb-3">Terjual (Item)</th>
                                <th class="pb-3">Total Pendapatan</th>
                                <th class="pb-3 pr-2 min-w-[130px]">Persentase</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-100 text-xs">
                            @forelse ($products as $index => $item)
                                <tr class="hover:bg-neutral-50/50 transition">
                                    <td class="py-3.5 pl-2 font-black text-neutral-900">{{ $index + 1 }}</td>
                                    <td class="py-3.5">
                                        <div class="flex items-center gap-3">
                                            @if (!empty($item['photo']))
                                                <img src="/{{ $item['photo'] }}" alt="{{ $item['name'] }}"
                                                    class="h-9 w-9 rounded-lg object-cover border border-neutral-200">
                                            @else
                                                <div
                                                    class="h-9 w-9 rounded-lg bg-sky-100 text-sky-600 font-bold flex items-center justify-center text-xs shrink-0 border border-sky-200/50">
                                                    {{ strtoupper(substr($item['name'], 0, 2)) }}
                                                </div>
                                            @endif
                                            <div>
                                                <h4 class="font-bold text-neutral-900 leading-snug">{{ $item['name'] }}
                                                </h4>
                                                @if (!empty($item['barcode']))
                                                    <p class="text-[10px] text-neutral-400 font-mono mt-0.5">
                                                        {{ $item['barcode'] }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3.5">
                                        @if (strtolower($item['category']) === 'minuman')
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-[10px] font-bold bg-sky-50 text-sky-600 border border-sky-100">
                                                Minuman
                                            </span>
                                        @elseif(strtolower($item['category']) === 'makanan')
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                                Makanan
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-[10px] font-bold bg-purple-50 text-purple-600 border border-purple-100">
                                                {{ $item['category'] }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3.5">
                                        <span
                                            class="font-black text-neutral-900">{{ number_format($item['sold_qty'], 0, ',', '.') }}</span>
                                        <span class="text-[10px] text-neutral-400 font-medium">pcs</span>
                                    </td>
                                    <td class="py-3.5 font-extrabold text-neutral-800">
                                        Rp {{ number_format($item['total_revenue'], 0, ',', '.') }}
                                    </td>
                                    <td class="py-3.5 pr-2">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="font-extrabold text-neutral-800 text-[11px] w-12">{{ $item['percentage'] }}%</span>
                                            <div class="flex-1 h-1.5 rounded-full bg-neutral-100 overflow-hidden">
                                                <div class="h-full bg-sky-500 rounded-full"
                                                    style="width: {{ min(100, $item['percentage'] * 4) }}%"></div>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div class="h-14 w-14 rounded-2xl bg-neutral-50 flex items-center justify-center border border-neutral-200/50">
                                                <svg class="h-7 w-7 text-neutral-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                </svg>
                                            </div>
                                            <p class="text-xs font-bold text-neutral-400">Belum ada produk di database.</p>
                                            <p class="text-[11px] text-neutral-400">Tambahkan produk terlebih dahulu melalui menu Inventory.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-6">
                    <h3 class="text-sm font-bold text-neutral-900 mb-5">Top 5 Produk Terlaris</h3>

                    <div class="flex items-center justify-center my-4">
                        <div class="relative h-44 w-44">
                            <svg class="h-full w-full -rotate-90" viewBox="0 0 36 36">
                                <path class="text-neutral-100" stroke-width="4.5" stroke="currentColor" fill="none"
                                    d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                @php
                                    $offset = 0;
                                    $svgColors = [
                                        'text-sky-500',
                                        'text-emerald-400',
                                        'text-amber-400',
                                        'text-purple-500',
                                        'text-rose-500',
                                    ];
                                @endphp
                                @foreach ($top5Products as $idx => $tItem)
                                    <path class="{{ $svgColors[$idx % count($svgColors)] }}"
                                        stroke-dasharray="{{ $tItem['percentage'] }}, 100"
                                        stroke-dashoffset="-{{ $offset }}" stroke-width="4.5"
                                        stroke-linecap="round" stroke="currentColor" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    @php $offset += $tItem['percentage']; @endphp
                                @endforeach
                            </svg>
                        </div>
                    </div>

                    <div class="space-y-2.5 text-xs font-semibold pt-2">
                        @php
                            $colors = ['bg-sky-500', 'bg-emerald-400', 'bg-amber-400', 'bg-purple-500', 'bg-rose-500'];
                        @endphp
                        @foreach ($top5Products as $idx => $topItem)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="h-3 w-3 rounded-full {{ $colors[$idx % count($colors)] }}"></span>
                                    <span class="text-neutral-700 truncate max-w-[140px]">{{ $topItem['name'] }}</span>
                                </div>
                                <span class="text-neutral-900 font-bold">{{ $topItem['percentage'] }}%</span>
                            </div>
                        @endforeach
                        @if ($othersPercentage > 0)
                            <div
                                class="flex items-center justify-between text-neutral-400 pt-1 border-t border-neutral-100">
                                <div class="flex items-center gap-2">
                                    <span class="h-3 w-3 rounded-full bg-neutral-300"></span>
                                    <span>Lainnya</span>
                                </div>
                                <span class="font-bold">{{ $othersPercentage }}%</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
