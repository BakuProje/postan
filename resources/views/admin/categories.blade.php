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

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 relative z-10">
            <div>
                <h2 class="text-2xl font-black text-neutral-900 tracking-tight">Inventaris Kategori</h2>
                <p class="text-xs text-neutral-500 mt-1">Kelola dan atur kategori produk toko Anda.</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" onclick="openModal('create-category-modal');"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-5 py-2.5 text-xs font-bold text-white transition hover:bg-sky-600 shadow-sm active:scale-98 cursor-pointer">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Kategori
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 relative z-10">
            <div
                class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 shadow-2xs flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center shrink-0 border border-blue-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest block">TOTAL
                        KATEGORI</span>
                    <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                        {{ $categories->count() }}</h3>
                    <span class="text-[11px] font-bold text-neutral-400 block mt-1.5">Semua Kategori</span>
                </div>
            </div>

            <!-- TOTAL PRODUK -->
            <div
                class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 shadow-2xs flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 border border-emerald-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest block">TOTAL PRODUK</span>
                    <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                        {{ number_format($totalProducts, 0, ',', '.') }}</h3>
                    <span class="text-[11px] font-bold text-neutral-400 block mt-1.5">Produk Terkelompok</span>
                </div>
            </div>

            <!-- TOTAL STOK -->
            <div
                class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 shadow-2xs flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center shrink-0 border border-purple-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest block">TOTAL STOK</span>
                    <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                        {{ number_format($totalStock, 0, ',', '.') }}</h3>
                    <span class="text-[11px] font-bold text-neutral-400 block mt-1.5">Total Stok Produk</span>
                </div>
            </div>

            <!-- KATEGORI AKTIF -->
            <div
                class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 shadow-2xs flex items-center gap-4">
                <div
                    class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center shrink-0 border border-amber-100/50">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest block">KATEGORI
                        AKTIF</span>
                    <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                        {{ $categories->where('products_count', '>', 0)->count() ?: $categories->count() }}</h3>
                    <span class="text-[11px] font-bold text-neutral-400 block mt-1.5">Kategori Aktif</span>
                </div>
            </div>
        </div>

        <!-- Daftar Kategori Tree View Container -->
        <div
            class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-6 shadow-2xs relative z-10 space-y-5">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-extrabold text-neutral-900 tracking-tight">Daftar Kategori</h3>
                <span class="text-xs font-bold text-neutral-400">{{ $categories->count() }} Kategori Terdaftar</span>
            </div>

            <!-- Search input -->
            <div class="relative w-full">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-neutral-400 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input id="category-search-input" type="text" onkeyup="filterCategoriesTree()"
                    placeholder="Cari kategori..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-neutral-200 text-xs font-medium text-neutral-800 placeholder:text-neutral-400 focus:outline-none focus:border-sky-500 transition-colors">
            </div>

            <!-- Tree Items List -->
            <div class="space-y-3">
                <!-- Root: Semua Kategori -->
                <div
                    class="flex items-center justify-between p-3.5 rounded-xl border border-neutral-200/70 bg-neutral-50/80 shadow-2xs">
                    <div class="flex items-center gap-3">
                        <div
                            class="h-9 w-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0 border border-sky-100">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-black text-neutral-900 block">Semua Kategori</span>
                            <span class="text-[10px] text-neutral-400 font-semibold">Total Seluruh Produk Toko</span>
                        </div>
                    </div>
                    <span
                        class="inline-flex items-center justify-center px-3.5 py-1.5 rounded-xl bg-white text-neutral-800 text-xs font-extrabold border border-neutral-200/80 shadow-2xs">
                        {{ $totalProducts }} Produk
                    </span>
                </div>

                <!-- Dynamic Categories List -->
                <div id="category-tree-container" class="space-y-3">
                    @forelse($categories as $category)
                        <div class="category-item-group space-y-2.5" data-name="{{ strtolower($category->name) }}">
                            <div
                                class="flex items-center justify-between p-3.5 rounded-xl border border-sky-100 bg-sky-50/40 hover:bg-sky-50/90 transition-all shadow-2xs group">
                                <div class="flex items-center gap-3">
                                    <button type="button" onclick="toggleSubCategories(this)"
                                        class="h-7 w-7 inline-flex items-center justify-center rounded-lg hover:bg-sky-100 text-neutral-400 hover:text-sky-600 transition cursor-pointer">
                                        <svg class="h-4 w-4 transform transition-transform duration-200" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <div
                                        class="h-9 w-9 rounded-xl bg-sky-500 text-white flex items-center justify-center shrink-0 shadow-sm">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span
                                            class="text-xs font-extrabold text-sky-700 block">{{ $category->name }}</span>
                                        <span
                                            class="text-[10px] text-neutral-400 font-medium">{{ $category->products_count }}
                                            item terdaftar</span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-flex items-center justify-center px-3 py-1 rounded-lg bg-sky-100 text-sky-700 text-xs font-extrabold border border-sky-200/60">
                                        {{ $category->products_count }}
                                    </span>
                                    <div class="flex items-center gap-1.5">
                                        <button type="button"
                                            onclick="openEditCategoryModal({{ json_encode($category) }})"
                                            class="h-8 w-8 inline-flex items-center justify-center rounded-lg border border-neutral-200 bg-white text-sky-600 hover:bg-sky-50 shadow-2xs transition cursor-pointer">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        <form id="delete-form-{{ $category->id }}" method="POST"
                                            action="{{ route('admin.categories.delete', $category->id) }}"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button"
                                            onclick="confirmDelete(event, '{{ $category->name }}', 'delete-form-{{ $category->id }}')"
                                            class="h-8 w-8 inline-flex items-center justify-center rounded-lg border border-neutral-200 bg-white text-rose-500 hover:bg-rose-50 hover:text-rose-600 hover:border-rose-200 shadow-2xs transition cursor-pointer">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Products Sub-tree Cards Container -->
                            <div
                                class="sub-category-list pl-6 space-y-2 border-l-2 border-dashed border-neutral-200 ml-6 pt-1">
                                @forelse($category->products as $product)
                                    <div
                                        class="flex items-center justify-between p-3 rounded-xl bg-white border border-neutral-200/70 shadow-2xs hover:border-sky-300 transition-all">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="h-9 w-9 rounded-xl overflow-hidden border border-neutral-200/80 shrink-0 aspect-square bg-neutral-50 flex items-center justify-center">
                                                @if ($product->photo)
                                                    <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}"
                                                        class="h-full w-full object-cover">
                                                @else
                                                    <span
                                                        class="font-extrabold text-xs text-sky-600 uppercase">{{ substr($product->name, 0, 2) }}</span>
                                                @endif
                                            </div>
                                            <div>
                                                <span
                                                    class="text-xs font-extrabold text-neutral-800 block">{{ $product->name }}</span>
                                                <span class="text-[10px] text-neutral-400 font-medium">Rp
                                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <span
                                            class="inline-flex items-center justify-center px-3 py-1 rounded-lg text-xs font-bold {{ $product->stock == 0 ? 'bg-rose-50 text-rose-500 border border-rose-100' : ($product->stock <= 5 ? 'bg-amber-50 text-amber-600 border border-amber-100' : 'bg-emerald-50 text-emerald-600 border border-emerald-100') }}">
                                            Stok: {{ number_format($product->stock, 0, ',', '.') }} pcs
                                        </span>
                                    </div>
                                @empty
                                    <div
                                        class="p-3 text-xs text-neutral-400 italic bg-neutral-50 rounded-xl border border-neutral-100">
                                        Belum ada produk dalam kategori ini.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center text-neutral-400 italic text-xs">
                            Belum ada data kategori terdaftar.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div id="create-category-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-md w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-neutral-900">Tambah Kategori Baru</h3>
                <button type="button" onclick="closeModal('create-category-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.categories.store') }}" class="p-6 space-y-4">
                @csrf

                <div class="space-y-2">
                    <label for="create_category_name" class="block text-xs font-bold text-neutral-700">Nama
                        Kategori</label>
                    <input id="create_category_name" name="name" type="text"
                        value="{{ old('edit_category_id') ? '' : old('name') }}" required
                        placeholder="Contoh: Makanan, Minuman"
                        class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    @error('name')
                        @if (!old('edit_category_id'))
                            <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="pt-4 border-t border-neutral-100 flex items-center justify-end">
                    <button type="submit"
                        class="w-full rounded-xl bg-sky-500 py-3.5 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 cursor-pointer">Simpan
                        Kategori</button>
                </div>
            </form>
        </div>
    </div>

    <!-- UBAH KATEGORI MODAL -->
    <div id="edit-category-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-md w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-neutral-900">Ubah Kategori</h3>
                <button type="button" onclick="closeModal('edit-category-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="edit-category-form" method="POST" action="" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="edit_category_id" id="edit_category_id_field" value="">

                <div class="space-y-2">
                    <label for="edit_category_name" class="block text-xs font-bold text-neutral-700">Nama Kategori</label>
                    <input id="edit_category_name" name="name" type="text" required
                        placeholder="Contoh: Makanan, Minuman"
                        class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    @error('name')
                        @if (old('edit_category_id'))
                            <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="pt-4 border-t border-neutral-100 flex items-center justify-end">
                    <button type="submit"
                        class="w-full rounded-xl bg-sky-500 py-3.5 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 cursor-pointer">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- DELETE CONFIRMATION -->
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
                <h3 class="text-sm font-extrabold text-neutral-900 tracking-tight">Hapus Kategori?</h3>
                <p class="text-[11px] text-neutral-500 leading-relaxed px-1">Apakah Anda yakin ingin menghapus kategori
                    <strong id="delete-modal-name" class="text-neutral-800 font-bold"></strong>? Semua produk di dalam
                    kategori ini juga akan terhapus.
                </p>
            </div>

            <div class="flex items-center gap-3 w-full pt-2">
                <button type="button" id="delete-modal-cancel"
                    class="flex-1 px-4 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition active:scale-98 cursor-pointer">Batal</button>
                <button type="button" id="delete-modal-confirm"
                    class="flex-1 px-4 py-2.5 rounded-xl bg-rose-500 text-xs font-bold text-white hover:bg-rose-600 transition active:scale-98 cursor-pointer">Hapus</button>
            </div>
        </div>
    </div>

    <div id="categories-page-data" data-has-errors="{{ $errors->any() ? 'true' : 'false' }}"
        data-old-edit-category-id="{{ old('edit_category_id') }}" data-old-name="{{ old('name') }}"
        data-session-open-create-modal="{{ session('open_create_modal') ? 'true' : 'false' }}"
        data-session-open-edit-modal-id="{{ session('open_edit_modal_id') }}"
        data-categories-json="{{ json_encode($categories) }}" class="hidden">
    </div>

    <script>
        function toggleSubCategories(btn) {
            const group = btn.closest('.category-item-group');
            if (!group) return;
            const subList = group.querySelector('.sub-category-list');
            const svg = btn.querySelector('svg');
            if (subList) subList.classList.toggle('hidden');
            if (svg) svg.classList.toggle('-rotate-90');
        }

        function filterCategoriesTree() {
            const query = (document.getElementById('category-search-input')?.value || '').toLowerCase().trim();
            const groups = document.querySelectorAll('.category-item-group');
            groups.forEach(group => {
                const name = group.getAttribute('data-name') || '';
                if (!query || name.includes(query)) {
                    group.style.display = '';
                } else {
                    group.style.display = 'none';
                }
            });
        }
    </script>
@endsection
