@extends('layouts.admin')
@section('title', 'Transaksi')
@section('konten')
    <div class="pos-page h-full flex flex-col space-y-4">
        <div class="flex md:hidden bg-neutral-200/60 p-1.5 rounded-xl gap-1 shrink-0">
            <button type="button" id="tab-products-btn"
                class="flex-1 py-3 text-center text-xs font-black text-neutral-700 bg-white rounded-lg shadow-sm border border-neutral-250 transition">
                Daftar Produk
            </button>
            <button type="button" id="tab-cart-btn"
                class="flex-1 py-3 text-center text-xs font-black text-neutral-500 hover:text-neutral-700 transition relative">
                Keranjang
                <span id="cart-badge"
                    class="absolute top-1/2 -translate-y-1/2 right-4 bg-sky-500 text-white text-[10px] font-black h-5 px-2 rounded-full flex items-center justify-center hidden">0</span>
            </button>
        </div>
        <div class="flex-1 grid grid-cols-1 md:grid-cols-12 gap-6 min-h-0">
            <div id="sector-products" class="md:col-span-7 lg:col-span-8 flex flex-col min-h-0 space-y-4">
                <div
                    class="bg-white/40 backdrop-blur-md rounded-2xl border border-white/30 p-4 sm:p-5 space-y-4 shrink-0 shadow-xs">
                    <div class="relative">
                        <input type="text" id="pos-search" placeholder="Cari produk jualan..."
                            class="block w-full rounded-xl border border-neutral-200 bg-white/50 pl-12 pr-4 py-3.5 text-sm outline-none transition focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 placeholder:text-neutral-400">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-neutral-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                    </div>
                    <div class="flex items-center gap-2 overflow-x-auto pb-1 no-scrollbar scroll-smooth">
                        <button type="button" data-category-id="all"
                            class="pos-category-btn shrink-0 rounded-lg px-3 py-1.5 text-[10px] font-extrabold border border-sky-150 bg-sky-50 text-sky-600 transition">
                            Semua Kategori
                        </button>
                        @foreach ($categories as $cat)
                            <button type="button" data-category-id="{{ $cat->id }}"
                                class="pos-category-btn shrink-0 rounded-lg px-3 py-1.5 text-[10px] font-bold border border-neutral-200/80 bg-white text-neutral-600 transition hover:bg-neutral-50 hover:text-neutral-800">
                                {{ $cat->name }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-2">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4" id="pos-products-grid">
                        @foreach ($products as $prod)
                            <div class="pos-product-card bg-white rounded-2xl border border-neutral-200/80 overflow-hidden flex flex-col justify-between hover:border-sky-400 shadow-[0_4px_20px_rgba(0,0,0,0.015)] hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:scale-[1.02] transition-all duration-300 cursor-pointer"
                                data-id="{{ $prod->id }}" data-name="{{ $prod->name }}"
                                data-price="{{ $prod->price }}" data-stock="{{ $prod->stock }}"
                                data-category-id="{{ $prod->category_id }}"
                                data-photo="{{ $prod->photo ? asset($prod->photo) : '' }}" onclick="addProductToCart(this)">
                                <div
                                    class="aspect-square w-full overflow-hidden bg-neutral-50 relative border-b border-neutral-100 flex items-center justify-center shrink-0 rounded-t-2xl">
                                    @if ($prod->photo)
                                        <img src="{{ asset($prod->photo) }}" alt="{{ $prod->name }}"
                                            class="h-full w-full object-cover">
                                    @else
                                        <div
                                            class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-black text-2xl uppercase select-none">
                                            {{ substr($prod->name, 0, 2) }}
                                        </div>
                                    @endif
                                    @if ($prod->stock <= 0)
                                        <div
                                            class="absolute inset-0 bg-neutral-900/60 backdrop-blur-[1px] flex items-center justify-center">
                                            <span
                                                class="bg-rose-600 text-white font-extrabold text-[10px] px-3 py-1 rounded shadow-sm tracking-wider uppercase">Habis</span>
                                        </div>
                                    @elseif($prod->stock <= 5)
                                        <span
                                            class="absolute top-2 right-2 bg-amber-500 text-white font-bold text-[9px] px-2 py-0.5 rounded shadow-sm">Stok
                                            {{ $prod->stock }}</span>
                                    @endif
                                </div>
                                <div class="p-4 flex-1 flex flex-col justify-between">
                                    <div>
                                        <span
                                            class="text-[10px] font-bold text-neutral-400 block uppercase tracking-wider">{{ $prod->category->name }}</span>
                                        <p class="text-sm font-black text-neutral-900 line-clamp-2 mt-1 leading-snug">
                                            {{ $prod->name }}</p>
                                    </div>
                                    <div class="mt-4 pt-3 border-t border-neutral-100 flex items-center justify-between">
                                        <span class="text-sm font-black text-sky-600">Rp
                                            {{ number_format($prod->price, 0, ',', '.') }}</span>
                                        <div
                                            class="h-6 w-6 bg-sky-50 hover:bg-sky-100 text-sky-600 border border-sky-100 rounded flex items-center justify-center transition">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="pos-empty-state"
                        class="hidden py-16 flex flex-col items-center justify-center text-center space-y-3 bg-white/40 backdrop-blur-md rounded-2xl border border-white/30">
                        <svg class="h-10 w-10 text-neutral-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0z" />
                        </svg>
                        <p class="text-xs text-neutral-400 italic">Produk yang Anda cari tidak ditemukan.</p>
                    </div>
                </div>
            </div>

            <div id="sector-cart"
                class="hidden md:flex md:col-span-5 lg:col-span-4 flex-col min-h-0 bg-white/80 backdrop-blur-lg rounded-2xl border border-white/40 shadow-md overflow-hidden relative">
                <div
                    class="absolute -bottom-10 -right-10 h-32 w-32 rounded-full bg-gradient-to-br from-white/70 via-sky-100/20 to-sky-200/10 border border-white/30 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.06)] pointer-events-none">
                </div>

                <div
                    class="px-5 py-4 bg-neutral-50/50 border-b border-neutral-100 flex items-center justify-between shrink-0 relative z-10">
                    <span class="text-sm font-black text-neutral-900 flex items-center gap-2">
                        <svg class="h-4.5 w-4.5 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0z" />
                        </svg>
                        Keranjang
                    </span>
                    <button type="button" onclick="clearCart()"
                        class="text-xs font-bold text-neutral-400 hover:text-rose-500 transition cursor-pointer">Kosongkan</button>
                </div>

                <div class="flex-1 overflow-y-auto p-5 space-y-4 relative z-10" id="cart-items-container">
                    <div id="cart-empty-placeholder"
                        class="h-full flex flex-col items-center justify-center text-center space-y-3 py-20">
                        <div
                            class="h-14 w-14 rounded-full bg-neutral-50 text-neutral-400 flex items-center justify-center border border-neutral-100 shadow-xs">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0z" />
                            </svg>
                        </div>
                        <p class="text-xs text-neutral-400 leading-relaxed px-4">Pilih produk di sebelah kiri untuk
                            ditambahkan ke keranjang belanja.</p>
                    </div>
                </div>

                <div class="p-5 border-t border-neutral-100 bg-neutral-50/40 space-y-5 shrink-0 relative z-10">
                    <div class="space-y-2.5 text-sm">
                        <div class="flex items-center justify-between text-neutral-500">
                            <span>Total Barang</span>
                            <span id="total-qty-label" class="font-bold">0 Item</span>
                        </div>
                        <div
                            class="flex items-center justify-between text-neutral-900 border-t border-neutral-100 pt-3 text-base">
                            <span class="font-bold">Total Harga</span>
                            <span id="total-price-label" class="font-black text-sky-600 text-xl">Rp 0</span>
                        </div>
                    </div>

                    <button type="button" id="btn-open-payment-modal" onclick="openPaymentModal()" disabled
                        class="w-full rounded-xl py-4 text-sm font-bold text-neutral-400 bg-neutral-150 border border-neutral-250 pointer-events-none transition duration-200 flex items-center justify-center gap-2 shadow-sm">
                        Pilih Metode Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="payment-method-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-md w-full border border-neutral-250/80 shadow-2xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4.5 border-b border-neutral-100 flex items-center justify-between bg-neutral-50/50">
                <h3 class="text-sm font-extrabold text-neutral-900">Metode Pembayaran</h3>
                <button type="button" onclick="closeModal('payment-method-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-6 space-y-6">
                <div class="text-center bg-sky-50/30 rounded-xl p-4.5 border border-sky-100/50">
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest block">Total
                        Tagihan</span>
                    <span id="payment-modal-total-label" class="text-2xl font-black text-sky-600 mt-1 block">Rp 0</span>
                </div>
                <div class="grid grid-cols-2 gap-3.5">
                    <button type="button" id="pay-select-cash-btn" onclick="selectPaymentMethod('cash')"
                        class="flex flex-col items-center justify-center p-4 rounded-xl border-2 border-sky-500 bg-sky-50/50 text-sky-600 font-extrabold transition cursor-pointer">
                        <img src="{{ asset('cash.png') }}" class="h-10 w-auto mb-1.5" alt="Cash Logo">
                        <span class="text-xs font-bold text-neutral-700">Cash</span>
                    </button>

                    <button type="button" id="pay-select-qris-btn" onclick="selectPaymentMethod('qris')"
                        class="flex flex-col items-center justify-center p-4 rounded-xl border border-neutral-200 hover:border-sky-400 hover:bg-neutral-50/40 text-neutral-500 font-extrabold transition cursor-pointer">
                        <img src="{{ asset('qris.png') }}" class="h-10 w-auto mb-1.5" alt="QRIS Logo">
                        <span class="text-xs font-bold text-neutral-700">QRIS</span>
                    </button>
                </div>

                <div id="payment-cash-panel" class="space-y-4">
                    <div class="space-y-2">
                        <label for="pos-paid-input"
                            class="block text-[10px] font-bold text-neutral-500 uppercase tracking-widest">Uang Diterima
                            (Rp)</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-bold text-neutral-400 select-none">Rp</span>
                            <input type="text" id="pos-paid-input-formatted" placeholder="0"
                                class="block w-full rounded-xl border border-neutral-250 bg-white pl-10 pr-4 py-3.5 text-sm font-black outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100/50">
                            <input type="hidden" id="pos-paid-input" value="0">
                        </div>
                        <div class="grid grid-cols-3 gap-2" id="quick-cash-container">
                            <button type="button" onclick="setQuickCash('pas')"
                                class="py-2.5 text-[10px] font-bold border border-neutral-200 rounded-lg hover:border-sky-400 hover:text-sky-600 bg-white transition active:scale-95 cursor-pointer">Pas</button>
                            <button type="button" onclick="setQuickCash(10000)"
                                class="py-2.5 text-[10px] font-bold border border-neutral-200 rounded-lg hover:border-sky-400 hover:text-sky-600 bg-white transition active:scale-95 cursor-pointer">10.000</button>
                            <button type="button" onclick="setQuickCash(20000)"
                                class="py-2.5 text-[10px] font-bold border border-neutral-200 rounded-lg hover:border-sky-400 hover:text-sky-600 bg-white transition active:scale-95 cursor-pointer">20.000</button>
                            <button type="button" onclick="setQuickCash(50000)"
                                class="py-2.5 text-[10px] font-bold border border-neutral-200 rounded-lg hover:border-sky-400 hover:text-sky-600 bg-white transition active:scale-95 cursor-pointer">50.000</button>
                            <button type="button" onclick="setQuickCash(100000)"
                                class="py-2.5 text-[10px] font-bold border border-neutral-200 rounded-lg hover:border-sky-400 hover:text-sky-600 bg-white transition active:scale-95 cursor-pointer">100.000</button>
                            <button type="button" onclick="setQuickCash(200000)"
                                class="py-2.5 text-[10px] font-bold border border-neutral-200 rounded-lg hover:border-sky-400 hover:text-sky-600 bg-white transition active:scale-95 cursor-pointer">200.000</button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-xs sm:text-sm border-t border-neutral-100 pt-3.5">
                        <span class="text-neutral-500 font-bold">Uang Kembalian</span>
                        <span id="change-label" class="font-extrabold text-neutral-800 text-base">Rp 0</span>
                    </div>
                </div>

                <div id="payment-qris-panel"
                    class="hidden flex flex-col items-center justify-center py-6 bg-sky-50/20 rounded-2xl border border-sky-100/50 text-center px-6">
                    <span class="text-xs font-black text-sky-600 tracking-wider block uppercase">QRIS Terdeteksi</span>
                    <p class="text-xs text-neutral-500 mt-2 leading-relaxed font-semibold">Pembayaran non-tunai via QRIS
                        diproses otomatis menggunakan nominal tagihan pas sebesar <span id="qris-auto-price-label"
                            class="text-sky-600 font-extrabold"></span> tanpa perlu menginput uang diterima.</p>
                </div>
            </div>

            <div class="px-6 py-4.5 border-t border-neutral-100 bg-neutral-50 flex">
                <button type="button" id="btn-checkout" onclick="checkoutTransaction()" disabled
                    class="w-full rounded-xl py-3.5 text-xs font-bold text-white bg-sky-500 opacity-50 pointer-events-none transition duration-200 flex items-center justify-center gap-1.5 shadow-sm">
                    Selesaikan Transaksi
                </button>
            </div>
        </div>
    </div>

    <div id="receipt-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/60 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-sm w-full border border-neutral-100 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col relative">
            <!-- Close Button X in Top Right -->
            <button type="button" onclick="closeReceiptModal()"
                class="absolute top-4 right-4 text-neutral-400 hover:text-neutral-600 transition cursor-pointer z-10">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div id="print-area" class="p-6 bg-white overflow-y-auto max-h-[70vh] space-y-4">
                <div class="text-center space-y-1">
                    @if($outlet && $outlet->logo)
                        <img src="{{ asset($outlet->logo) }}" class="h-10 w-auto mx-auto mb-1.5 object-contain" alt="Logo Outlet">
                    @endif
                    <h3 class="text-base font-black tracking-widest text-neutral-900">{{ $outlet->name ?? 'POSTAN' }}</h3>
                    <p class="text-[9px] text-neutral-400">{{ $outlet->address ?? 'Jl. Pembangunan No. 4, Jakarta' }}</p>
                </div>

                <div class="border-b border-dashed border-neutral-300 my-2"></div>

                <div class="text-[10px] text-neutral-600 space-y-1">
                    <span id="receipt-code" class="hidden" style="display: none !important;">TX-XXXXXXXX-XXXX</span>
                    <div class="flex justify-between">
                        <span>Tanggal:</span>
                        <span id="receipt-date">--/--/---- --:--</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Kasir:</span>
                        <span id="receipt-cashier">--</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Metode:</span>
                        <span id="receipt-payment-method" class="font-bold uppercase">--</span>
                    </div>
                </div>

                <div class="border-b border-dashed border-neutral-300 my-2"></div>

                <div class="space-y-2" id="receipt-items-list">
                </div>

                <div class="border-b border-dashed border-neutral-300 my-2"></div>

                <div class="text-[10px] text-neutral-700 space-y-1.5 font-medium">
                    <div class="flex justify-between text-neutral-900 font-bold">
                        <span>Total Belanja:</span>
                        <span id="receipt-total">Rp 0</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Bayar:</span>
                        <span id="receipt-paid">Rp 0</span>
                    </div>
                    <div class="flex justify-between text-neutral-800 font-bold">
                        <span>Kembalian:</span>
                        <span id="receipt-change">Rp 0</span>
                    </div>
                </div>

                <div class="border-b border-dashed border-neutral-300 my-2"></div>

                <div class="text-center text-[9px] text-neutral-400 py-1">
                    Terima kasih atas kunjungan Anda!<br>Semoga harimu menyenangkan.
                </div>
            </div>

            <div class="px-6 py-4 bg-neutral-50 border-t border-neutral-100 shrink-0">
                <button type="button" onclick="printReceipt()"
                    class="w-full rounded-xl bg-neutral-900 py-3.5 text-xs font-bold text-white transition hover:bg-neutral-850 hover:shadow-lg active:scale-98 flex items-center justify-center gap-1.5 cursor-pointer">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.72 13.82l-.24-2.22H3a1.5 1.5 0 01-1.5-1.5V5.25a3 3 0 013-3h15a3 3 0 013 3v4.85a1.5 1.5 0 01-1.5 1.5h-3.48l-.24 2.22m-11.28 0h11.28m-11.28 0v6.78a2.25 2.25 0 002.25 2.25h6.78a2.25 2.25 0 002.25-2.25v-6.78M9 5.25h6" />
                    </svg>
                    Cetak Struk
                </button>
            </div>
        </div>
    </div>
@endsection
