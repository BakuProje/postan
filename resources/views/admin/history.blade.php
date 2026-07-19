@extends('layouts.admin')

@section('title', 'Riwayat Transaksi')

@section('konten')
    <div class="w-full space-y-6 pb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-xl font-black text-neutral-900 tracking-tight">Riwayat Transaksi</h2>
                <p class="text-xs text-neutral-400 font-medium">Daftar seluruh riwayat transaksi penjualan kasir.</p>
            </div>
            <form action="{{ route('admin.history') }}" method="GET" class="w-full sm:w-80">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari invoice, kasir, atau pelanggan..."
                        class="block w-full rounded-xl border border-neutral-200 bg-white/50 pl-10 pr-4 py-2.5 text-xs outline-none transition focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 placeholder:text-neutral-400">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    @if (request('search'))
                        <a href="{{ route('admin.history') }}"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-neutral-400 hover:text-neutral-600">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- TABLE SECTION -->
        <div
            class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="border-b border-neutral-100 text-[10px] font-bold text-neutral-400 uppercase tracking-widest bg-neutral-50/50">
                            <th class="py-4 px-6 text-center w-12">NO</th>
                            <th class="py-4 px-4">KODE INVOICE</th>
                            <th class="py-4 px-4">KASIR</th>
                            <th class="py-4 px-4">CUSTOMER</th>
                            <th class="py-4 px-4">WAKTU TRANSAKSI</th>
                            <th class="py-4 px-4">METODE</th>
                            <th class="py-4 px-4 text-right">TOTAL HARGA</th>
                            <th class="py-4 px-6 text-center w-24">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100 text-xs text-neutral-700">
                        @forelse($transactions as $index => $tx)
                            <tr class="hover:bg-neutral-50/30 transition group">
                                <td class="py-4 px-6 text-center text-neutral-400 font-medium">
                                    {{ ($transactions->currentPage() - 1) * $transactions->perPage() + $index + 1 }}
                                </td>
                                <td class="py-4 px-4 font-bold text-neutral-900 group-hover:text-sky-600 transition">
                                    {{ $tx->transaction_code }}
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-2.5">
                                        <div
                                            class="h-7 w-7 rounded-full overflow-hidden border border-neutral-200 bg-neutral-100 shrink-0">
                                            @if ($tx->user->profile_picture)
                                                <img src="{{ asset($tx->user->profile_picture) }}"
                                                    alt="{{ $tx->user->name }}" class="h-full w-full object-cover">
                                            @else
                                                <div
                                                    class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-bold text-[10px] uppercase">
                                                    {{ substr($tx->user->name, 0, 2) }}
                                                </div>
                                            @endif
                                        </div>
                                        <span class="font-semibold text-neutral-800">{{ $tx->user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 font-bold text-neutral-800">
                                    {{ $tx->customer_name ?: '-' }}
                                </td>
                                <td class="py-4 px-4 text-neutral-500 font-medium">
                                    {{ $tx->created_at->format('d F Y - H:i') }}
                                </td>
                                <td class="py-4 px-4">
                                    @if ($tx->payment_method === 'qris')
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-violet-50 border border-violet-100 px-2.5 py-0.5 text-[9px] font-bold text-violet-600 uppercase tracking-wider">
                                            QRIS
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-emerald-50 border border-emerald-100 px-2.5 py-0.5 text-[9px] font-bold text-emerald-600 uppercase tracking-wider">
                                            Cash
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-right font-black text-emerald-600 text-sm">
                                    Rp {{ number_format($tx->total_price, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <button onclick="showTxDetail(this)" data-code="{{ $tx->transaction_code }}"
                                        data-date="{{ $tx->created_at->format('d M Y H:i') }}"
                                        data-cashier="{{ $tx->user->name }}"
                                        data-customer="{{ $tx->customer_name ?: '-' }}"
                                        data-method="{{ strtoupper($tx->payment_method) }}"
                                        data-total="Rp {{ number_format($tx->total_price, 0, ',', '.') }}"
                                        data-paid="Rp {{ number_format($tx->total_paid, 0, ',', '.') }}"
                                        data-change="Rp {{ number_format($tx->total_change, 0, ',', '.') }}"
                                        data-items="{{ json_encode(
                                            $tx->items->map(function ($item) {
                                                return [
                                                    'name' => $item->product ? $item->product->name : $item->product_name ?? 'Produk dihapus',
                                                    'qty' => $item->quantity,
                                                    'price' => 'Rp ' . number_format($item->price, 0, ',', '.'),
                                                    'subtotal' => 'Rp ' . number_format($item->subtotal, 0, ',', '.'),
                                                ];
                                            }),
                                        ) }}"
                                        class="text-[11px] font-bold text-sky-600 hover:text-sky-700 bg-sky-50 hover:bg-sky-100/80 px-3 py-1.5 rounded-xl transition cursor-pointer select-none">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-16 text-center text-xs text-neutral-400 italic">
                                    Belum ada riwayat transaksi jualan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($transactions->hasPages())
                <div class="px-6 py-4 border-t border-neutral-100 flex items-center justify-between">
                    <div class="text-[11px] text-neutral-400 font-semibold">
                        Menampilkan {{ $transactions->firstItem() }} - {{ $transactions->lastItem() }} dari
                        {{ $transactions->total() }} transaksi
                    </div>
                    <div>
                        {{ $transactions->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- DETAIL INVOICE MODAL -->
    <div id="transaction-detail-modal"
        class="hidden fixed inset-0 z-50 overflow-y-auto bg-neutral-900/40 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl border border-neutral-100 shadow-[0_30px_70px_rgba(0,0,0,0.15)] w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300"
            id="modal-content">
            <div class="p-6 border-b border-neutral-100 bg-neutral-50/50">
                <div>
                    <h3 class="text-sm font-black text-neutral-900 tracking-tight">Detail Transaksi</h3>
                    <p class="text-[10px] text-neutral-400 font-semibold" id="modal-invoice-code">TX-XXXXXXXXX</p>
                </div>
            </div>
            <div class="p-6 space-y-5 text-xs text-neutral-700">
                <div class="grid grid-cols-3 gap-4 border-b border-neutral-100 pb-4">
                    <div>
                        <p class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider">Kasir</p>
                        <p class="font-bold text-neutral-800 mt-0.5" id="modal-invoice-cashier">-</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider">Customer</p>
                        <p class="font-bold text-neutral-850 mt-0.5" id="modal-invoice-customer">-</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider">Waktu</p>
                        <p class="font-semibold text-neutral-600 mt-0.5" id="modal-invoice-date">-</p>
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider">Item Belanja</p>
                    <div class="space-y-2 max-h-48 overflow-y-auto no-scrollbar" id="modal-invoice-items">
                    </div>
                </div>

                <div
                    class="bg-neutral-50 rounded-2xl p-4 border border-neutral-100 space-y-2 mt-4 font-semibold text-neutral-700">
                    <div
                        class="flex justify-between items-center text-[10px] text-neutral-400 uppercase tracking-wider font-bold">
                        <span>Metode Pembayaran</span>
                        <span class="text-neutral-800 font-extrabold" id="modal-invoice-method">-</span>
                    </div>
                    <div class="border-t border-neutral-100/70 my-2"></div>
                    <div class="flex justify-between items-center text-xs">
                        <span>Subtotal / Total</span>
                        <span class="font-black text-neutral-900" id="modal-invoice-total">-</span>
                    </div>
                    <div class="flex justify-between items-center text-[11px] text-neutral-500">
                        <span>Bayar</span>
                        <span class="font-bold" id="modal-invoice-paid">-</span>
                    </div>
                    <div class="flex justify-between items-center text-[11px] text-neutral-500">
                        <span>Kembalian</span>
                        <span class="font-bold text-neutral-800" id="modal-invoice-change">-</span>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-neutral-50/50 border-t border-neutral-100 flex flex-col gap-2">
                <button onclick="printHistoryReceipt()"
                    class="w-full py-2.5 rounded-xl bg-neutral-900 hover:bg-neutral-800 text-white font-bold text-xs shadow-md transition cursor-pointer select-none flex items-center justify-center gap-1.5">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.72 13.82l-.24-2.22H3a1.5 1.5 0 01-1.5-1.5V5.25a3 3 0 013-3h15a3 3 0 013 3v4.85a1.5 1.5 0 01-1.5 1.5h-3.48l-.24 2.22m-11.28 0h11.28m-11.28 0v6.78a2.25 2.25 0 002.25 2.25h6.78a2.25 2.25 0 002.25-2.25v-6.78M9 5.25h6" />
                    </svg>
                    Cetak Ulang Struk
                </button>
                <button onclick="closeTxDetail()"
                    class="w-full py-2.5 rounded-xl border border-neutral-250 bg-white hover:bg-neutral-50 text-neutral-700 font-bold text-xs shadow-3xs transition cursor-pointer select-none">
                    Tutup Detail
                </button>
            </div>
        </div>
    </div>

    <!-- HIDDEN THERMAL PRINTING AREA -->
    <div id="print-area-history" class="hidden" style="display: none !important;">
        <div class="text-center space-y-1">
            @if ($outlet && $outlet->logo)
                <img src="{{ asset($outlet->logo) }}" class="h-10 w-auto mx-auto mb-1.5 object-contain"
                    alt="Logo Outlet" style="filter: grayscale(100%); max-height: 45px;">
            @endif
            <h3 class="text-base font-black tracking-widest text-neutral-900">{{ $outlet->name ?? 'POSTAN' }}</h3>
            <p class="text-[9px] text-neutral-400">{{ $outlet->address ?? 'Jl. Pembangunan No. 4, Jakarta' }}</p>
        </div>

        <div class="border-b border-dashed border-neutral-350 my-2"
            style="border-bottom: 1px dashed #000; margin: 8px 0;"></div>

        <div class="text-[10px] text-neutral-600 space-y-1" style="font-size: 10px; color: #000;">
            <div class="flex justify-between" style="display: flex; justify-content: space-between;">
                <span>Kode:</span>
                <span id="print-receipt-code">TX-XXXXXXXX-XXXX</span>
            </div>
            <div class="flex justify-between" style="display: flex; justify-content: space-between;">
                <span>Tanggal:</span>
                <span id="print-receipt-date">--/--/---- --:--</span>
            </div>
            <div class="flex justify-between" style="display: flex; justify-content: space-between;">
                <span>Kasir:</span>
                <span id="print-receipt-cashier">--</span>
            </div>
            <div class="flex justify-between" style="display: flex; justify-content: space-between;">
                <span>Customer:</span>
                <span id="print-receipt-customer">--</span>
            </div>
            <div class="flex justify-between" style="display: flex; justify-content: space-between;">
                <span>Metode:</span>
                <span id="print-receipt-payment-method" style="font-weight: bold; text-transform: uppercase;">--</span>
            </div>
        </div>

        <div class="border-b border-dashed border-neutral-350 my-2"
            style="border-bottom: 1px dashed #000; margin: 8px 0;"></div>

        <div class="space-y-2" id="print-receipt-items-list" style="margin-top: 8px; margin-bottom: 8px;">
        </div>

        <div class="border-b border-dashed border-neutral-350 my-2"
            style="border-bottom: 1px dashed #000; margin: 8px 0;"></div>

        <div class="text-[10px] text-neutral-700 space-y-1.5 font-medium" style="font-size: 10px; color: #000;">
            <div class="flex justify-between text-neutral-900 font-bold"
                style="display: flex; justify-content: space-between; font-weight: bold;">
                <span>Total Belanja:</span>
                <span id="print-receipt-total">Rp 0</span>
            </div>
            <div class="flex justify-between" style="display: flex; justify-content: space-between;">
                <span>Bayar:</span>
                <span id="print-receipt-paid">Rp 0</span>
            </div>
            <div class="flex justify-between text-neutral-800 font-bold"
                style="display: flex; justify-content: space-between; font-weight: bold;">
                <span>Kembalian:</span>
                <span id="print-receipt-change">Rp 0</span>
            </div>
        </div>

        <div class="border-b border-dashed border-neutral-350 my-2"
            style="border-bottom: 1px dashed #000; margin: 8px 0;"></div>

        <div class="text-center text-[9px] text-neutral-400 py-1"
            style="text-align: center; font-size: 9px; padding-top: 4px; padding-bottom: 4px;">
            Terima kasih atas kunjungan Anda!<br>Semoga harimu menyenangkan.
        </div>
    </div>

@endsection
