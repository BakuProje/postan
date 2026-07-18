@extends('layouts.admin')
@section('title', 'Pengaturan Outlet')
@section('konten')
    <div class="max-w-[1440px] w-full mx-auto relative">
        <!-- Dekorasi 3D Bubble Soft UI -->
        <div
            class="absolute -top-10 -right-10 h-32 w-32 rounded-full bg-gradient-to-tr from-sky-400/20 via-sky-300/10 to-transparent blur-md pointer-events-none">
        </div>
        <div
            class="absolute bottom-10 left-10 h-40 w-40 rounded-full bg-gradient-to-br from-indigo-300/15 via-sky-200/5 to-transparent blur-md pointer-events-none">
        </div>

        <div class="grid gap-8 lg:grid-cols-3">
            <!-- FORM PENGATURAN OUTLET -->
            <div class="lg:col-span-2 space-y-6">
                <div
                    class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-8 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.05)] hover:-translate-y-1">
                    <div
                        class="absolute inset-0 bg-[linear-gradient(to_right,#80808003_1px,transparent_1px),linear-gradient(to_bottom,#80808003_1px,transparent_1px)] bg-[size:20px_20px] pointer-events-none">
                    </div>

                    <div class="relative z-10 space-y-1 mb-6">
                        <h2 class="text-sm font-black text-neutral-900 uppercase tracking-wider">Detail Informasi Outlet</h2>
                    </div>

                    <form method="POST" action="{{ route('admin.outlet.update') }}" enctype="multipart/form-data"
                        class="relative z-10 space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col items-center justify-center pb-6 border-b border-neutral-100">
                            <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest mb-3">Logo
                                Outlet</span>
                            <div class="relative group cursor-pointer">
                                <input id="photo" name="logo" type="file" accept="image/*" class="hidden">
                                <label for="photo" class="cursor-pointer block relative">
                                    <div
                                        class="h-24 w-24 rounded-2xl bg-gradient-to-tr from-neutral-50 to-neutral-100 border-2 border-neutral-200 flex items-center justify-center overflow-hidden transition duration-350 group-hover:scale-102 group-hover:border-sky-400 relative shadow-sm">
                                        @if ($outlet->logo)
                                            <img id="photo-preview" src="{{ asset($outlet->logo) }}" alt="Logo Outlet"
                                                class="h-full w-full object-cover">
                                            <div id="photo-placeholder" class="hidden"></div>
                                        @else
                                            <img id="photo-preview" src="#" alt="Preview"
                                                class="hidden h-full w-full object-cover">
                                            <div id="photo-placeholder"
                                                class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-black text-2xl uppercase">
                                                OUT
                                            </div>
                                        @endif
                                        <div
                                            class="absolute inset-0 bg-neutral-950/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition duration-300">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <span class="text-[9px] text-neutral-400 mt-2.5 font-medium">Ketuk gambar untuk mengunggah logo
                                baru.</span>
                            @error('logo')
                                <p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-6 sm:grid-cols-2">
                            <div class="space-y-2">
                                <label for="name" class="block text-xs font-bold text-neutral-700">Nama Outlet</label>
                                <input id="name" name="name" type="text" value="{{ old('name', $outlet->name) }}"
                                    required placeholder="Masukkan nama outlet"
                                    class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                                @error('name')
                                    <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="address" class="block text-xs font-bold text-neutral-700">Alamat
                                    Lengkap</label>
                                <input id="address" name="address" type="text"
                                    value="{{ old('address', $outlet->address) }}" required
                                    placeholder="Masukkan alamat lengkap outlet"
                                    class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                                @error('address')
                                    <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-6 border-t border-neutral-100 flex justify-end">
                            <button type="submit"
                                class="w-full sm:w-auto rounded-xl bg-sky-500 px-6 py-3.5 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 cursor-pointer">Simpan
                                Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- UJI KONEKSI PRINTER THERMAL -->
            <div class="space-y-6">
                <div
                    class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-8 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden flex flex-col justify-between h-full transition-all duration-350 hover:shadow-[0_30px_70px_rgba(0,0,0,0.05)] hover:-translate-y-1">
                    <div
                        class="absolute inset-0 bg-[linear-gradient(to_right,#80808003_1px,transparent_1px),linear-gradient(to_bottom,#80808003_1px,transparent_1px)] bg-[size:20px_20px] pointer-events-none">
                    </div>

                    <div class="relative z-10 space-y-4">
                        <div class="space-y-1">
                            <h2 class="text-sm font-black text-neutral-900 uppercase tracking-wider">Cek Mesin Printer</h2>
                        </div>



                        <!-- Preview Kertas Struk Dummy -->
                        <div
                            class="bg-neutral-50 rounded-xl p-4.5 border border-neutral-150 font-mono text-[9px] text-neutral-600 space-y-2 select-none">
                            <div class="text-center">
                                @if ($outlet->logo)
                                    <img src="{{ asset($outlet->logo) }}" class="h-8 w-auto mx-auto mb-1.5 object-contain"
                                        alt="Logo Outlet">
                                @endif
                                <span
                                    class="font-bold block text-neutral-800 text-xs uppercase">{{ $outlet->name ?? 'POSTAN OUTLET' }}</span>
                                <span>{{ $outlet->address ?? 'Alamat Belum Diatur' }}</span>
                            </div>
                            <div class="border-b border-dashed border-neutral-300"></div>
                            <div class="flex justify-between">
                                <span>TEST KONEKSI PRINTER</span>
                                <span class="font-bold">SUKSES</span>
                            </div>
                            <div class="border-b border-dashed border-neutral-300"></div>
                            <p class="text-center text-[8px] text-neutral-400 leading-normal">Uji coba cetak printer
                                berhasil dengan kelengkapan struk.</p>
                        </div>
                    </div>

                    <div class="relative z-10 pt-6 border-t border-neutral-100 mt-6">
                        <button type="button" onclick="printReceiptContent('print-area')"
                            class="w-full rounded-xl bg-neutral-900 py-3.5 text-xs font-bold text-white transition hover:bg-neutral-850 hover:shadow-lg active:scale-98 flex items-center justify-center gap-1.5 cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.72 13.821V21M3 16.5l.004-10.5A2.25 2.25 0 0 1 5.252 3.75h13.496a2.25 2.25 0 0 1 2.25 2.25v10.5m-18 0h18M3 16.5a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 16.5M16.5 21v-7.179M9 21h6" />
                            </svg>
                            Cetak Hasil Printer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PRINT AREA UNTUK DUMMY RECEIPT TEST -->
    <div id="print-area" class="hidden">
        <div
            style="font-family: 'Courier New', Courier, monospace; font-size: 11px; color: #000; max-width: 280px; margin: 0 auto; text-align: center;">
            @if ($outlet->logo)
                <img src="{{ asset($outlet->logo) }}"
                    style="max-height: 40px; width: auto; margin: 0 auto 6px; display: block; object-fit: contain;"
                    alt="Logo Outlet">
            @endif
            <h3 style="margin: 0; font-size: 14px; font-weight: bold; text-transform: uppercase;">
                {{ $outlet->name ?? 'POSTAN OUTLET' }}</h3>
            <p style="margin: 2px 0; font-size: 9px; line-height: 1.3;">
                {{ $outlet->address ?? 'Alamat Outlet Belum Dikonfigurasi' }}</p>

            <div style="border-bottom: 1px dashed #000; margin: 8px 0;"></div>

            <h4 style="margin: 5px 0 2px; font-size: 11px; font-weight: bold;">TEST KONEKSI PRINTER</h4>
            <p style="margin: 0; font-size: 10px; color: #333;">Koneksi mesin printer kasir thermal berhasil dan terhubung
                dengan sistem POSTAN.</p>

            <div style="border-bottom: 1px dashed #000; margin: 8px 0;"></div>

            <p style="margin: 10px 0 0; font-size: 9px; color: #666; font-style: italic;">Sistem POS POSTAN - Baku Proje
            </p>
            <p style="margin: 2px 0; font-size: 8px;">Dicetak pada: {{ date('d-m-Y H:i') }}</p>
        </div>
    </div>
@endsection
