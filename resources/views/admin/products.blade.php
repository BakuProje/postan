@extends('layouts.admin')
@section('title', 'Kelola Produk')
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
                <h2 class="text-2xl font-black text-neutral-900 tracking-tight">Daftar Produk</h2>
                <p class="text-sm text-neutral-500 mt-1">Kelola stok, harga, kategori, dan foto produk jualan Anda.</p>
            </div>
            <a href="{{ route('admin.products.create') }}"
                onclick="event.preventDefault(); openModal('create-product-modal');"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-sky-600 hover:shadow-lg hover:shadow-sky-500/10 active:scale-98 w-fit cursor-pointer">
                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Produk
            </a>
        </div>

        <div
            class="hidden md:block bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 shadow-[0_20px_50px_rgba(0,0,0,0.02)] overflow-hidden relative z-10">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse">
                    <thead>
                        <tr
                            class="text-neutral-400 border-b border-neutral-100 text-xs font-bold tracking-wider bg-neutral-50/50">
                            <th class="p-5 font-bold">Foto</th>
                            <th class="p-5 font-bold">Nama Produk</th>
                            <th class="p-5 font-bold">Kategori</th>
                            <th class="p-5 font-bold">Harga</th>
                            <th class="p-5 font-bold">Stok</th>
                            <th class="p-5 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100/60 text-neutral-600">
                        @forelse($products as $product)
                            <tr class="hover:bg-neutral-50/30 transition-colors">
                                <td class="p-5 whitespace-nowrap">
                                    <div
                                        class="h-10 w-10 rounded-lg overflow-hidden border border-neutral-200/80 shrink-0 aspect-square">
                                        @if ($product->photo)
                                            <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}"
                                                class="h-full w-full object-cover">
                                        @else
                                            <div
                                                class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-bold text-xs uppercase">
                                                {{ substr($product->name, 0, 2) }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-5 font-bold text-neutral-800 whitespace-nowrap">
                                    {{ $product->name }}
                                </td>
                                <td class="p-5 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-md bg-neutral-100 px-2.5 py-1 text-xs font-semibold text-neutral-700 border border-neutral-200">
                                        {{ $product->category->name }}
                                    </span>
                                </td>
                                <td class="p-5 whitespace-nowrap font-extrabold text-neutral-800">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>
                                <td class="p-5 whitespace-nowrap">
                                    @if ($product->stock <= 5)
                                        <span
                                            class="inline-flex items-center gap-1 rounded bg-rose-50 px-2.5 py-1 text-xs font-bold text-rose-700 border border-rose-100">
                                            {{ $product->stock }} (Menipis)
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 rounded bg-neutral-50 px-2.5 py-1 text-xs font-semibold text-neutral-700 border border-neutral-200">
                                            {{ $product->stock }}
                                        </span>
                                    @endif
                                </td>
                                <td class="p-5 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" onclick="openEditProductModal({{ json_encode($product) }})"
                                            class="inline-flex h-7 w-7 items-center justify-center rounded bg-amber-50 text-amber-600 border border-amber-100 hover:bg-amber-100 transition-colors cursor-pointer">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        <form id="delete-form-{{ $product->id }}" method="POST"
                                            action="{{ route('admin.products.delete', $product->id) }}" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button"
                                            onclick="confirmDelete(event, '{{ $product->name }}', 'delete-form-{{ $product->id }}')"
                                            class="inline-flex h-7 w-7 items-center justify-center rounded bg-rose-50 text-rose-600 border border-rose-100 hover:bg-rose-100 transition-colors cursor-pointer">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
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

        <div class="block md:hidden space-y-4">
            @forelse($products as $product)
                <div
                    class="bg-white/80 backdrop-blur-md rounded-2xl border border-white/60 shadow-[0_15px_35px_rgba(0,0,0,0.02)] p-5 flex flex-col justify-between gap-4 relative z-10">
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-16 w-16 rounded-xl overflow-hidden border border-neutral-200/80 shrink-0 aspect-square shadow-sm animate-fade-in">
                            @if ($product->photo)
                                <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}"
                                    class="h-full w-full object-cover">
                            @else
                                <div
                                    class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-base uppercase">
                                    {{ substr($product->name, 0, 2) }}
                                </div>
                            @endif
                        </div>
                        <p class="text-sm font-black text-neutral-900 mt-3">{{ $product->name }}</p>
                        <span
                            class="inline-flex items-center rounded-md bg-neutral-100 px-2.5 py-0.5 text-[9px] font-bold text-neutral-700 border border-neutral-200 mt-1.5">
                            {{ $product->category->name }}
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-3.5 border-t border-neutral-100 pt-3.5 text-xs text-neutral-600">
                        <div>
                            <span class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider block">Harga</span>
                            <span class="font-extrabold text-neutral-800 block mt-0.5">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <span class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider block">Stok</span>
                            @if ($product->stock <= 5)
                                <span
                                    class="inline-flex items-center gap-0.5 rounded bg-rose-50 px-1.5 py-0.5 text-[10px] font-bold text-rose-700 border border-rose-100 mt-0.5">
                                    {{ $product->stock }} (Menipis)
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center gap-0.5 rounded bg-neutral-50 px-1.5 py-0.5 text-[10px] font-semibold text-neutral-700 border border-neutral-200 mt-0.5">
                                    {{ $product->stock }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <form id="delete-form-{{ $product->id }}" method="POST"
                        action="{{ route('admin.products.delete', $product->id) }}" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>

                    <div class="flex items-center justify-end gap-3 border-t border-neutral-100 pt-3.5">
                        <button type="button" onclick="openEditProductModal({{ json_encode($product) }})"
                            class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-amber-50 text-xs font-bold text-amber-600 border border-amber-100 hover:bg-amber-100 transition active:scale-98 cursor-pointer text-center">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Ubah
                        </button>
                        <button type="button"
                            onclick="confirmDelete(event, '{{ $product->name }}', 'delete-form-{{ $product->id }}')"
                            class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-rose-50 text-xs font-bold text-rose-600 border border-rose-100 hover:bg-rose-100 transition active:scale-98 cursor-pointer">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            Hapus
                        </button>
                    </div>
                </div>
            @empty
                <div
                    class="bg-white rounded-2xl border border-neutral-200/60 p-8 text-center text-neutral-400 italic text-xs">
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
                        <label for="create_product_category"
                            class="block text-xs font-bold text-neutral-700">Kategori</label>
                        <div class="relative">
                            <select id="create_product_category" name="category_id" required
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                                <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Pilih Kategori
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id && !old('edit_product_id') ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
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
                        <label for="edit_product_category"
                            class="block text-xs font-bold text-neutral-700">Kategori</label>
                        <div class="relative">
                            <select id="edit_product_category" name="category_id" required
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
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
@endsection
