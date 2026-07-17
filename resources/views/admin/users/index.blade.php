@extends('layouts.admin')
@section('title', 'Kelola Kasir')
@section('konten')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-black text-neutral-900 tracking-tight">Daftar Karyawan</h2>
            <p class="text-xs text-neutral-500 mt-1">Buat akun kasir/admin, atur shift kerja, dan kelola hak akses sistem.</p>
        </div>
        <a href="{{ route('admin.users.CreateKasir') }}" onclick="if(window.innerWidth >= 768) { event.preventDefault(); openModal('create-user-modal'); }" class="inline-flex items-center justify-center gap-2 rounded-lg bg-sky-500 px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-sky-600 shadow-sm w-fit cursor-pointer">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Akun Karyawan
        </a>
    </div>

    <div class="hidden md:block bg-white rounded-2xl border border-neutral-200/60 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="text-neutral-400 border-b border-neutral-100 text-[10px] font-bold tracking-wider bg-neutral-50/50">
                        <th class="p-4 font-bold">Foto</th>
                        <th class="p-4 font-bold">Nama Karyawan</th>
                        <th class="p-4 font-bold">Gmail</th>
                        <th class="p-4 font-bold">Role</th>
                        <th class="p-4 font-bold">Shift Kerja</th>
                        <th class="p-4 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-100 text-neutral-600">
                    @forelse($users as $user)
                        <tr class="hover:bg-neutral-50/30 transition-colors">
                            <td class="p-4 whitespace-nowrap">
                                <div class="h-10 w-10 rounded-full overflow-hidden border border-neutral-200/80 shrink-0 aspect-square">
                                    @if($user->profile_picture)
                                        <img src="{{ asset($user->profile_picture) }}" alt="Profil {{ $user->name }}" class="h-full w-full object-cover">
                                    @else
                                        <div class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-bold text-xs uppercase">
                                            {{ substr($user->name, 0, 2) }}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="p-4 font-bold text-neutral-800 whitespace-nowrap">
                                {{ $user->name }}
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                {{ $user->email }}
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                @if($user->role === 'admin')
                                    <span class="inline-flex items-center gap-0.5 rounded bg-sky-50 px-2 py-0.5 text-[10px] font-bold text-sky-700 border border-sky-100">
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-0.5 rounded bg-emerald-50 px-2 py-0.5 text-[10px] font-bold text-emerald-700 border border-emerald-100">
                                        Kasir
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                @if($user->shift)
                                    <span class="inline-flex items-center gap-0.5 rounded bg-neutral-100 px-2 py-0.5 text-[10px] font-semibold text-neutral-700 border border-neutral-200">
                                        {{ $user->shift }}
                                    </span>
                                @else
                                    <span class="text-neutral-400 italic text-[11px]">Tanpa Shift</span>
                                @endif
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" onclick="openEditModal({{ json_encode($user) }})" class="inline-flex h-7 w-7 items-center justify-center rounded bg-amber-50 text-amber-600 border border-amber-100 hover:bg-amber-100 transition-colors cursor-pointer">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                    @if(auth()->id() !== $user->id)
                                        <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('admin.users.delete', $user->id) }}" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" onclick="confirmDelete(event, '{{ $user->name }}', 'delete-form-{{ $user->id }}')" class="inline-flex h-7 w-7 items-center justify-center rounded bg-rose-50 text-rose-600 border border-rose-100 hover:bg-rose-100 transition-colors cursor-pointer">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-neutral-400 italic">
                                Belum ada data karyawan terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="block md:hidden space-y-4">
        @forelse($users as $user)
            <div class="bg-white rounded-2xl border border-neutral-200/60 p-5 flex flex-col justify-between gap-4">
                <div class="flex flex-col items-center text-center">
                    <div class="h-16 w-16 rounded-full overflow-hidden border border-neutral-200/80 shrink-0 aspect-square">
                        @if($user->profile_picture)
                            <img src="{{ asset($user->profile_picture) }}" alt="Profil {{ $user->name }}" class="h-full w-full object-cover">
                        @else
                            <div class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-base uppercase">
                                {{ substr($user->name, 0, 2) }}
                            </div>
                        @endif
                    </div>
                    <p class="text-sm font-black text-neutral-900 mt-3">{{ $user->name }}</p>
                    <div class="mt-1.5">
                        @if($user->role === 'admin')
                            <span class="inline-flex items-center gap-0.5 rounded-md bg-sky-50 px-2.5 py-0.5 text-[9px] font-bold text-sky-700 border border-sky-100">
                                Admin
                            </span>
                        @else
                            <span class="inline-flex items-center gap-0.5 rounded-md bg-emerald-50 px-2.5 py-0.5 text-[9px] font-bold text-emerald-700 border border-emerald-100">
                                Kasir
                            </span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3.5 border-t border-neutral-100 pt-3.5 text-xs text-neutral-600">
                    <div>
                        <span class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider block">Gmail</span>
                        <span class="font-semibold text-neutral-800 break-all block mt-0.5">{{ $user->email }}</span>
                    </div>
                    <div>
                        <span class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider block">Shift Kerja</span>
                        @if($user->shift)
                            <span class="inline-flex items-center gap-0.5 rounded bg-neutral-100 px-1.5 py-0.5 text-[10px] font-semibold text-neutral-700 border border-neutral-200 mt-0.5">
                                {{ $user->shift }}
                            </span>
                        @else
                            <span class="text-neutral-400 italic text-[11px] block mt-0.5">Tanpa Shift</span>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-neutral-100 pt-3.5">
                    <a href="{{ route('admin.users.EditKasir', $user->id) }}" 
                       class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-amber-50 text-xs font-bold text-amber-600 border border-amber-100 hover:bg-amber-100 transition active:scale-98 cursor-pointer text-center">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Ubah
                    </a>
                    @if(auth()->id() !== $user->id)
                        <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('admin.users.delete', $user->id) }}" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="button" 
                                onclick="confirmDelete(event, '{{ $user->name }}', 'delete-form-{{ $user->id }}')" 
                                class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-rose-50 text-xs font-bold text-rose-600 border border-rose-100 hover:bg-rose-100 transition active:scale-98 cursor-pointer">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            Hapus
                        </button>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl border border-neutral-200/60 p-8 text-center text-neutral-400 italic text-xs">
                Belum ada data karyawan terdaftar.
            </div>
        @endforelse
    </div>
</div>

<!-- TAMBAH KARYAWAN-->
<div id="create-user-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
    <div class="bg-white rounded-2xl max-w-lg w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
        <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
            <h3 class="text-sm font-bold text-neutral-900">Tambah Karyawan Baru</h3>
            <button type="button" onclick="closeModal('create-user-modal')" class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="overflow-y-auto max-h-[78vh] p-6 space-y-6">
            @csrf
            
            <div class="flex flex-col items-center justify-center pb-5 border-b border-neutral-100">
                <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest mb-3">Foto Profil</span>
                <div class="relative group cursor-pointer">
                    <input id="create_profile_picture" name="profile_picture" type="file" accept="image/*" class="hidden">
                    <label for="create_profile_picture" class="cursor-pointer block relative">
                        <div class="h-20 w-20 rounded-full bg-gradient-to-tr from-neutral-50 to-neutral-100 border-2 border-neutral-200 flex items-center justify-center overflow-hidden transition duration-350 group-hover:scale-102 group-hover:border-sky-400 relative">
                            <img id="create-avatar-preview" src="#" alt="Preview" class="hidden h-full w-full object-cover">
                            <svg id="create-avatar-placeholder" class="h-8 w-8 text-neutral-300 transition group-hover:text-sky-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <div class="absolute inset-0 bg-neutral-950/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                </svg>
                            </div>
                        </div>
                    </label>
                </div>
                <span class="text-[9px] text-neutral-400 mt-2 font-medium">Ketuk untuk unggah foto.</span>
                @error('profile_picture')
                    @if(!old('edit_user_id'))
                        <p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                    @endif
                @enderror
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div class="space-y-2">
                    <label for="create_name" class="block text-xs font-bold text-neutral-700">Nama Karyawan</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </span>
                        <input id="create_name" name="name" type="text" value="{{ old('edit_user_id') ? '' : old('name') }}" required placeholder="Nama lengkap karyawan" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    </div>
                    @error('name')
                        @if(!old('edit_user_id'))
                            <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="create_email" class="block text-xs font-bold text-neutral-700">Gmail</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <input id="create_email" name="email" type="email" value="{{ old('edit_user_id') ? '' : old('email') }}" required placeholder="contoh@gmail.com" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    </div>
                    @error('email')
                        @if(!old('edit_user_id'))
                            <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                        @endif
                    @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label for="create_password" class="block text-xs font-bold text-neutral-700">Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </span>
                    <input id="create_password" name="password" type="password" required placeholder="Minimal 4 karakter" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-10 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    <button type="button" onclick="togglePassword('create_password', this)" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                        <svg class="eye-show h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg class="eye-hide h-4.5 w-4.5 hidden" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.895 7.895L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    @if(!old('edit_user_id'))
                        <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                    @endif
                @enderror
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div class="space-y-2">
                    <label for="create_role" class="block text-xs font-bold text-neutral-700">Role Akses</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>
                        </span>
                        <select id="create_role" name="role" required class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                            <option value="kasir" {{ (old('role') === 'kasir' && !old('edit_user_id')) ? 'selected' : '' }}>Kasir</option>
                            <option value="admin" {{ (old('role') === 'admin' && !old('edit_user_id')) ? 'selected' : '' }}>Admin</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="create_shift" class="block text-xs font-bold text-neutral-700">Shift Kerja</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                        <select id="create_shift" name="shift" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                            <option value="" {{ (old('shift') === '' && !old('edit_user_id')) ? 'selected' : '' }}>Tanpa Shift (Default/Kantor)</option>
                            <option value="Pagi" {{ (old('shift') === 'Pagi' && !old('edit_user_id')) ? 'selected' : '' }}>Shift Pagi</option>
                            <option value="Siang" {{ (old('shift') === 'Siang' && !old('edit_user_id')) ? 'selected' : '' }}>Shift Siang</option>
                            <option value="Malam" {{ (old('shift') === 'Malam' && !old('edit_user_id')) ? 'selected' : '' }}>Shift Malam</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-neutral-100 flex items-center justify-end gap-3.5">
                <button type="button" onclick="closeModal('create-user-modal')" class="rounded-xl border border-neutral-200 bg-white px-5 py-3 text-xs font-bold text-neutral-500 transition hover:bg-neutral-50 hover:text-neutral-800 cursor-pointer">Batalkan</button>
                <button type="submit" class="rounded-xl bg-sky-500 px-6 py-3 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 cursor-pointer">Simpan Karyawan</button>
            </div>
        </form>
    </div>
</div>

<!-- UBAH KARYAWAN -->
<div id="edit-user-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
    <div class="bg-white rounded-2xl max-w-lg w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
        <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
            <h3 class="text-sm font-bold text-neutral-900">Ubah Data Karyawan</h3>
            <button type="button" onclick="closeModal('edit-user-modal')" class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form id="edit-user-form" method="POST" action="" enctype="multipart/form-data" class="overflow-y-auto max-h-[78vh] p-6 space-y-6">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="edit_user_id" id="edit_user_id_field" value="">

            <div class="flex flex-col items-center justify-center pb-5 border-b border-neutral-100">
                <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest mb-3">Foto Profil</span>
                <div class="relative group cursor-pointer">
                    <input id="edit_profile_picture" name="profile_picture" type="file" accept="image/*" class="hidden">
                    <label for="edit_profile_picture" class="cursor-pointer block relative">
                        <div class="h-20 w-20 rounded-full bg-gradient-to-tr from-neutral-50 to-neutral-100 border-2 border-neutral-200 flex items-center justify-center overflow-hidden transition duration-350 group-hover:scale-102 group-hover:border-sky-400 relative">
                            <img id="edit-avatar-preview" src="#" alt="Preview" class="hidden h-full w-full object-cover">
                            <div id="edit-avatar-placeholder" class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-bold text-sm uppercase"></div>
                            <div class="absolute inset-0 bg-neutral-950/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                </svg>
                            </div>
                        </div>
                    </label>
                </div>
                <span class="text-[9px] text-neutral-400 mt-2 font-medium">Ketuk untuk ubah foto.</span>
                @error('profile_picture')
                    @if(old('edit_user_id'))
                        <p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                    @endif
                @enderror
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div class="space-y-2">
                    <label for="edit_name" class="block text-xs font-bold text-neutral-700">Nama Karyawan</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </span>
                        <input id="edit_name" name="name" type="text" required placeholder="Nama lengkap karyawan" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    </div>
                    @error('name')
                        @if(old('edit_user_id'))
                            <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="edit_email" class="block text-xs font-bold text-neutral-700">Gmail</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <input id="edit_email" name="email" type="email" required placeholder="contoh@gmail.com" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    </div>
                    @error('email')
                        @if(old('edit_user_id'))
                            <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                        @endif
                    @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label for="edit_password" class="block text-xs font-bold text-neutral-700">Kata Sandi Baru</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </span>
                    <input id="edit_password" name="password" type="password" placeholder="Kosongkan jika tidak ingin mengubah kata sandi" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-10 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    <button type="button" onclick="togglePassword('edit_password', this)" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                        <svg class="eye-show h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg class="eye-hide h-4.5 w-4.5 hidden" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.895 7.895L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    @if(old('edit_user_id'))
                        <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                    @endif
                @enderror
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div class="space-y-2">
                    <label for="edit_role" class="block text-xs font-bold text-neutral-700">Role Akses</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>
                        </span>
                        <select id="edit_role" name="role" required class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                            <option value="kasir">Kasir</option>
                            <option value="admin">Admin</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="edit_shift" class="block text-xs font-bold text-neutral-700">Shift Kerja</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                        <select id="edit_shift" name="shift" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                            <option value="">Tanpa Shift (Default/Kantor)</option>
                            <option value="Pagi">Shift Pagi</option>
                            <option value="Siang">Shift Siang</option>
                            <option value="Malam">Shift Malam</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-neutral-100 flex items-center justify-end gap-3.5">
                <button type="button" onclick="closeModal('edit-user-modal')" class="rounded-xl border border-neutral-200 bg-white px-5 py-3 text-xs font-bold text-neutral-500 transition hover:bg-neutral-50 hover:text-neutral-800 cursor-pointer">Batalkan</button>
                <button type="submit" class="rounded-xl bg-sky-500 px-6 py-3 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 cursor-pointer">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>


<!-- HAPUS -->
<div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
    <div id="delete-modal-card" class="bg-white rounded-2xl p-6 max-w-sm w-full border border-neutral-100 scale-95 opacity-0 transition-all duration-200 flex flex-col items-center text-center space-y-4">
        <div class="h-12 w-12 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center border border-rose-100 animate-pulse">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </div>
        
        <div class="space-y-1.5">
            <h3 class="text-sm font-extrabold text-neutral-900 tracking-tight">Hapus Akun Karyawan?</h3>
            <p class="text-[11px] text-neutral-500 leading-relaxed px-1">Apakah Anda yakin ingin menghapus akun karyawan <strong id="delete-modal-name" class="text-neutral-800 font-bold"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
        </div>

        <div class="flex items-center gap-3 w-full pt-2">
            <button type="button" id="delete-modal-cancel" class="flex-1 px-4 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition active:scale-98 cursor-pointer">Batal</button>
            <button type="button" id="delete-modal-confirm" class="flex-1 px-4 py-2.5 rounded-xl bg-rose-500 text-xs font-bold text-white hover:bg-rose-600 transition active:scale-98 cursor-pointer">Hapus</button>
        </div>
    </div>
</div>
<div id="users-page-data" 
     data-auth-id="{{ auth()->id() }}" 
     data-has-errors="{{ $errors->any() ? 'true' : 'false' }}" 
     data-old-edit-user-id="{{ old('edit_user_id') }}" 
     data-old-name="{{ old('name') }}" 
     data-old-email="{{ old('email') }}" 
     data-old-role="{{ old('role') }}" 
     data-old-shift="{{ old('shift') }}" 
     data-session-open-create-modal="{{ session('open_create_modal') ? 'true' : 'false' }}" 
     data-session-open-edit-modal-id="{{ session('open_edit_modal_id') }}" 
     data-users-json="{{ json_encode($users) }}"
     class="hidden">
</div>
@endsection
