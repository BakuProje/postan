@extends('layouts.admin')
@section('title', 'Tambah Karyawan Baru')
@section('konten')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="bg-white rounded-2xl border border-neutral-200/60 p-8">
        <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="flex flex-col items-center justify-center pb-6 border-b border-neutral-100">
                <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest mb-3">Foto Profil</span>
                
                <div class="relative group cursor-pointer">
                    <input id="profile_picture" name="profile_picture" type="file" accept="image/*" class="hidden">
                    <label for="profile_picture" class="cursor-pointer block relative">
                        
                        <div class="h-24 w-24 rounded-full bg-gradient-to-tr from-neutral-50 to-neutral-100 border-2 border-neutral-200 flex items-center justify-center overflow-hidden transition duration-350 group-hover:scale-102 group-hover:border-sky-400 relative">
                            <img id="avatar-preview" src="#" alt="Preview" class="hidden h-full w-full object-cover">
                            <svg id="avatar-placeholder" class="h-10 w-10 text-neutral-300 transition group-hover:text-sky-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                 
                            <div class="absolute inset-0 bg-neutral-950/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition duration-300">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                </svg>
                            </div>
                        </div>
                    </label>
                </div>
                
                <span class="text-[10px] text-neutral-400 mt-3 font-medium">Ketuk untuk unggah foto.</span>
                @error('profile_picture')<p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>@enderror
            </div>

     
            <div class="grid gap-6 sm:grid-cols-2">
                <div class="space-y-2">
                    <label for="name" class="block text-xs font-bold text-neutral-700">Nama Karyawan</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </span>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required placeholder="Nama lengkap karyawan" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 @error('name') border-rose-500 @enderror">
                    </div>
                    @error('name')<p class="text-xs text-rose-600 font-semibold">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-2">
                    <label for="email" class="block text-xs font-bold text-neutral-700">Gmail</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="contoh@gmail.com" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 @error('email') border-rose-500 @enderror">
                    </div>
                    @error('email')<p class="text-xs text-rose-600 font-semibold">{{ $message }}</p>@enderror
                </div>
            </div>

        
            <div class="space-y-2">
                <label for="password" class="block text-xs font-bold text-neutral-700">Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </span>
                    <input id="password" name="password" type="password" required placeholder="Minimal 4 karakter" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-10 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 @error('password') border-rose-500 @enderror">
                    <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                        <svg id="eye-show" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg id="eye-hide" class="h-4.5 w-4.5 hidden" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.895 7.895L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
                @error('password')<p class="text-xs text-rose-600 font-semibold">{{ $message }}</p>@enderror
            </div>

     
            <div class="grid gap-6 sm:grid-cols-2">
          
                <div class="space-y-2">
                    <label for="role" class="block text-xs font-bold text-neutral-700">Role Akses</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>
                        </span>
                        <select id="role" name="role" required class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                            <option value="kasir" {{ old('role') === 'kasir' ? 'selected' : '' }}>Kasir</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    @error('role')<p class="text-xs text-rose-600 font-semibold">{{ $message }}</p>@enderror
                </div>

        
                <div class="space-y-2">
                    <label for="shift" class="block text-xs font-bold text-neutral-700">Shift Kerja</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                        <select id="shift" name="shift" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                            <option value="" {{ old('shift') === '' ? 'selected' : '' }}>Tanpa Shift (Default/Kantor)</option>
                            <option value="Pagi" {{ old('shift') === 'Pagi' ? 'selected' : '' }}>Shift Pagi</option>
                            <option value="Siang" {{ old('shift') === 'Siang' ? 'selected' : '' }}>Shift Siang</option>
                            <option value="Malam" {{ old('shift') === 'Malam' ? 'selected' : '' }}>Shift Malam</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    @error('shift')<p class="text-xs text-rose-600 font-semibold">{{ $message }}</p>@enderror
                </div>
            </div>

            <!-- PIN Keamanan Section -->
            <div class="grid gap-6 sm:grid-cols-2 border-t border-neutral-100 pt-6">
                <div class="space-y-2">
                    <label for="pin" class="block text-xs font-bold text-neutral-700 font-extrabold">PIN Masuk Kasir</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v5.25M12 9v1.5M12 3v1.5M18 12h5.25M10.5 12H9M3 12h1.5" />
                            </svg>
                        </span>
                        <input id="pin" name="pin" type="text" pattern="[0-9]{4}" inputmode="numeric" maxlength="4" minlength="4" value="{{ old('pin') }}" placeholder="Kosongkan agar kasir membuat PIN sendiri saat login" class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    </div>
                    @error('pin')<p class="text-xs text-rose-600 font-semibold">{{ $message }}</p>@enderror
                </div>

                <div id="is_pin_unlocked_container" class="space-y-2">
                    <label for="is_pin_unlocked" class="block text-xs font-bold text-neutral-700 font-extrabold">Status Pengaturan PIN di Profil</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <select id="is_pin_unlocked" name="is_pin_unlocked" required class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                            <option value="1" {{ old('is_pin_unlocked', '0') === '1' ? 'selected' : '' }}>Open PIN (Kasir bisa ubah PIN)</option>
                            <option value="0" {{ old('is_pin_unlocked', '0') === '0' ? 'selected' : '' }}>Close PIN (Kasir tidak bisa ubah PIN)</option>
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
                <a href="{{ route('admin.users') }}" class="rounded-xl border border-neutral-200 bg-white px-5 py-3 text-xs font-bold text-neutral-500 transition hover:bg-neutral-50 hover:text-neutral-800">Batalkan</a>
                <button type="submit" class="rounded-xl bg-sky-500 px-6 py-3 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg hover:shadow-sky-100 active:scale-98 cursor-pointer">Simpan Karyawan</button>
            </div>
        </form>
    </div>
</div>

@vite('resources/js/kelola-kasir.js')
@endsection
