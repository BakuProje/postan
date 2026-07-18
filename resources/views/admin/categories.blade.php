@extends('layouts.admin')
@section('title', 'Kategori Produk')
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
                <h2 class="text-2xl font-black text-neutral-900 tracking-tight">Kategori Produk</h2>
                <p class="text-sm text-neutral-500 mt-1">Kelompokkan produk ke dalam kategori makanan, minuman, dan lainnya.
                </p>
            </div>
            <a href="{{ route('admin.categories.create') }}"
                onclick="event.preventDefault(); openModal('create-category-modal');"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-sky-600 hover:shadow-lg hover:shadow-sky-500/10 active:scale-98 w-fit cursor-pointer">
                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Kategori
            </a>
        </div>

        <div
            class="hidden md:block bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 shadow-[0_20px_50px_rgba(0,0,0,0.02)] overflow-hidden relative z-10">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse">
                    <thead>
                        <tr
                            class="text-neutral-400 border-b border-neutral-100 text-xs font-bold tracking-wider bg-neutral-50/50">
                            <th class="p-5 font-bold">Nama Kategori</th>
                            <th class="p-5 font-bold text-center">Jumlah Produk</th>
                            <th class="p-5 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100/60 text-neutral-600">
                        @forelse($categories as $category)
                            <tr class="hover:bg-neutral-50/30 transition-colors">
                                <td class="p-5 font-bold text-neutral-800 whitespace-nowrap">
                                    {{ $category->name }}
                                </td>
                                <td class="p-5 text-center whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center rounded-full bg-neutral-100 px-3 py-1 text-xs font-semibold text-neutral-700 border border-neutral-200">
                                        {{ $category->products_count }} Produk
                                    </span>
                                </td>
                                <td class="p-5 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" onclick="openEditCategoryModal({{ json_encode($category) }})"
                                            class="inline-flex h-7 w-7 items-center justify-center rounded bg-amber-50 text-amber-600 border border-amber-100 hover:bg-amber-100 transition-colors cursor-pointer">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        <form id="delete-form-{{ $category->id }}" method="POST"
                                            action="{{ route('admin.categories.delete', $category->id) }}" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button"
                                            onclick="confirmDelete(event, '{{ $category->name }}', 'delete-form-{{ $category->id }}')"
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
                                <td colspan="3" class="p-8 text-center text-neutral-400 italic">
                                    Belum ada data kategori terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="block md:hidden space-y-4">
            @forelse($categories as $category)
                <div
                    class="bg-white/80 backdrop-blur-md rounded-2xl border border-white/60 shadow-[0_15px_35px_rgba(0,0,0,0.02)] p-5 flex flex-col justify-between gap-4 relative z-10">
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-14 w-14 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center border border-sky-100 shrink-0">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.125 1.125 0 001.591 0l7.122-7.122a1.125 1.125 0 000-1.591L12.75 3.018a1.5 1.5 0 00-1.077-.45L9.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h.008v.008H7.5V7.5z" />
                            </svg>
                        </div>
                        <p class="text-sm font-black text-neutral-900 mt-3">{{ $category->name }}</p>
                        <span
                            class="inline-flex items-center rounded-full bg-neutral-100 px-2.5 py-0.5 text-[9px] font-bold text-neutral-700 border border-neutral-200 mt-1.5">
                            {{ $category->products_count }} Produk
                        </span>
                    </div>

                    <form id="delete-form-{{ $category->id }}" method="POST"
                        action="{{ route('admin.categories.delete', $category->id) }}" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>

                    <div class="flex items-center justify-end gap-3 border-t border-neutral-100 pt-3.5">
                        <button type="button" onclick="openEditCategoryModal({{ json_encode($category) }})"
                            class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-amber-50 text-xs font-bold text-amber-600 border border-amber-100 hover:bg-amber-100 transition active:scale-98 cursor-pointer text-center">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Ubah
                        </button>
                        <button type="button"
                            onclick="confirmDelete(event, '{{ $category->name }}', 'delete-form-{{ $category->id }}')"
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
                    Belum ada data kategori terdaftar.
                </div>
            @endforelse
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
                    kategori ini juga akan terhapus.</p>
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
@endsection
