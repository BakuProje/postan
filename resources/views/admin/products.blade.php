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

        <!-- Header Page & Action Buttons (Gambar 1) -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 relative z-10">
            <div>
                <h2 class="text-2xl font-black text-neutral-900 tracking-tight">Inventaris Produk</h2>
                <p class="text-xs text-neutral-500 mt-1">Kelola data produk, kategori, stok, dan informasi lainnya.</p>
            </div>
            <div class="flex items-center gap-3">
                <!-- Import Produk (Placeholder Button, no action required) -->
                <button type="button" class="inline-flex items-center justify-center gap-2 rounded-xl border border-neutral-200 bg-white px-4 py-2.5 text-xs font-bold text-sky-600 transition hover:bg-neutral-50 hover:border-neutral-300 shadow-2xs cursor-pointer">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>
                    Import Produk
                </button>
                <!-- Tambah Produk Button -->
                <button type="button" onclick="openModal('create-product-modal');"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-sky-600 shadow-sm active:scale-98 cursor-pointer">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Produk
                </button>
            </div>
        </div>

        <!-- 4 Metric Cards (Gambar 1) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 relative z-10">
            <!-- TOTAL PRODUK -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 shadow-2xs flex items-center gap-4">
                <div class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center shrink-0 border border-blue-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25M9 7.5v9" />
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest block">TOTAL PRODUK</span>
                    <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">{{ $products->count() }}</h3>
                </div>
            </div>

            <!-- STOK TERSEDIA -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 shadow-2xs flex items-center gap-4">
                <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 border border-emerald-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25M9 7.5v9" />
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest block">STOK TERSEDIA</span>
                    <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">{{ number_format($products->where('stock', '>', 5)->sum('stock'), 0, ',', '.') }}</h3>
                    <span class="text-[11px] font-bold text-neutral-400 block mt-1.5">Produk siap dijual</span>
                </div>
            </div>

            <!-- STOK MENIPIS -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 shadow-2xs flex items-center gap-4">
                <div class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center shrink-0 border border-amber-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest block">STOK MENIPIS</span>
                    <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">{{ $products->where('stock', '>', 0)->where('stock', '<=', 5)->count() }}</h3>
                    <span class="text-[11px] font-bold text-neutral-400 block mt-1.5">Perlu restok</span>
                </div>
            </div>

            <!-- STOK HABIS -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 shadow-2xs flex items-center gap-4">
                <div class="h-12 w-12 rounded-2xl bg-rose-50 text-rose-500 flex items-center justify-center shrink-0 border border-rose-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.25 10.5a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Z" />
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest block">STOK HABIS</span>
                    <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">{{ $products->where('stock', 0)->count() }}</h3>
                    <span class="text-[11px] font-bold text-neutral-400 block mt-1.5">Segera restok</span>
                </div>
            </div>
        </div>

        <!-- Filter Bar (Gambar 2) -->
        <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-4 shadow-2xs relative z-10 flex flex-col md:flex-row items-center justify-between gap-3">
            <div class="relative flex-1 w-full">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-neutral-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input id="product-search-input" type="text" onkeyup="filterProductsTable()" placeholder="Cari produk (nama / barcode)..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-neutral-200 text-xs font-medium text-neutral-800 placeholder:text-neutral-400 focus:outline-none focus:border-sky-500 transition-colors">
            </div>
            <div class="flex items-center gap-2.5 w-full md:w-auto">
                <select id="product-category-filter" onchange="filterProductsTable()"
                    class="px-3.5 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-700 bg-white focus:outline-none focus:border-sky-500 transition-colors cursor-pointer w-full md:w-auto">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ strtolower($cat->name) }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                <select id="product-status-filter" onchange="filterProductsTable()"
                    class="px-3.5 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-700 bg-white focus:outline-none focus:border-sky-500 transition-colors cursor-pointer w-full md:w-auto">
                    <option value="">Status Stok</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="menipis">Menipis</option>
                    <option value="habis">Habis</option>
                </select>
                <button type="button" onclick="filterProductsTable()"
                    class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl border border-neutral-200 bg-white text-xs font-bold text-sky-600 hover:bg-neutral-50 transition cursor-pointer shrink-0">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                    Filter
                </button>
            </div>
        </div>

        <!-- Table View (Gambar 2) -->
        <div class="hidden md:block bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 shadow-2xs overflow-hidden relative z-10">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="text-neutral-400 border-b border-neutral-100 text-[11px] font-extrabold uppercase tracking-wider bg-neutral-50/50">
                            <th class="p-4 pl-6 font-bold">PRODUK</th>
                            <th class="p-4 font-bold">KATEGORI</th>
                            <th class="p-4 font-bold text-center">STOK</th>
                            <th class="p-4 font-bold">HARGA JUAL</th>
                            <th class="p-4 font-bold text-center">STATUS</th>
                            <th class="p-4 pr-6 font-bold text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="products-table-body" class="divide-y divide-neutral-100/70 text-neutral-600">
                        @forelse($products as $product)
                            @php
                                $statusKey = 'tersedia';
                                if ($product->stock == 0) {
                                    $statusKey = 'habis';
                                } elseif ($product->stock <= 5) {
                                    $statusKey = 'menipis';
                                }
                            @endphp
                            <tr class="product-row hover:bg-neutral-50/50 transition-colors"
                                data-name="{{ strtolower($product->name) }}"
                                data-sku="{{ strtolower($product->barcode ?? '') }}"
                                data-category="{{ strtolower($product->category->name) }}"
                                data-status="{{ $statusKey }}">
                                <td class="p-4 pl-6 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-xl overflow-hidden border border-neutral-200/80 shrink-0 aspect-square bg-neutral-50 flex items-center justify-center">
                                            @if ($product->photo)
                                                <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                            @else
                                                <span class="font-extrabold text-xs text-sky-600 uppercase">{{ substr($product->name, 0, 2) }}</span>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-bold text-neutral-900 text-xs leading-tight">{{ $product->name }}</p>
                                            @if (!empty($product->barcode))
                                                <p class="text-[10px] text-neutral-400 font-mono mt-0.5">{{ $product->barcode }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-xs font-semibold text-neutral-600">
                                    {{ $product->category->name }}
                                </td>
                                <td class="p-4 whitespace-nowrap text-center">
                                    <div class="inline-block bg-neutral-50 border border-neutral-100 rounded-xl px-3 py-1 text-center min-w-[64px]">
                                        <span class="block text-xs font-extrabold text-neutral-900 leading-tight">{{ number_format($product->stock, 0, ',', '.') }}</span>
                                        <span class="block text-[9px] font-bold text-neutral-400 uppercase tracking-wide">pcs</span>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap font-extrabold text-neutral-900 text-xs">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>
                                <td class="p-4 whitespace-nowrap text-center">
                                    @if ($product->stock == 0)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-500 border border-rose-100">
                                            Habis
                                        </span>
                                    @elseif ($product->stock <= 5)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-600 border border-amber-100">
                                            Menipis
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                            Tersedia
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 pr-6 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" onclick="openEditProductModal({{ json_encode($product) }})"
                                            class="h-8 w-8 inline-flex items-center justify-center rounded-lg border border-neutral-200 bg-white text-sky-600 hover:bg-sky-50 transition cursor-pointer">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        <form id="delete-form-{{ $product->id }}" method="POST" action="{{ route('admin.products.delete', $product->id) }}" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" onclick="confirmDelete(event, '{{ $product->name }}', 'delete-form-{{ $product->id }}')"
                                            class="h-8 w-8 inline-flex items-center justify-center rounded-lg border border-neutral-200 bg-white text-rose-500 hover:bg-rose-50 hover:text-rose-600 hover:border-rose-200 transition cursor-pointer">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-neutral-400 italic">
                                    Belum ada data produk terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mobile Cards View -->
        <div class="block md:hidden space-y-4">
            @forelse($products as $product)
                @php
                    $statusKey = 'tersedia';
                    if ($product->stock == 0) {
                        $statusKey = 'habis';
                    } elseif ($product->stock <= 5) {
                        $statusKey = 'menipis';
                    }
                @endphp
                <div class="product-row bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 shadow-2xs p-5 flex flex-col justify-between gap-4 relative z-10"
                    data-name="{{ strtolower($product->name) }}"
                    data-sku="{{ strtolower($product->barcode ?? '') }}"
                    data-category="{{ strtolower($product->category->name) }}"
                    data-status="{{ $statusKey }}">
                    <div class="flex items-center gap-4">
                        <div class="h-14 w-14 rounded-xl overflow-hidden border border-neutral-200/80 shrink-0 aspect-square bg-neutral-50 flex items-center justify-center">
                            @if ($product->photo)
                                <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                            @else
                                <span class="font-extrabold text-sm text-sky-600 uppercase">{{ substr($product->name, 0, 2) }}</span>
                            @endif
                        </div>
                        <div>
                            <p class="text-sm font-extrabold text-neutral-900">{{ $product->name }}</p>
                            @if (!empty($product->barcode))
                                <p class="text-[10px] text-neutral-400 font-mono mt-0.5">{{ $product->barcode }}</p>
                            @endif
                            <span class="inline-flex items-center rounded-md bg-neutral-100 px-2 py-0.5 text-[10px] font-bold text-neutral-700 border border-neutral-200 mt-1.5">
                                {{ $product->category->name }}
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3.5 border-t border-neutral-100 pt-3.5 text-xs text-neutral-600">
                        <div>
                            <span class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider block">Harga</span>
                            <span class="font-extrabold text-neutral-900 block mt-0.5">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <span class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider block">Stok</span>
                            <span class="font-extrabold text-neutral-900 block mt-0.5">{{ number_format($product->stock, 0, ',', '.') }} pcs</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-3 border-t border-neutral-100 pt-3.5">
                        <div>
                            @if ($product->stock == 0)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-500 border border-rose-100">
                                    Habis
                                </span>
                            @elseif ($product->stock <= 5)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 border border-amber-100">
                                    Menipis
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                    Tersedia
                                </span>
                            @endif
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="openEditProductModal({{ json_encode($product) }})"
                                class="px-3 py-1.5 rounded-lg bg-amber-50 text-xs font-bold text-amber-600 border border-amber-100 hover:bg-amber-100 transition cursor-pointer">
                                Ubah
                            </button>
                            <button type="button" onclick="confirmDelete(event, '{{ $product->name }}', 'delete-form-{{ $product->id }}')"
                                class="px-3 py-1.5 rounded-lg bg-rose-50 text-xs font-bold text-rose-600 border border-rose-100 hover:bg-rose-100 transition cursor-pointer">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl border border-neutral-200/60 p-8 text-center text-neutral-400 italic text-xs">
                    Belum ada data produk terdaftar.
                </div>
            @endforelse
        </div>
    </div>

    <!-- TAMBAH PRODUK MODAL -->
    <div id="create-product-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-lg w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-neutral-900">Tambah Produk Baru</h3>
                <button type="button" onclick="closeModal('create-product-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
                class="overflow-y-auto max-h-[78vh] p-6 space-y-6">
                @csrf

                <div class="flex flex-col items-center justify-center pb-5 border-b border-neutral-100">
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest mb-3">Foto Produk</span>
                    <div class="relative group cursor-pointer">
                        <input id="create_photo" name="photo" type="file" accept="image/*" class="hidden">
                        <label for="create_photo" class="cursor-pointer block relative">
                            <div
                                class="h-20 w-20 rounded-xl bg-gradient-to-tr from-neutral-50 to-neutral-100 border-2 border-neutral-200 flex items-center justify-center overflow-hidden transition duration-350 group-hover:scale-102 group-hover:border-sky-400 relative">
                                <img id="create-photo-preview" src="#" alt="Preview"
                                    class="hidden h-full w-full object-cover">
                                <svg id="create-photo-placeholder"
                                    class="h-8 w-8 text-neutral-300 transition group-hover:text-sky-500" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.008 1.24l.885 1.77a2.25 2.25 0 0 0 2.007 1.24h1.98a2.25 2.25 0 0 0 2.007-1.24l.885-1.77a2.25 2.25 0 0 1 2.007-1.24h3.86m-18 0h18" />
                                </svg>
                                <div
                                    class="absolute inset-0 bg-neutral-950/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition duration-300">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>
                    <span class="text-[9px] text-neutral-400 mt-2 font-medium">Ketuk untuk unggah foto produk.</span>
                    @error('photo')
                        @if (!old('edit_product_id'))
                            <p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="create_product_name" class="block text-xs font-bold text-neutral-700">Nama
                            Produk</label>
                        <input id="create_product_name" name="name" type="text"
                            value="{{ old('edit_product_id') ? '' : old('name') }}" required
                            placeholder="Contoh: Kopi Susu, Nasi Goreng"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        @error('name')
                            @if (!old('edit_product_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-neutral-700">Kategori</label>
                        <div class="relative">
                            <input type="hidden" name="category_id" id="create_product_category_input" required
                                value="{{ old('edit_product_id') ? '' : old('category_id') }}">
                            <button type="button" id="create-category-dropdown-btn" onclick="toggleCustomDropdown('create-category-dropdown')"
                                class="flex items-center justify-between w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs font-bold text-neutral-800 outline-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 cursor-pointer">
                                <span id="create-category-dropdown-label">Pilih Kategori</span>
                            </button>
                            
                            <!-- Custom Dropdown Popup -->
                            <div id="create-category-dropdown"
                                class="absolute z-50 w-full mt-2 bg-white/95 backdrop-blur-md border border-neutral-200/80 rounded-2xl shadow-xl py-2 scale-95 opacity-0 pointer-events-none transition-all duration-200 origin-top">
                                @foreach ($categories as $category)
                                    <button type="button" onclick="selectCustomCategory('create', {{ $category->id }}, '{{ $category->name }}')"
                                        class="flex items-center w-full px-4 py-2.5 text-xs text-neutral-700 font-bold hover:bg-sky-50 hover:text-sky-600 transition-all text-left cursor-pointer">
                                        {{ $category->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        @error('category_id')
                            @if (!old('edit_product_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="create_product_price" class="block text-xs font-bold text-neutral-700">Harga
                            (Rp)</label>
                        <input id="create_product_price" name="price" type="text"
                            value="{{ old('edit_product_id') ? '' : (old('price') ? number_format(old('price'), 0, ',', '.') : '') }}"
                            required placeholder="Contoh: 15.000"
                            class="price-format-input block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        @error('price')
                            @if (!old('edit_product_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="create_product_stock" class="block text-xs font-bold text-neutral-700">Stok</label>
                        <input id="create_product_stock" name="stock" type="number" min="0"
                            value="{{ old('edit_product_id') ? '' : old('stock') }}" required placeholder="Contoh: 100"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        @error('stock')
                            @if (!old('edit_product_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>
                </div>

                <div class="pt-6 border-t border-neutral-100 flex items-center justify-end">
                    <button type="submit"
                        class="w-full rounded-xl bg-sky-500 py-3.5 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 cursor-pointer">Simpan
                        Produk</button>
                </div>
            </form>
        </div>
    </div>

    <!-- UBAH PRODUK MODAL -->
    <div id="edit-product-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-lg w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-neutral-900">Ubah Produk</h3>
                <button type="button" onclick="closeModal('edit-product-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="edit-product-form" method="POST" action="" enctype="multipart/form-data"
                class="overflow-y-auto max-h-[78vh] p-6 space-y-6">
                @csrf
                @method('PUT')

                <input type="hidden" name="edit_product_id" id="edit_product_id_field" value="">

                <div class="flex flex-col items-center justify-center pb-5 border-b border-neutral-100">
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest mb-3">Foto Produk</span>
                    <div class="relative group cursor-pointer">
                        <input id="edit_photo" name="photo" type="file" accept="image/*" class="hidden">
                        <label for="edit_photo" class="cursor-pointer block relative">
                            <div
                                class="h-20 w-20 rounded-xl bg-gradient-to-tr from-neutral-50 to-neutral-100 border-2 border-neutral-200 flex items-center justify-center overflow-hidden transition duration-350 group-hover:scale-102 group-hover:border-sky-400 relative">
                                <img id="edit-photo-preview" src="#" alt="Preview"
                                    class="hidden h-full w-full object-cover">
                                <div id="edit-photo-placeholder"
                                    class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-bold text-sm uppercase">
                                </div>
                                <div
                                    class="absolute inset-0 bg-neutral-950/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition duration-300">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>
                    <span class="text-[9px] text-neutral-400 mt-2 font-medium">Ketuk untuk ubah foto produk.</span>
                    @error('photo')
                        @if (old('edit_product_id'))
                            <p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="edit_product_name" class="block text-xs font-bold text-neutral-700">Nama
                            Produk</label>
                        <input id="edit_product_name" name="name" type="text" required
                            placeholder="Contoh: Kopi Susu, Nasi Goreng"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        @error('name')
                            @if (old('edit_product_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-neutral-700">Kategori</label>
                        <div class="relative">
                            <input type="hidden" name="category_id" id="edit_product_category_input" required value="">
                            <button type="button" id="edit-category-dropdown-btn" onclick="toggleCustomDropdown('edit-category-dropdown')"
                                class="flex items-center justify-between w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs font-bold text-neutral-800 outline-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 cursor-pointer">
                                <span id="edit-category-dropdown-label">Pilih Kategori</span>
                            </button>
                            
                            <!-- Custom Dropdown Popup -->
                            <div id="edit-category-dropdown"
                                class="absolute z-50 w-full mt-2 bg-white/95 backdrop-blur-md border border-neutral-200/80 rounded-2xl shadow-xl py-2 scale-95 opacity-0 pointer-events-none transition-all duration-200 origin-top">
                                @foreach ($categories as $category)
                                    <button type="button" onclick="selectCustomCategory('edit', {{ $category->id }}, '{{ $category->name }}')"
                                        class="flex items-center w-full px-4 py-2.5 text-xs text-neutral-700 font-bold hover:bg-sky-50 hover:text-sky-600 transition-all text-left cursor-pointer">
                                        {{ $category->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        @error('category_id')
                            @if (old('edit_product_id'))
                               <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="edit_product_price" class="block text-xs font-bold text-neutral-700">Harga
                            (Rp)</label>
                        <input id="edit_product_price" name="price" type="text" required
                            placeholder="Contoh: 15.000"
                            class="price-format-input block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        @error('price')
                            @if (old('edit_product_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="edit_product_stock" class="block text-xs font-bold text-neutral-700">Stok</label>
                        <input id="edit_product_stock" name="stock" type="number" min="0" required
                            placeholder="Contoh: 100"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        @error('stock')
                            @if (old('edit_product_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>
                </div>

                <div class="pt-6 border-t border-neutral-100 flex items-center justify-end">
                    <button type="submit"
                        class="w-full rounded-xl bg-sky-500 py-3.5 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 cursor-pointer">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- HAPUS (DELETE MODAL) -->
    <div id="delete-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div id="delete-modal-card"
            class="bg-white rounded-2xl p-6 max-w-sm w-full border border-neutral-100 scale-95 opacity-0 transition-all duration-200 flex flex-col items-center text-center space-y-4">
            <div
                class="h-12 w-12 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center border border-rose-100 animate-pulse">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </div>

            <div class="space-y-1.5">
                <h3 class="text-sm font-extrabold text-neutral-900 tracking-tight">Hapus Produk?</h3>
                <p class="text-[11px] text-neutral-500 leading-relaxed px-1">Apakah Anda yakin ingin menghapus produk
                    <strong id="delete-modal-name" class="text-neutral-800 font-bold"></strong>? Tindakan ini tidak dapat
                    dibatalkan.</p>
            </div>

            <div class="flex items-center gap-3 w-full pt-2">
                <button type="button" id="delete-modal-cancel"
                    class="flex-1 px-4 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition active:scale-98 cursor-pointer">Batal</button>
                <button type="button" id="delete-modal-confirm"
                    class="flex-1 px-4 py-2.5 rounded-xl bg-rose-500 text-xs font-bold text-white hover:bg-rose-600 transition active:scale-98 cursor-pointer">Hapus</button>
            </div>
        </div>
    </div>

    <div id="products-page-data" data-has-errors="{{ $errors->any() ? 'true' : 'false' }}"
        data-old-edit-product-id="{{ old('edit_product_id') }}" data-old-name="{{ old('name') }}"
        data-old-price="{{ old('price') }}" data-old-stock="{{ old('stock') }}"
        data-old-category-id="{{ old('category_id') }}"
        data-session-open-create-modal="{{ session('open_create_modal') ? 'true' : 'false' }}"
        data-session-open-edit-modal-id="{{ session('open_edit_modal_id') }}"
        data-products-json="{{ json_encode($products) }}" class="hidden">
    </div>

    <script>
        function filterProductsTable() {
            const searchVal = (document.getElementById('product-search-input')?.value || '').toLowerCase().trim();
            const categoryVal = (document.getElementById('product-category-filter')?.value || '').toLowerCase();
            const statusVal = (document.getElementById('product-status-filter')?.value || '').toLowerCase();
            
            const rows = document.querySelectorAll('.product-row');
            rows.forEach(row => {
                const name = row.getAttribute('data-name') || '';
                const sku = row.getAttribute('data-sku') || '';
                const category = row.getAttribute('data-category') || '';
                const status = row.getAttribute('data-status') || '';

                const matchesSearch = !searchVal || name.includes(searchVal) || sku.includes(searchVal);
                const matchesCategory = !categoryVal || category === categoryVal;
                const matchesStatus = !statusVal || status === statusVal;

                if (matchesSearch && matchesCategory && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
@endsection
