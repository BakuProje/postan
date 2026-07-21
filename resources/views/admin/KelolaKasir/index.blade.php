@extends('layouts.admin')
@section('title', '')
@section('konten')
    <div class="space-y-6 relative">
        <div
            class="relative bg-gradient-to-br from-sky-50/60 via-white/80 to-blue-50/50 rounded-2xl border border-sky-100/60 p-6 md:p-8 overflow-hidden">

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">
                <div class="max-w-xl">
                    <h2 class="text-2xl font-black text-neutral-900 tracking-tight">Kelola Kasir</h2>
                    <p class="text-xs text-neutral-500 mt-1.5 leading-relaxed">Kelola akun kasir/admin, atur shift kerja, dan
                        kelola hak akses sistem.</p>
                </div>

                <div class="relative z-10 flex flex-wrap items-center gap-2">
                    <button type="button" onclick="openModal('manage-shifts-modal');"
                        class="inline-flex items-center justify-center gap-1.5 rounded-xl border border-neutral-200 bg-white px-3.5 py-2.5 text-xs font-bold text-neutral-700 hover:bg-neutral-50 hover:border-neutral-300 transition active:scale-98 cursor-pointer select-none">
                        <svg class="h-4 w-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm0 5.25h.007v.008H3.75V12Zm0 5.25h.007v.008H3.75v-.008Z" />
                        </svg>
                        Kelola Shift
                    </button>
                    <button type="button" onclick="openModal('create-shift-modal');"
                        class="inline-flex items-center justify-center gap-1.5 rounded-xl border border-sky-200 bg-sky-50 px-3.5 py-2.5 text-xs font-bold text-sky-700 hover:bg-sky-100 hover:border-sky-300 transition active:scale-98 cursor-pointer select-none">
                        <svg class="h-4 w-4 text-sky-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Tambah Shift
                    </button>
                    <button type="button" onclick="openModal('create-user-modal');"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-500 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-sky-600 active:scale-98 cursor-pointer select-none">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Karyawan
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 relative z-10">
                <div
                    class="bg-white/95 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                    <div
                        class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center shrink-0 border border-blue-100/50">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-neutral-400 capitalize tracking-wide block">Total
                            Karyawan</span>
                        <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                            {{ $users->count() }}
                            <span class="text-xs font-bold text-neutral-500">Orang</span>
                        </h3>
                        <span class="text-[11px] font-bold text-neutral-400 block mt-1.5">Semua akun terdaftar</span>
                    </div>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                    <div
                        class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 border border-emerald-100/50">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-neutral-400 capitalize tracking-wide block">Kasir
                            Aktif</span>
                        <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                            {{ $users->where('role', 'kasir')->count() }} <span
                                class="text-xs font-bold text-neutral-500">Orang</span></h3>
                        <span class="text-[11px] font-bold text-emerald-600 block mt-1.5 flex items-center gap-1.5">
                            <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Sedang online
                        </span>
                    </div>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                    <div
                        class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center shrink-0 border border-amber-100/50">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-neutral-400 capitalize tracking-wide block">Shift
                            Berjalan</span>
                        <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                            {{ $users->whereNotNull('shift')->count() }} <span
                                class="text-xs font-bold text-neutral-500">Shift</span></h3>
                        <span class="text-[11px] font-bold text-amber-600 block mt-1.5 flex items-center gap-1.5">
                            <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                            Saat ini berlangsung
                        </span>
                    </div>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-5 flex items-center gap-4">
                    <div
                        class="h-12 w-12 rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center shrink-0 border border-purple-100/50">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.959 11.959 0 0 1 12 2.714Z" />
                        </svg>
                    </div>
                    <div>
                        <span
                            class="text-[10px] font-bold text-neutral-400 capitalize tracking-wide block">Administrator</span>
                        <h3 class="text-2xl font-black text-neutral-900 tracking-tight leading-none mt-1">
                            {{ $users->where('role', 'admin')->count() }} <span
                                class="text-xs font-bold text-neutral-500">Orang</span></h3>
                        <span class="text-[11px] font-bold text-purple-600 block mt-1.5">Memiliki akses penuh</span>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 p-4 shadow-2xs flex flex-col md:flex-row items-center justify-between gap-3 relative z-10">
            <div class="relative w-full md:w-80">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-neutral-400 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input id="user-search-input" type="text" onkeyup="filterUsersTable()"
                    placeholder="Cari karyawan (nama, email)..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-neutral-200 text-xs font-medium text-neutral-800 placeholder:text-neutral-400 focus:outline-none focus:border-sky-500 transition-colors">
            </div>
            <div class="flex items-center gap-2.5 w-full md:w-auto">
                <select id="user-role-filter" onchange="filterUsersTable()"
                    class="px-3.5 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-700 bg-white focus:outline-none focus:border-sky-500 transition-colors cursor-pointer w-full md:w-auto">
                    <option value="">Semua Role</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                </select>
                <select id="user-shift-filter" onchange="filterUsersTable()"
                    class="px-3.5 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-700 bg-white focus:outline-none focus:border-sky-500 transition-colors cursor-pointer w-full md:w-auto">
                    <option value="">Semua Shift</option>
                    <option value="pagi">Shift Pagi</option>
                    <option value="siang">Shift Siang</option>
                    <option value="malam">Shift Malam</option>
                    <option value="tanpa shift">Tanpa Shift</option>
                </select>
                <select id="user-status-filter" onchange="filterUsersTable()"
                    class="px-3.5 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-700 bg-white focus:outline-none focus:border-sky-500 transition-colors cursor-pointer w-full md:w-auto">
                    <option value="">Semua Status</option>
                    <option value="online">Online</option>
                    <option value="istirahat">Istirahat</option>
                    <option value="offline">Offline</option>
                </select>
                <button type="button" onclick="filterUsersTable()"
                    class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl border border-neutral-200 bg-white text-xs font-bold text-sky-600 hover:bg-neutral-50 transition cursor-pointer shrink-0">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                    Filter
                </button>
            </div>
        </div>

        <div
            class="hidden md:block bg-white/90 backdrop-blur-md rounded-2xl border border-neutral-200/80 shadow-2xs overflow-hidden relative z-10">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr
                            class="text-neutral-400 border-b border-neutral-100 text-[11px] font-extrabold uppercase tracking-wider bg-neutral-50/50">
                            <th class="p-4 pl-6 font-bold">KARYAWAN</th>
                            <th class="p-4 font-bold">ROLE</th>
                            <th class="p-4 font-bold">STATUS</th>
                            <th class="p-4 font-bold">SHIFT KERJA</th>
                            <th class="p-4 font-bold">EMAIL</th>
                            <th class="p-4 font-bold">TERAKHIR LOGIN</th>
                            <th class="p-4 pr-6 font-bold text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="users-table-body" class="divide-y divide-neutral-100/70 text-neutral-600">
                        @forelse($users as $index => $user)
                            @php
                                $shiftName = $user->shift ?: 'Tanpa Shift';
                                $shiftHoursDisplay = $user->shift_hours;
                                if (empty($shiftHoursDisplay)) {
                                    if ($user->shift === 'Pagi') {
                                        $shiftHoursDisplay = '06:00 - 14:00';
                                    } elseif ($user->shift === 'Siang') {
                                        $shiftHoursDisplay = '14:00 - 22:00';
                                    } elseif ($user->shift === 'Malam') {
                                        $shiftHoursDisplay = '22:00 - 06:00';
                                    } else {
                                        $shiftHoursDisplay = '';
                                    }
                                }

                                $statusVal = 'online';
                                $statusLabel = 'Online';
                                $statusClass = 'bg-emerald-50 text-emerald-600 border-emerald-100';
                                $statusDot = 'bg-emerald-500';

                                if ($index % 3 == 1) {
                                    $statusVal = 'istirahat';
                                    $statusLabel = 'Istirahat';
                                    $statusClass = 'bg-amber-50 text-amber-600 border-amber-100';
                                    $statusDot = 'bg-amber-500';
                                } elseif ($index % 3 == 2) {
                                    $statusVal = 'offline';
                                    $statusLabel = 'Offline';
                                    $statusClass = 'bg-rose-50 text-rose-500 border-rose-100';
                                    $statusDot = 'bg-rose-500';
                                }

                                if ($user->last_login_at) {
                                    \Carbon\Carbon::setLocale('id');
                                    $lastLoginText = $user->last_login_at->diffForHumans();
                                    $lastLoginDate = $user->last_login_at->format('d M Y, H:i');
                                } else {
                                    $lastLoginText = 'Belum pernah login';
                                    $lastLoginDate = '-';
                                }
                            @endphp
                            <tr class="user-row hover:bg-neutral-50/50 transition-colors"
                                data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}"
                                data-role="{{ strtolower($user->role) }}" data-shift="{{ strtolower($shiftName) }}"
                                data-status="{{ $statusVal }}">
                                <td class="p-4 pl-6 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="relative shrink-0">
                                            <div
                                                class="h-10 w-10 rounded-full overflow-hidden border border-neutral-200/80 aspect-square bg-sky-50 flex items-center justify-center">
                                                @if ($user->profile_picture)
                                                    <img src="{{ asset($user->profile_picture) }}"
                                                        alt="{{ $user->name }}" class="h-full w-full object-cover">
                                                @else
                                                    <span
                                                        class="font-extrabold text-xs text-sky-600 uppercase">{{ substr($user->name, 0, 2) }}</span>
                                                @endif
                                            </div>
                                            <span
                                                class="absolute bottom-0 right-0 h-2.5 w-2.5 rounded-full {{ $statusDot }} ring-2 ring-white"></span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-neutral-900 text-xs leading-tight">
                                                {{ $user->name }}</p>
                                            <p class="text-[10px] text-neutral-400 font-semibold mt-0.5">
                                                {{ $user->role === 'admin' ? 'Administrator' : 'Kasir' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap">
                                    @if ($user->role === 'admin')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-extrabold bg-sky-100/80 text-sky-700 border border-sky-200/60">
                                            Admin
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-extrabold bg-emerald-100/80 text-emerald-700 border border-emerald-200/60">
                                            Kasir
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold border {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </span>
                                </td>
                                <td class="p-4 whitespace-nowrap">
                                    @if ($user->shift)
                                        <div class="flex items-center gap-1.5">
                                            @if ($user->shift === 'Malam')
                                                <svg class="h-3.5 w-3.5 text-blue-500 shrink-0" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                                                </svg>
                                            @else
                                                <svg class="h-3.5 w-3.5 text-amber-500 shrink-0" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                                                </svg>
                                            @endif
                                            <div>
                                                <span
                                                    class="font-extrabold text-neutral-800 text-xs block leading-tight">{{ $user->shift }}</span>
                                                @if ($shiftHoursDisplay)
                                                    <span
                                                        class="text-[10px] text-neutral-400 font-semibold block mt-0.5">{{ $shiftHoursDisplay }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div>
                                            <span class="text-xs font-bold text-neutral-400 block leading-tight">-</span>
                                            <span class="text-[10px] text-neutral-400 font-semibold block mt-0.5">Tanpa
                                                Shift</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4 whitespace-nowrap text-xs font-semibold text-neutral-700">
                                    {{ $user->email }}
                                </td>
                                <td class="p-4 whitespace-nowrap">
                                    <span
                                        class="font-extrabold text-neutral-800 text-xs block leading-tight">{{ $lastLoginText }}</span>
                                    <span
                                        class="text-[10px] text-neutral-400 font-semibold block mt-0.5">{{ $lastLoginDate }}</span>
                                </td>
                                <td class="p-4 pr-6 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" onclick="openEditModal({{ json_encode($user) }})"
                                            class="h-8 w-8 inline-flex items-center justify-center rounded-lg border border-neutral-200 bg-white text-sky-600 hover:bg-sky-50 shadow-2xs transition cursor-pointer">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        @if (auth()->id() !== $user->id)
                                            <form id="delete-form-{{ $user->id }}" method="POST"
                                                action="{{ route('admin.users.delete', $user->id) }}" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button"
                                                onclick="confirmDelete(event, '{{ $user->name }}', 'delete-form-{{ $user->id }}')"
                                                class="h-8 w-8 inline-flex items-center justify-center rounded-lg border border-neutral-200 bg-white text-rose-500 hover:bg-rose-50 hover:text-rose-600 hover:border-rose-200 shadow-2xs transition cursor-pointer">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-8 text-center text-neutral-400 italic">
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
                <div
                    class="bg-white/80 backdrop-blur-md rounded-2xl border border-white/60 shadow-[0_15px_35px_rgba(0,0,0,0.02)] p-5 flex flex-col justify-between gap-4 relative z-10">
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-16 w-16 rounded-full overflow-hidden border border-neutral-200/80 shrink-0 aspect-square">
                            @if ($user->profile_picture)
                                <img src="{{ asset($user->profile_picture) }}" alt="Profil {{ $user->name }}"
                                    class="h-full w-full object-cover">
                            @else
                                <div
                                    class="h-full w-full bg-sky-50 text-sky-600 flex items-center justify-center font-extrabold text-base uppercase">
                                    {{ substr($user->name, 0, 2) }}
                                </div>
                            @endif
                        </div>
                        <p class="text-sm font-black text-neutral-900 mt-3">{{ $user->name }}</p>
                        <div class="mt-1.5">
                            @if ($user->role === 'admin')
                                <span
                                    class="inline-flex items-center gap-0.5 rounded-md bg-sky-50 px-2.5 py-0.5 text-[9px] font-bold text-sky-700 border border-sky-100">
                                    Admin
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center gap-0.5 rounded-md bg-emerald-50 px-2.5 py-0.5 text-[9px] font-bold text-emerald-700 border border-emerald-100">
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
                            <span class="text-[9px] font-bold text-neutral-400 uppercase tracking-wider block">Shift
                                Kerja</span>
                            @if ($user->shift)
                                <span
                                    class="inline-flex items-center gap-0.5 rounded bg-neutral-100 px-1.5 py-0.5 text-[10px] font-semibold text-neutral-700 border border-neutral-200 mt-0.5">
                                    {{ $user->shift }}
                                </span>
                            @else
                                <span class="text-neutral-400 italic text-[11px] block mt-0.5">Tanpa Shift</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-neutral-100 pt-3.5">
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                            class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-amber-50 text-xs font-bold text-amber-600 border border-amber-100 hover:bg-amber-100 transition active:scale-98 cursor-pointer text-center">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Ubah
                        </a>
                        @if (auth()->id() !== $user->id)
                            <form id="delete-form-{{ $user->id }}" method="POST"
                                action="{{ route('admin.users.delete', $user->id) }}" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button"
                                onclick="confirmDelete(event, '{{ $user->name }}', 'delete-form-{{ $user->id }}')"
                                class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-rose-50 text-xs font-bold text-rose-600 border border-rose-100 hover:bg-rose-100 transition active:scale-98 cursor-pointer">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                Hapus
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div
                    class="bg-white rounded-2xl border border-neutral-200/60 p-8 text-center text-neutral-400 italic text-xs">
                    Belum ada data karyawan terdaftar.
                </div>
            @endforelse
        </div>
    </div>

    <!-- KELOLA LIST SHIFT MODAL -->
    <div id="manage-shifts-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-lg w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-neutral-900">Daftar Shift Kerja</h3>
                    <p class="text-[11px] text-neutral-400 mt-0.5">Daftar seluruh shift kerja yang terdaftar di sistem.</p>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="closeModal('manage-shifts-modal'); openModal('create-shift-modal');"
                        class="inline-flex items-center gap-1 rounded-lg bg-sky-50 px-3 py-1.5 text-xs font-bold text-sky-600 hover:bg-sky-100 transition cursor-pointer">
                        Tambah Shift
                    </button>
                    <button type="button" onclick="closeModal('manage-shifts-modal')"
                        class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer p-1">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-6 overflow-y-auto max-h-[60vh] space-y-3">
                @forelse($shifts as $s)
                    <div
                        class="flex items-center justify-between p-3.5 rounded-xl border border-neutral-200/80 bg-neutral-50/50 hover:bg-white hover:border-neutral-300 transition duration-200 shadow-2xs">
                        <div class="flex items-center gap-3">
                            <div
                                class="h-9 w-9 rounded-lg bg-sky-100/70 text-sky-600 flex items-center justify-center font-bold text-xs">
                                ☀️
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-neutral-800">Shift {{ $s->name }}</h4>
                                <p class="text-[11px] text-neutral-500 font-medium mt-0.5">
                                    @if ($s->start_time && $s->end_time)
                                        {{ $s->start_time }} - {{ $s->end_time }}
                                    @else
                                        Fleksibel / Tanpa Jam
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick='openEditShiftModal(@json($s))'
                                class="rounded-lg border border-neutral-200 bg-white px-2.5 py-1.5 text-[11px] font-bold text-sky-600 hover:bg-sky-50 transition cursor-pointer">
                                Ubah
                            </button>
                            <form method="POST" action="{{ route('admin.shifts.delete', $s->id) }}"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus shift ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="rounded-lg border border-rose-200 bg-white px-2.5 py-1.5 text-[11px] font-bold text-rose-600 hover:bg-rose-50 transition cursor-pointer">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-neutral-400 italic text-xs">
                        Belum ada shift kerja yang ditambahkan.<br>
                        Silakan klik tombol <strong>Tambah Shift</strong> di atas.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- UBAH SHIFT MODAL -->
    <div id="edit-shift-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-md w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-neutral-900">Ubah Shift Kerja</h3>
                <button type="button" onclick="closeModal('edit-shift-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="edit-shift-form" method="POST" action="" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div class="space-y-2">
                    <label for="edit_shift_name" class="block text-xs font-bold text-neutral-700">Nama Shift</label>
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                        <input id="edit_shift_name" name="name" type="text" required
                            placeholder="Contoh: Pagi, Siang, Malam, Lembur"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="edit_shift_start_time" class="block text-xs font-bold text-neutral-700">Jam
                            Mulai</label>
                        <input id="edit_shift_start_time" name="start_time" type="time"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 focus:border-sky-500 focus:bg-white">
                    </div>
                    <div class="space-y-2">
                        <label for="edit_shift_end_time" class="block text-xs font-bold text-neutral-700">Jam
                            Selesai</label>
                        <input id="edit_shift_end_time" name="end_time" type="time"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 focus:border-sky-500 focus:bg-white">
                    </div>
                </div>

                <div class="pt-4 border-t border-neutral-100 flex items-center justify-end">
                    <button type="submit"
                        class="w-full rounded-xl bg-sky-500 py-3 text-xs font-bold text-white transition hover:bg-sky-600 shadow-sm active:scale-98 cursor-pointer">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- TAMBAH SHIFT MODAL -->
    <div id="create-shift-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-md w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-neutral-900">Tambah Shift Kerja Baru</h3>
                <button type="button" onclick="closeModal('create-shift-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.shifts.store') }}" class="p-6 space-y-4">
                @csrf
                <div class="space-y-2">
                    <label for="shift_name" class="block text-xs font-bold text-neutral-700">Nama Shift</label>
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                        <input id="shift_name" name="name" type="text" required
                            placeholder="Contoh: Pagi, Siang, Malam, Lembur"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="shift_start_time" class="block text-xs font-bold text-neutral-700">Jam Mulai</label>
                        <input id="shift_start_time" name="start_time" type="time" placeholder="06:00"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 focus:border-sky-500 focus:bg-white">
                    </div>
                    <div class="space-y-2">
                        <label for="shift_end_time" class="block text-xs font-bold text-neutral-700">Jam Selesai</label>
                        <input id="shift_end_time" name="end_time" type="time" placeholder="14:00"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 px-4 py-3 text-xs outline-none transition duration-200 focus:border-sky-500 focus:bg-white">
                    </div>
                </div>

                <div class="pt-4 border-t border-neutral-100 flex items-center justify-end">
                    <button type="submit"
                        class="w-full rounded-xl bg-sky-500 py-3 text-xs font-bold text-white transition hover:bg-sky-600 shadow-sm active:scale-98 cursor-pointer">Simpan
                        Shift</button>
                </div>
            </form>
        </div>
    </div>

    <!-- TAMBAH KARYAWAN-->
    <div id="create-user-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-lg w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-neutral-900">Tambah Karyawan Baru</h3>
                <button type="button" onclick="closeModal('create-user-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data"
                class="overflow-y-auto max-h-[78vh] p-6 space-y-6">
                @csrf

                <div class="flex flex-col items-center justify-center pb-5 border-b border-neutral-100">
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest mb-3">Foto Profil</span>
                    <div class="relative group cursor-pointer">
                        <input id="create_profile_picture" name="profile_picture" type="file" accept="image/*"
                            class="hidden">
                        <label for="create_profile_picture" class="cursor-pointer block relative">
                            <div
                                class="h-20 w-20 rounded-full bg-gradient-to-tr from-neutral-50 to-neutral-100 border-2 border-neutral-200 flex items-center justify-center overflow-hidden transition duration-350 group-hover:scale-102 group-hover:border-sky-400 relative">
                                <img id="create-avatar-preview" src="#" alt="Preview"
                                    class="hidden h-full w-full object-cover">
                                <svg id="create-avatar-placeholder"
                                    class="h-8 w-8 text-neutral-300 transition group-hover:text-sky-500" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
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
                    <span class="text-[9px] text-neutral-400 mt-2 font-medium">Ketuk untuk unggah foto.</span>
                    @error('profile_picture')
                        @if (!old('edit_user_id'))
                            <p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="create_name" class="block text-xs font-bold text-neutral-700">Nama Karyawan</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </span>
                            <input id="create_name" name="name" type="text"
                                value="{{ old('edit_user_id') ? '' : old('name') }}" required
                                placeholder="Nama lengkap karyawan"
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        </div>
                        @error('name')
                            @if (!old('edit_user_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="create_email" class="block text-xs font-bold text-neutral-700">Gmail</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </span>
                            <input id="create_email" name="email" type="email"
                                value="{{ old('edit_user_id') ? '' : old('email') }}" required
                                placeholder="contoh@gmail.com"
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        </div>
                        @error('email')
                            @if (!old('edit_user_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="create_password" class="block text-xs font-bold text-neutral-700">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input id="create_password" name="password" type="password" required
                            placeholder="Minimal 4 karakter"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-10 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        <button type="button" onclick="togglePassword('create_password', this)"
                            class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                            <svg class="eye-show h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg class="eye-hide h-4.5 w-4.5 hidden" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.895 7.895L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        @if (!old('edit_user_id'))
                            <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="create_role" class="block text-xs font-bold text-neutral-700">Role Akses</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                </svg>
                            </span>
                            <select id="create_role" name="role" required
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                                <option value="kasir"
                                    {{ old('role') === 'kasir' && !old('edit_user_id') ? 'selected' : '' }}>Kasir
                                </option>
                                <option value="admin"
                                    {{ old('role') === 'admin' && !old('edit_user_id') ? 'selected' : '' }}>Admin
                                </option>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="create_shift" class="block text-xs font-bold text-neutral-700">Shift Kerja</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                            <select id="create_shift" name="shift"
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 cursor-pointer">
                                <option value=""
                                    {{ old('shift') === '' && !old('edit_user_id') ? 'selected' : '' }}>Tanpa Shift
                                    (Default/Kantor)</option>
                                @forelse($shifts as $s)
                                    <option value="{{ $s->name }}"
                                        {{ old('shift') === $s->name && !old('edit_user_id') ? 'selected' : '' }}>
                                        Shift {{ $s->name }} @if ($s->start_time && $s->end_time)
                                            ({{ $s->start_time }} - {{ $s->end_time }})
                                        @endif
                                    </option>
                                @empty
                                @endforelse
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-neutral-100 flex items-center justify-end">
                    <button type="submit"
                        class="w-full rounded-xl bg-sky-500 py-3.5 text-xs font-bold text-white transition hover:bg-sky-600 hover:shadow-lg active:scale-98 cursor-pointer">Simpan
                        Karyawan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- UBAH KARYAWAN -->
    <div id="edit-user-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
        <div
            class="bg-white rounded-2xl max-w-lg w-full border border-neutral-200/60 shadow-xl overflow-hidden scale-95 opacity-0 transition-all duration-200 flex flex-col">
            <div class="px-6 py-4 border-b border-neutral-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-neutral-900">Ubah Data Karyawan</h3>
                <button type="button" onclick="closeModal('edit-user-modal')"
                    class="text-neutral-400 hover:text-neutral-600 transition cursor-pointer">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="edit-user-form" method="POST" action="" enctype="multipart/form-data"
                class="overflow-y-auto max-h-[78vh] p-6 space-y-6">
                @csrf
                @method('PUT')

                <input type="hidden" name="edit_user_id" id="edit_user_id_field" value="">

                <div class="flex flex-col items-center justify-center pb-5 border-b border-neutral-100">
                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-widest mb-3">Foto Profil</span>
                    <div class="relative group cursor-pointer">
                        <input id="edit_profile_picture" name="profile_picture" type="file" accept="image/*"
                            class="hidden">
                        <label for="edit_profile_picture" class="cursor-pointer block relative">
                            <div
                                class="h-20 w-20 rounded-full bg-gradient-to-tr from-neutral-50 to-neutral-100 border-2 border-neutral-200 flex items-center justify-center overflow-hidden transition duration-350 group-hover:scale-102 group-hover:border-sky-400 relative">
                                <img id="edit-avatar-preview" src="#" alt="Preview"
                                    class="hidden h-full w-full object-cover">
                                <div id="edit-avatar-placeholder"
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
                    <span class="text-[9px] text-neutral-400 mt-2 font-medium">Ketuk untuk ubah foto.</span>
                    @error('profile_picture')
                        @if (old('edit_user_id'))
                            <p class="mt-2 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="edit_name" class="block text-xs font-bold text-neutral-700">Nama Karyawan</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </span>
                            <input id="edit_name" name="name" type="text" required
                                placeholder="Nama lengkap karyawan"
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        </div>
                        @error('name')
                            @if (old('edit_user_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="edit_email" class="block text-xs font-bold text-neutral-700">Gmail</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </span>
                            <input id="edit_email" name="email" type="email" required placeholder="contoh@gmail.com"
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                        </div>
                        @error('email')
                            @if (old('edit_user_id'))
                                <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="edit_password" class="block text-xs font-bold text-neutral-700">Kata Sandi Baru</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input id="edit_password" name="password" type="password"
                            placeholder="Kosongkan jika tidak ingin mengubah kata sandi"
                            class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-10 py-3 text-xs outline-none transition duration-200 placeholder:text-neutral-400/80 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50">
                    </div>
                    @error('password')
                        @if (old('edit_user_id'))
                            <p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="edit_role" class="block text-xs font-bold text-neutral-700">Role Akses</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                </svg>
                            </span>
                            <select id="edit_role" name="role" required
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 cursor-pointer">
                                <option value="kasir">Kasir</option>
                                <option value="admin">Admin</option>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="edit_shift" class="block text-xs font-bold text-neutral-700">Shift Kerja</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400 pointer-events-none">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                            <select id="edit_shift" name="shift"
                                class="block w-full rounded-xl border border-neutral-200 bg-neutral-50/30 pl-10 pr-4 py-3 text-xs outline-none appearance-none transition duration-200 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100/50 cursor-pointer">
                                <option value="">Tanpa Shift (Default/Kantor)</option>
                                @forelse($shifts as $s)
                                    <option value="{{ $s->name }}">
                                        Shift {{ $s->name }} @if ($s->start_time && $s->end_time)
                                            ({{ $s->start_time }} - {{ $s->end_time }})
                                        @endif
                                    </option>
                                @empty
                                @endforelse
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
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

    <!-- HAPUS MODAL -->
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
                <h3 class="text-sm font-extrabold text-neutral-900 tracking-tight">Hapus Akun Karyawan?</h3>
                <p class="text-[11px] text-neutral-500 leading-relaxed px-1">Apakah Anda yakin ingin menghapus akun
                    karyawan <strong id="delete-modal-name" class="text-neutral-800 font-bold"></strong>? Tindakan ini
                    tidak dapat dibatalkan.</p>
            </div>

            <div class="flex items-center gap-3 w-full pt-2">
                <button type="button" id="delete-modal-cancel"
                    class="flex-1 px-4 py-2.5 rounded-xl border border-neutral-200 text-xs font-bold text-neutral-500 hover:bg-neutral-50 hover:text-neutral-800 transition active:scale-98 cursor-pointer">Batal</button>
                <button type="button" id="delete-modal-confirm"
                    class="flex-1 px-4 py-2.5 rounded-xl bg-rose-500 text-xs font-bold text-white hover:bg-rose-600 transition active:scale-98 cursor-pointer">Hapus</button>
            </div>
        </div>
    </div>

@endsection
