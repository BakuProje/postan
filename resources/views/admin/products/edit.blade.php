@extends('layouts.admin')
@section('title', 'Ubah Produk')
@section('konten')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-2xl border border-neutral-200/60 p-6 space-y-6">
        <div>
            <h2 class="text-lg font-black text-neutral-900 tracking-tight">Ubah Produk</h2>
            <p class="text-xs text-neutral-500 mt-1">Ubah informasi produk jualan Anda.</p>
        </div>
        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="flex flex-col items-center justify-center pb-5 border-b border-neutral-100">
                <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest mb-3">Foto Produk</span>
                <div class="relative group cursor-pointer">
                    <input id="photo" name="photo" type="file" accept="image/*" class="hidden">
                    <label for="photo" class="cursor-pointer block relative">
                        <div class="h-20 w-20 rounded-xl bg-gradient-to-tr from-neutral-50 to-neutral-100 border-2 border-neutral-200 flex items-center justify-center overflow-hidden transition duration-350 group-hover:scale-102 group-hover:border-sky-400 relative">
                            @if($product->photo)
                                <img id="photo-preview" src="{{ asset($product->photo) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                <div id="photo-placeholder" class="hidden"></div>
                            @else
                                <img id="photo-preview" src="#" alt="Preview" class="hidden h-full w-full object-cover">
                                <div id="photo-placeholder" class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-bold text-sm uppercase">
                                    {{ substr($product->name, 0, 2) }}
                                </div>
                            @endif
                        </div>
                    </label>
                </div>
                <span class="text-[9px] text-neutral-400 mt-2 font-medium">Ketuk untuk ubah foto.</span>
                @error('photo')
                    <p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="name" class="block text-xs font-bold text-neutral-700">Nama Produk</label>
                <input id="name" name="name" type="text" value="{{ old('name', $product->name) }}" required placeholder="Contoh: Kopi Susu, Nasi Goreng" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                @error('name')
                    <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="category_id" class="block text-xs font-bold text-neutral-700">Kategori</label>
                <div class="relative">
                    <select id="category_id" name="category_id" required class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </div>
                @error('category_id')
                    <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="price" class="block text-xs font-bold text-neutral-700">Harga (Rp)</label>
                    <input id="price" name="price" type="text" value="{{ old('price', $product->price) ? number_format(old('price', $product->price), 0, ',', '.') : '' }}" required placeholder="Contoh: 15.000" class="price-format-input block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    @error('price')
                        <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="stock" class="block text-xs font-bold text-neutral-700">Stok</label>
                    <input id="stock" name="stock" type="number" min="0" value="{{ old('stock', $product->stock) }}" required placeholder="100" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    @error('stock')
                        <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-6 border-t border-neutral-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.products') }}" class="rounded-xl border border-neutral-200 bg-white px-5 py-3 text-xs font-bold text-neutral-500 transition hover:bg-neutral-50 hover:text-neutral-800 text-center flex-1">Batalkan</a>
                <button type="submit" class="rounded-xl bg-sky-500 px-6 py-3 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 flex-1">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
