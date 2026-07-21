<section id="showcase"
    class="relative overflow-hidden bg-transparent min-h-[calc(100vh-5rem)] flex flex-col justify-center py-16 border-b border-neutral-200/50">
    <div
        class="absolute inset-0 -z-10 bg-[linear-gradient(to_right,#80808008_1px,transparent_1px),linear-gradient(to_bottom,#80808008_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_40%,#000_70%,transparent_100%)]">
    </div>
    <div
        class="absolute top-[15%] left-[5%] -z-10 h-32 w-32 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-100/10 border border-white/40 shadow-[inset_5px_5px_14px_rgba(255,255,255,0.8),inset_-5px_-5px_14px_rgba(14,165,233,0.08),5px_10px_28px_rgba(14,165,233,0.04)] animate-float-delayed">
    </div>
    <div
        class="absolute bottom-[10%] right-[4%] -z-10 h-24 w-24 rounded-full bg-gradient-to-br from-white/80 via-sky-50/25 to-sky-200/10 border border-white/50 shadow-[inset_4px_4px_10px_rgba(255,255,255,0.9),inset_-4px_-4px_10px_rgba(14,165,233,0.1),4px_8px_20px_rgba(14,165,233,0.05)] animate-float">
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 w-full">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span
                class="text-[10px] font-extrabold uppercase tracking-widest text-sky-600 bg-sky-50 border border-sky-100 px-3 py-1 rounded-full">Tampilan
                Aplikasi</span>
            <h2 class="mt-4 text-2xl sm:text-3xl font-black text-neutral-900 tracking-tight">
                Showcase Multi-Device
            </h2>
            <p class="mt-3 text-xs sm:text-sm text-neutral-500 leading-relaxed">
                Antarmuka responsif Postan yang didesain presisi dan optimal di berbagai ukuran perangkat bisnis Anda.
            </p>
        </div>

        <div class="relative">
            <div class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 top-4 bottom-4 w-0.5 bg-neutral-200/80">
            </div>

            <!-- SHOWCASE ITEM 1: DESKTOP -->
            <div
                class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between mb-16 lg:mb-20 group/item">
                <div
                    class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 z-10 flex items-center justify-center">
                    <div
                        class="size-10 rounded-full border-4 border-white bg-sky-500 text-white flex items-center justify-center shadow-md transition-all duration-300 group-hover/item:bg-sky-600 group-hover/item:scale-110">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0v12" />
                        </svg>
                    </div>
                </div>

                <div class="w-full lg:w-[calc(50%-2.5rem)] pl-16 lg:pl-0 lg:text-right order-2 lg:order-1">
                    <div class="inline-block w-full lg:max-w-sm">
                        <span
                            class="text-[10px] font-extrabold uppercase tracking-wider text-sky-500 bg-sky-50 px-2.5 py-1 rounded-md border border-sky-100">
                            Desktop View
                        </span>
                        <h3 class="mt-3 text-base font-bold text-neutral-900">
                            Tampilan Desktop (PC / Laptop)
                        </h3>
                        <p class="mt-2 text-xs leading-relaxed text-neutral-500 text-justify">
                            Antarmuka layar lebar yang informatif, memuat grafik tren pemasukan, transaksi terbaru, stok
                            produk, dan performa kasir secara lengkap dan jelas.
                        </p>
                        <div class="mt-4 transition-transform duration-300 hover:scale-[1.03]">
                            <img src="{{ asset('images/dekstop.png') }}" alt="Tampilan Desktop"
                                class="w-full max-w-[280px] sm:max-w-[320px] mx-auto lg:ml-auto lg:mr-0 h-auto object-contain drop-shadow-xl">
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block w-[calc(50%-2.5rem)] order-3">
                    <span class="text-xs font-bold text-neutral-400 tracking-wider">PC & Laptop</span>
                </div>
            </div>

            <!-- SHOWCASE ITEM 2: TABLET -->
            <div
                class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between mb-16 lg:mb-20 group/item">
                <div
                    class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 z-10 flex items-center justify-center">
                    <div
                        class="size-10 rounded-full border-4 border-white bg-sky-500 text-white flex items-center justify-center shadow-md transition-all duration-300 group-hover/item:bg-sky-600 group-hover/item:scale-110">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                    </div>
                </div>

                <div class="hidden lg:block w-[calc(50%-2.5rem)] text-right order-1">
                    <span class="text-xs font-bold text-neutral-400 tracking-wider">iPad & Tablet</span>
                </div>

                <div class="w-full lg:w-[calc(50%-2.5rem)] pl-16 lg:pl-0 order-2">
                    <div class="inline-block w-full lg:max-w-sm">
                        <span
                            class="text-[10px] font-extrabold uppercase tracking-wider text-sky-500 bg-sky-50 px-2.5 py-1 rounded-md border border-sky-100">
                            Tablet View
                        </span>
                        <h3 class="mt-3 text-base font-bold text-neutral-900">
                            Tampilan Tablet (iPad / Tablet)
                        </h3>
                        <p class="mt-2 text-xs leading-relaxed text-neutral-500 text-justify">
                            Layout fleksibel 2 kolom yang presisi, dirancang khusus untuk penggunaan kasir portabel
                            tablet tanpa ada data yang terpotong.
                        </p>
                        <div class="mt-4 transition-transform duration-300 hover:scale-[1.03]">
                            <img src="{{ asset('images/tablet.png') }}" alt="Tampilan Tablet"
                                class="w-full max-w-[220px] sm:max-w-[250px] h-auto object-contain drop-shadow-xl">
                        </div>
                    </div>
                </div>
            </div>

            <!-- SHOWCASE ITEM 3: MOBILE -->
            <div class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between mb-6 group/item">
                <div
                    class="absolute left-6 lg:left-1/2 transform -translate-x-1/2 z-10 flex items-center justify-center">
                    <div
                        class="size-10 rounded-full border-4 border-white bg-sky-500 text-white flex items-center justify-center shadow-md transition-all duration-300 group-hover/item:bg-sky-600 group-hover/item:scale-110">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                    </div>
                </div>

                <div class="w-full lg:w-[calc(50%-2.5rem)] pl-16 lg:pl-0 lg:text-right order-2 lg:order-1">
                    <div class="inline-block w-full lg:max-w-sm">
                        <span
                            class="text-[10px] font-extrabold uppercase tracking-wider text-sky-500 bg-sky-50 px-2.5 py-1 rounded-md border border-sky-100">
                            Mobile View
                        </span>
                        <h3 class="mt-3 text-base font-bold text-neutral-900">
                            Tampilan Mobile (Smartphone)
                        </h3>
                        <p class="mt-2 text-xs leading-relaxed text-neutral-500 text-justify">
                            Desain mobile-first yang sangat responsif, ringan, dan cepat. Ideal untuk memantau bisnis
                            dan transaksi dari genggaman tangan.
                        </p>
                        <div class="mt-4 transition-transform duration-300 hover:scale-[1.03]">
                            <img src="{{ asset('images/mobile.png') }}" alt="Tampilan Mobile"
                                class="w-full max-w-[140px] sm:max-w-[160px] mx-auto lg:ml-auto lg:mr-0 h-auto object-contain drop-shadow-xl">
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block w-[calc(50%-2.5rem)] order-3">
                    <span class="text-xs font-bold text-neutral-400 tracking-wider">Smartphone / HP</span>
                </div>
            </div>

        </div>
    </div>
</section>
