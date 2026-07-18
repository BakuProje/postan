@extends('layouts.admin')
@section('title', 'Tambah Kategori')
@section('konten')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-2xl border border-neutral-200/60 p-6 space-y-6">
        <div>
            <h2 class="text-lg font-black text-neutral-900 tracking-tight">Tambah Kategori Baru</h2>
            <p class="text-xs text-neutral-500 mt-1">Buat kategori produk baru di sistem.</p>
        </div>
        <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">
            @csrf
            
            <div class="space-y-2">
                <label for="name" class="block text-xs font-bold text-neutral-700">Nama Kategori</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required placeholder="Contoh: Makanan, Minuman" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                @error('name')
                    <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 border-t border-neutral-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.categories') }}" class="rounded-xl border border-neutral-200 bg-white px-5 py-3 text-xs font-bold text-neutral-500 transition hover:bg-neutral-50 hover:text-neutral-800 text-center flex-1">Batalkan</a>
                <button type="submit" class="rounded-xl bg-sky-500 px-6 py-3 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 flex-1">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection
