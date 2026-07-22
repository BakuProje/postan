@extends('layouts.admin')
@section('title', 'Profil Saya')
@section('konten')
    <div class="w-full relative px-4 sm:px-0 py-4 text-left">
        <!-- Decorative Background Elements -->
        <div
            class="absolute -top-10 -right-10 -z-10 h-32 w-32 rounded-full bg-gradient-to-br from-white/80 via-sky-50/30 to-sky-200/10 border border-white/50 shadow-[inset_4px_4px_12px_rgba(255,255,255,0.9),inset_-4px_-4px_12px_rgba(14,165,233,0.06)] pointer-events-none">
        </div>
        <div
            class="absolute -bottom-12 -left-12 -z-10 h-36 w-36 rounded-full bg-gradient-to-br from-white/70 via-sky-50/20 to-sky-100/10 border border-white/40 shadow-[inset_6px_6px_16px_rgba(255,255,255,0.8),inset_-6px_-6px_16px_rgba(14,165,233,0.08)] pointer-events-none">
        </div>

        @if ($user->role === 'kasir')
            <!-- 1. Header Profile Card -->
            <div
                class="bg-gradient-to-r from-sky-50/50 via-white to-sky-50/20 backdrop-blur-md rounded-3xl border border-neutral-200/60 p-6 shadow-sm mb-6 flex flex-col lg:flex-row items-start justify-between gap-6 relative overflow-hidden text-left w-full">
                <div class="absolute -right-16 -top-16 h-36 w-36 rounded-full bg-sky-200/20 blur-2xl pointer-events-none">
                </div>

                <!-- Left: Avatar, Name, Status -->
                <div class="flex flex-col sm:flex-row items-start gap-5 z-10 text-left w-full lg:w-auto">
                    <div class="flex flex-col items-start gap-2 shrink-0">
                        <div class="relative group cursor-pointer"
                            onclick="document.getElementById('profile_picture_input').click()"
                            title="Klik logo profil untuk mengubah foto profil">
                            <div
                                class="h-24 w-24 rounded-full bg-gradient-to-tr from-sky-500 to-blue-600 p-1 shadow-md flex items-center justify-center relative transition hover:scale-102">
                                <div
                                    class="h-full w-full rounded-full overflow-hidden border-2 border-white relative bg-white">
                                    <img id="avatar-preview"
                                        src="{{ $user->profile_picture ? asset($user->profile_picture) : '' }}"
                                        alt="Preview"
                                        class="h-full w-full object-cover {{ $user->profile_picture ? '' : 'hidden' }}">
                                    <div id="avatar-placeholder"
                                        class="h-full w-full bg-sky-100 text-sky-600 flex items-center justify-center font-black text-2xl uppercase {{ $user->profile_picture ? 'hidden' : '' }}">
                                        {{ substr($user->name, 0, 2) }}
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
                                <span
                                    class="absolute bottom-1 right-1 h-5 w-5 rounded-full bg-emerald-500 border-2 border-white flex items-center justify-center shadow-sm">
                                    <span class="h-1.5 w-1.5 rounded-full bg-white"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="text-left w-full sm:w-auto">
                        <h2 class="text-2xl font-black text-neutral-900 tracking-tight">{{ $user->name }}</h2>
                        <div class="flex items-center justify-start gap-2 mt-1.5">
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-100 text-[10px] font-extrabold text-emerald-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Kasir Aktif
                            </span>
                        </div>
                        <p class="text-xs text-neutral-500 font-semibold mt-2">Sedang bertugas</p>
                    </div>
                </div>

                <!-- Right: Info cards grid (Outlet, Role, Shift Saat Ini, Shift Kerja, Login Terakhir, Bergabung) -->
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 gap-3 w-full lg:w-auto self-stretch items-center z-10 text-left">
                    <!-- Outlet -->
                    <div
                        class="bg-white/60 rounded-2xl border border-neutral-200/50 p-3.5 flex items-center gap-2.5 shrink-0 text-left min-w-[135px]">
                        <div
                            class="h-8.5 w-8.5 rounded-xl bg-indigo-50 text-indigo-550 flex items-center justify-center border border-indigo-100/50 shadow-3xs shrink-0">
                            <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06 1.437l1.19 1.19a3.004 3.004 0 0 1-.621 4.72M6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[8px] font-bold text-neutral-400 uppercase tracking-wide">Outlet</p>
                            <p class="text-[11px] font-black text-neutral-855 truncate max-w-[95px]">
                                {{ $outlet ? $outlet->name : 'Strauz Cafe' }}</p>
                        </div>
                    </div>

                    <!-- Role -->
                    <div
                        class="bg-white/60 rounded-2xl border border-neutral-200/50 p-3.5 flex items-center gap-2.5 shrink-0 text-left min-w-[135px]">
                        <div
                            class="h-8.5 w-8.5 rounded-xl bg-sky-50 text-sky-550 flex items-center justify-center border border-sky-100/50 shadow-3xs shrink-0">
                            <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[8px] font-bold text-neutral-400 uppercase tracking-wide">Role</p>
                            <p class="text-[11px] font-black text-neutral-855">{{ ucfirst($user->role) }}</p>
                        </div>
                    </div>

                    <!-- Shift Saat Ini -->
                    <div
                        class="bg-white/60 rounded-2xl border border-neutral-200/50 p-3.5 flex items-center gap-2.5 shrink-0 text-left min-w-[135px]">
                        <div
                            class="h-8.5 w-8.5 rounded-xl bg-purple-50 text-purple-555 flex items-center justify-center border border-purple-100/50 shadow-3xs shrink-0">
                            <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.5 1.5 0 0 0 2.122 0l4.318-4.318a1.5 1.5 0 0 0 0-2.122L11.16 3.659A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[8px] font-bold text-neutral-400 uppercase tracking-wide">Shift Saat Ini</p>
                            <p class="text-[11px] font-black text-neutral-855">{{ $user->shift ?: 'Malam' }}</p>
                        </div>
                    </div>

                    <!-- Shift Kerja -->
                    <div
                        class="bg-white/60 rounded-2xl border border-neutral-200/50 p-3.5 flex items-center gap-2.5 shrink-0 text-left min-w-[135px]">
                        <div
                            class="h-8.5 w-8.5 rounded-xl bg-orange-50 text-orange-555 flex items-center justify-center border border-orange-100/50 shadow-3xs shrink-0">
                            <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[8px] font-bold text-neutral-400 uppercase tracking-wide">Shift Kerja</p>
                            <p class="text-[11px] font-black text-neutral-855">{{ $user->shift_hours ?: '20:00 - 05:00' }}
                            </p>
                        </div>
                    </div>

                    <!-- Login Terakhir -->
                    <div
                        class="bg-white/60 rounded-2xl border border-neutral-200/50 p-3.5 flex items-center gap-2.5 shrink-0 text-left min-w-[135px]">
                        <div
                            class="h-8.5 w-8.5 rounded-xl bg-blue-50 text-blue-555 flex items-center justify-center border border-blue-100/50 shadow-3xs shrink-0">
                            <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9v5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[8px] font-bold text-neutral-400 uppercase tracking-wide">Login Terakhir</p>
                            <p class="text-[11px] font-black text-neutral-855">
                                {{ $user->last_login_at ? $user->last_login_at->format('d M Y, H:i') : '22 Jul 2026, 20:36' }}
                            </p>
                        </div>
                    </div>

                    <!-- Bergabung -->
                    <div
                        class="bg-white/60 rounded-2xl border border-neutral-200/50 p-3.5 flex items-center gap-2.5 shrink-0 text-left min-w-[135px]">
                        <div
                            class="h-8.5 w-8.5 rounded-xl bg-emerald-50 text-emerald-555 flex items-center justify-center border border-emerald-100/50 shadow-3xs shrink-0">
                            <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5a2.25 2.25 0 0 1 2.25 1.25" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[8px] font-bold text-neutral-400 uppercase tracking-wide">Bergabung</p>
                            <p class="text-[11px] font-black text-neutral-855">
                                {{ $user->created_at ? $user->created_at->format('d M Y') : '12 Jan 2025' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Metric Cards Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6 text-left w-full">
                <!-- Card 1: Transaksi Hari Ini -->
                <div
                    class="bg-white rounded-2xl border border-neutral-200/60 p-5 flex items-center justify-between shadow-2xs text-left">
                    <div class="flex items-center gap-4 text-left">
                        <div
                            class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-555 flex items-center justify-center shrink-0 border border-blue-100/50">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-[11px] font-bold text-neutral-500 capitalize tracking-wide">Transaksi Hari Ini
                            </p>
                            <h3 class="text-lg font-black text-neutral-900 mt-0.5">{{ $todayTransactionsCount }}</h3>
                            <p class="text-[9px] font-semibold text-neutral-400">Transaksi</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Pendapatan Hari Ini -->
                <div
                    class="bg-white rounded-2xl border border-neutral-200/60 p-5 flex items-center justify-between shadow-2xs text-left">
                    <div class="flex items-center gap-4 text-left">
                        <div
                            class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-555 flex items-center justify-center shrink-0 border border-emerald-100/50">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5M3.75 20.25h16.5M3 7.5h18M3 16.5h18m-18-9v9m18-9v9" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-[11px] font-bold text-neutral-500 capitalize tracking-wide">Pendapatan Hari Ini
                            </p>
                            <h3 class="text-lg font-black text-neutral-900 mt-0.5">Rp
                                {{ number_format($todayRevenue, 0, ',', '.') }}</h3>
                            <p class="text-[9px] font-semibold text-neutral-400">Total Penjualan</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Jam Kerja Hari Ini -->
                <div
                    class="bg-white rounded-2xl border border-neutral-200/60 p-5 flex items-center justify-between shadow-2xs text-left">
                    <div class="flex items-center gap-4 text-left">
                        <div
                            class="h-12 w-12 rounded-2xl bg-purple-50 text-purple-555 flex items-center justify-center shrink-0 border border-purple-100/50">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-[11px] font-bold text-neutral-500 capitalize tracking-wide">Jam Kerja Hari Ini
                            </p>
                            <h3 class="text-lg font-black text-neutral-900 mt-0.5">{{ $workDurationStr }}</h3>
                            <p class="text-[9px] font-semibold text-neutral-400">Durasi Shift</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Status Akun -->
                <div
                    class="bg-white rounded-2xl border border-neutral-200/60 p-5 flex items-center justify-between shadow-2xs text-left">
                    <div class="flex items-center gap-4 text-left">
                        <div
                            class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-555 flex items-center justify-center shrink-0 border border-amber-100/50">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-[11px] font-bold text-neutral-500 capitalize tracking-wide">Status Akun</p>
                            <h3 class="text-lg font-black text-neutral-900 mt-0.5">Aktif</h3>
                            <p class="text-[9px] font-semibold text-neutral-400">Akun Anda aman</p>
                            <div class="flex items-center gap-1.5 mt-2">
                                <span
                                    class="inline-block rounded bg-emerald-50 border border-emerald-100 px-2 py-0.5 text-[9px] font-bold text-emerald-600">Terverifikasi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Bottom Panels Section -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start text-left w-full">
                <!-- Panel 1: Informasi Profil -->
                <div class="lg:col-span-5 bg-white rounded-3xl border border-neutral-200/60 p-6 shadow-2xs text-left">
                    <div class="flex items-center gap-3 mb-6 text-left">
                        <div
                            class="h-9 w-9 rounded-xl bg-blue-50 text-blue-500 flex items-center justify-center border border-blue-100/50">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h4 class="text-sm font-extrabold text-neutral-850 tracking-tight">Informasi Profil</h4>
                            <p class="text-[10px] text-neutral-500 font-bold">Kelola informasi akun Anda</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data"
                        class="space-y-4 text-left">
                        @csrf
                        @method('PUT')

                        <!-- Hidden File Input for photo upload -->
                        <input id="profile_picture_input" name="profile_picture" type="file" accept="image/*"
                            class="hidden" onchange="previewAvatar(this)">

                        <div class="space-y-1.5 text-left">
                            <label for="name" class="block text-xs font-bold text-neutral-700">Nama Lengkap</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-neutral-400">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </span>
                                <input id="name" name="name" type="text"
                                    value="{{ old('name', $user->name) }}" required
                                    class="block w-full rounded-xl border border-neutral-200 bg-white pl-11 pr-4 py-3 text-xs outline-none transition duration-200 focus:border-sky-500 focus:ring-4 focus:ring-sky-100/50">
                            </div>
                            @error('name')
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5 text-left">
                            <label for="email" class="block text-xs font-bold text-neutral-700">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-neutral-400">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                </span>
                                <input id="email" name="email" type="email"
                                    value="{{ old('email', $user->email) }}" required
                                    class="block w-full rounded-xl border border-neutral-200 bg-white pl-11 pr-4 py-3 text-xs outline-none transition duration-200 focus:border-sky-500 focus:ring-4 focus:ring-sky-100/50">
                            </div>
                            @error('email')
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5 text-left">
                            <label for="password" class="block text-xs font-bold text-neutral-700">Kata Sandi Baru</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-neutral-400">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>
                                </span>
                                <input id="password" name="password" type="password"
                                    placeholder="Kosongkan jika tidak ingin mengubah kata sandi"
                                    class="block w-full rounded-xl border border-neutral-200 bg-white pl-11 pr-10 py-3 text-xs outline-none transition duration-200 focus:border-sky-500 focus:ring-4 focus:ring-sky-100/50">
                            </div>
                            @error('password')
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full mt-4 rounded-xl bg-blue-650 py-3.5 text-xs font-extrabold text-white transition hover:bg-blue-750 active:scale-98 cursor-pointer shadow-md shadow-blue-500/10 flex items-center justify-center gap-1.5">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </form>
                </div>

                <!-- Panel 2: PIN Keamanan -->
                <div class="lg:col-span-3 bg-white rounded-3xl border border-neutral-200/60 p-6 shadow-2xs text-left">
                    <div class="flex items-center gap-3 mb-6 text-left">
                        <div
                            class="h-9 w-9 rounded-xl bg-indigo-50 text-indigo-500 flex items-center justify-center border border-indigo-100/50">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h4 class="text-sm font-extrabold text-neutral-800 tracking-tight">PIN KEAMANAN</h4>
                        </div>
                    </div>
                    <p class="text-[10px] text-neutral-500 font-bold mb-4 text-left">PIN digunakan untuk verifikasi saat
                        kasir melanjutkan shift.</p>

                    <!-- Sleek modern blue passcode indicator block without dots -->
                    <div
                        class="bg-blue-50/40 border border-blue-100/70 rounded-2xl p-5 flex flex-col items-center justify-center mb-4 text-center min-h-[90px]">
                        <span class="text-xs font-black text-blue-650 uppercase tracking-widest">PIN Anda</span>
                    </div>

                    <!-- PIN Update Info row -->
                    <div class="flex items-center justify-between pb-3 border-b border-neutral-100 mb-3 text-left">
                        <div>
                            <p class="text-[9px] font-bold text-neutral-400 uppercase">PIN Terakhir Diubah</p>
                            <p class="text-[11px] font-extrabold text-neutral-750 mt-0.5">
                                {{ $user->updated_at ? $user->updated_at->translatedFormat('d F Y') : '20 Juli 2026' }}
                            </p>
                        </div>
                        <svg class="h-5 w-5 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>

                    <!-- Status card -->
                    <div
                        class="border border-neutral-100 rounded-xl p-3 flex items-center justify-between mb-4 bg-neutral-50/30 text-left">
                        <span class="text-[11px] font-bold text-neutral-500 text-left">Status</span>
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-[10px] font-extrabold text-emerald-600">
                            <svg class="h-3.5 w-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24"
                                stroke-width="3" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            Terverifikasi
                        </span>
                    </div>

                    <button type="button" onclick="openChangePinModal()"
                        class="w-full rounded-xl border border-blue-600 bg-white text-blue-650 py-3.5 text-xs font-extrabold flex items-center justify-center gap-2 transition duration-200 shadow-2xs hover:bg-blue-50 active:scale-98 cursor-pointer">
                        <svg class="h-4 w-4 text-blue-650" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        Ubah PIN
                    </button>
                </div>

                <!-- Panel 3: Stop Shift -->
                <div class="lg:col-span-4 bg-white rounded-3xl border border-neutral-200/60 p-6 shadow-2xs text-left">
                    <div class="flex items-center gap-3 mb-6 text-left">
                        <div
                            class="h-9 w-9 rounded-xl bg-rose-50 text-rose-500 flex items-center justify-center border border-rose-100/50">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h4 class="text-sm font-extrabold text-neutral-800 tracking-tight">Stop Shift</h4>
                        </div>
                    </div>
                    <p class="text-[10px] text-neutral-500 font-bold mb-4 text-left">Akhiri shift kasir saat ini jika Anda
                        sudah selesai bekerja.</p>

                    <!-- Shift Time Grid Details -->
                    <div class="bg-rose-50/20 border border-rose-100/30 rounded-2xl p-4.5 space-y-4 mb-4 text-left">
                        <div class="flex justify-between items-center text-left">
                            <span class="text-[10px] font-bold text-neutral-450 uppercase text-left">Jam Masuk</span>
                            <div class="text-right">
                                <p class="text-xs font-black text-neutral-800">{{ $shiftStartTimeStr }}</p>
                                <p class="text-[9px] font-bold text-neutral-500 mt-0.5">{{ $shiftStartDateStr }}</p>
                            </div>
                        </div>

                        <div class="flex justify-between items-center text-left border-t border-neutral-100/40 pt-3">
                            <span class="text-[10px] font-bold text-neutral-450 uppercase text-left">Estimasi Pulang</span>
                            <div class="text-right">
                                <p class="text-xs font-black text-neutral-800">{{ $estimasiPulangTimeStr }}</p>
                                <p class="text-[9px] font-bold text-neutral-500 mt-0.5">{{ $estimasiPulangDateStr }}</p>
                            </div>
                        </div>

                        <div class="flex justify-between items-center text-left border-t border-neutral-100/40 pt-3">
                            <span class="text-[10px] font-bold text-neutral-450 uppercase text-left">Durasi Shift</span>
                            <p class="text-xs font-black text-rose-600">{{ $workDurationStr }}</p>
                        </div>
                    </div>

                    @php
                        $activeShift = Auth::user()->activeShiftLog();
                    @endphp
                    <button type="button" onclick="handleStopShiftFromProfile({{ $activeShift ? 'true' : 'false' }})"
                        class="w-full rounded-xl bg-rose-600 py-3.5 text-xs font-extrabold text-white flex items-center justify-center gap-2 transition hover:bg-rose-700 active:scale-98 cursor-pointer shadow-md shadow-rose-500/10">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                        </svg>
                        Akhiri Shift Sekarang
                    </button>
                </div>
            </div>

            <!-- Avatar preview script moved to profile.js -->
        @else
            <!-- CENTERED 1-COLUMN FOR ADMIN -->
            <div
                class="bg-white/80 backdrop-blur-md rounded-3xl border border-white/60 p-8 sm:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.02),inset_0_1px_0_rgba(255,255,255,0.8)] relative overflow-hidden">
                <div
                    class="absolute top-[8%] right-[5%] h-14 w-14 rounded-full bg-gradient-to-br from-white/80 via-sky-50/25 to-sky-200/15 border border-white/50 shadow-[inset_3px_3px_8px_rgba(255,255,255,0.9),inset_-3px_-3px_8px_rgba(14,165,233,0.12)] pointer-events-none">
                </div>

                <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data"
                    class="space-y-8 relative z-10">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col items-center justify-center pb-8 border-b border-neutral-100/60">
                        <span class="text-[10px] font-bold text-neutral-400 tracking-wider uppercase mb-4">Foto
                            Profil</span>
                        <div class="relative group cursor-pointer">
                            <input id="profile_picture" name="profile_picture" type="file" accept="image/*"
                                class="hidden">
                            <label for="profile_picture" class="cursor-pointer block relative">
                                <div
                                    class="h-28 w-28 rounded-full bg-gradient-to-tr from-white to-sky-50 p-1.5 shadow-[4px_4px_12px_rgba(0,0,0,0.03),-4px_-4px_12px_rgba(255,255,255,0.9),inset_2px_2px_4px_rgba(0,0,0,0.02)] flex items-center justify-center border border-white/80 transition duration-300 group-hover:scale-102 group-hover:shadow-[6px_6px_16px_rgba(0,0,0,0.05),-6px_-6px_16px_rgba(255,255,255,0.95)]">
                                    <div
                                        class="h-full w-full rounded-full overflow-hidden border border-neutral-200/50 relative">
                                        @if ($user->profile_picture)
                                            <img id="avatar-preview" src="{{ asset($user->profile_picture) }}"
                                                alt="Preview" class="h-full w-full object-cover">
                                        @else
                                            <div id="avatar-placeholder"
                                                class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-sm uppercase">
                                                {{ substr($user->name, 0, 2) }}
                                            </div>
                                        @endif
                                        <div
                                            class="absolute inset-0 bg-neutral-950/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition duration-300">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <span class="text-[10px] text-neutral-400 mt-3 font-semibold tracking-wide">Ketuk untuk ubah
                            foto.</span>
                        @error('profile_picture')
                            <p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="space-y-2">
                            <label for="name" class="block text-xs font-bold text-neutral-700">Nama Karyawan</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-neutral-400">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </span>
                                <input id="name" name="name" type="text"
                                    value="{{ old('name', $user->name) }}" required placeholder="Nama lengkap Anda"
                                    class="block w-full rounded-2xl border border-neutral-200/80 bg-neutral-50/50 pl-11 pr-4 py-3.5 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 shadow-[inset_1px_1px_3px_rgba(0,0,0,0.02)] @error('name') border-rose-500 @enderror">
                            </div>
                            @error('name')
                                <p class="text-xs text-rose-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-xs font-bold text-neutral-700">Gmail</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-neutral-400">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                </span>
                                <input id="email" name="email" type="email"
                                    value="{{ old('email', $user->email) }}" required placeholder="contoh@gmail.com"
                                    class="block w-full rounded-2xl border border-neutral-200/80 bg-neutral-50/50 pl-11 pr-4 py-3.5 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 shadow-[inset_1px_1px_3px_rgba(0,0,0,0.02)] @error('email') border-rose-500 @enderror">
                            </div>
                            @error('email')
                                <p class="text-xs text-rose-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-xs font-bold text-neutral-700">Kata Sandi Baru</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </span>
                            <input id="password" name="password" type="password"
                                placeholder="Kosongkan jika tidak ingin mengubah kata sandi"
                                class="block w-full rounded-2xl border border-neutral-200/80 bg-neutral-50/50 pl-11 pr-10 py-3.5 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 shadow-[inset_1px_1px_3px_rgba(0,0,0,0.02)] @error('password') border-rose-500 @enderror">
                            <button type="button" id="toggle-password"
                                class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                                <svg id="eye-show" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eye-hide" class="h-4.5 w-4.5 hidden" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.895 7.895L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-xs text-rose-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-6 border-t border-neutral-100 flex items-center justify-end">
                        <button type="submit"
                            class="w-full rounded-2xl bg-sky-500 py-3.5 text-xs font-bold text-white transition hover:bg-sky-600 active:scale-98 cursor-pointer shadow-md hover:shadow-sky-500/10">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        @endif
    </div>

    <!-- ACCESS LIMIT/CHANGE PIN MODAL -->
    @if ($user->role === 'kasir')
        <div id="change-pin-modal"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-250">
            <div id="change-pin-modal-card"
                class="bg-white text-neutral-900 rounded-3xl p-8 max-w-sm w-full border border-neutral-100 scale-95 opacity-0 transition-all duration-250 flex flex-col items-center text-center space-y-5 relative overflow-hidden shadow-2xl">
                <div class="absolute -top-24 -right-24 h-48 w-48 rounded-full bg-blue-50/50 blur-3xl pointer-events-none">
                </div>

                <div
                    class="h-16 w-16 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center border border-rose-100 shadow-3xs relative z-10">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                </div>

                <div class="space-y-2.5 relative z-10">
                    <h3 class="text-base font-black text-neutral-900 tracking-tight uppercase">Hubungi Administrator</h3>
                    <p class="text-xs text-neutral-500 leading-relaxed px-2 font-medium">
                        Untuk menjaga keamanan data transaksi, fitur perubahan PIN kasir dibatasi. Silakan hubungi <strong
                            class="text-neutral-800 font-extrabold">Admin/Owner</strong> untuk mengubah PIN Anda.
                    </p>
                </div>

                <div class="w-full pt-2 relative z-10">
                    <button type="button" onclick="closeChangePinModal()"
                        class="w-full py-3.5 rounded-xl bg-sky-500 hover:bg-sky-600 text-xs font-black text-white transition active:scale-98 cursor-pointer shadow-md shadow-sky-500/10">
                        Mengerti
                    </button>
                </div>
            </div>
        </div>
    @endif

    <script>
        window.hasPinErrors = @json($errors->has('pin'));
    </script>
    @vite('resources/js/profile.js')
@endsection
