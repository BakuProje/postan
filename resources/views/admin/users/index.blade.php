@extends('layouts.admin')
@section('title', 'Kelola Kasir')
@section('konten')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-black text-neutral-900 tracking-tight">Daftar Karyawan</h2>
            <p class="text-xs text-neutral-500 mt-1">Buat akun kasir/admin, atur shift kerja, dan kelola hak akses sistem.</p>
        </div>
        <a href="{{ route('admin.users.CreateKasir') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-sky-500 px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-sky-600 shadow-sm w-fit">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Akun Karyawan
        </a>
    </div>
    @if(session('success'))
        <div class="rounded-lg border border-emerald-250 bg-emerald-50 px-4 py-3 text-xs text-emerald-700">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="rounded-lg border border-rose-250 bg-rose-50 px-4 py-3 text-xs text-rose-700">
            {{ session('error') }}
        </div>
    @endif
    <div class="bg-white rounded-2xl border border-neutral-200/60 overflow-hidden">
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
                                @if($user->profile_picture)
                                    <img src="{{ asset($user->profile_picture) }}" alt="Profil {{ $user->name }}" class="h-10 w-10 rounded-full object-cover border border-neutral-200">
                                @else
                                    <div class="h-10 w-10 rounded-full bg-sky-50 text-sky-600 border border-sky-100 flex items-center justify-center font-bold text-xs">
                                        {{ substr($user->name, 0, 2) }}
                                    </div>
                                @endif
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
                                    <a href="{{ route('admin.users.EditKasir', $user->id) }}" class="inline-flex h-7 w-7 items-center justify-center rounded bg-amber-50 text-amber-600 border border-amber-100 hover:bg-amber-100 transition-colors">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    @if(auth()->id() !== $user->id)
                                        <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('admin.users.delete', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete(event, '{{ $user->name }}', 'delete-form-{{ $user->id }}')" class="inline-flex h-7 w-7 items-center justify-center rounded bg-rose-50 text-rose-600 border border-rose-100 hover:bg-rose-100 transition-colors cursor-pointer">
                                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
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
</div>

<div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-neutral-950/40 backdrop-blur-xs opacity-0 pointer-events-none transition-all duration-200">
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
            <button type="button" id="delete-modal-confirm" class="flex-1 px-4 py-2.5 rounded-xl bg-rose-500 text-xs font-bold text-white hover:bg-rose-600 transition active:scale-98 cursor-pointer">Ya, Hapus</button>
        </div>
    </div>
</div>

@endsection
