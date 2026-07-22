<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        
        $users = User::with(['shiftLogs' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->latest()->get();
        $shifts = Shift::latest()->get();
        return view('admin.KelolaKasir.index', compact('users', 'shifts'));
    }

    public function storeShift(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'nullable|string|max:50',
            'end_time' => 'nullable|string|max:50',
        ]);

        Shift::create([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('admin.users')->with('success', 'Shift kerja baru berhasil ditambahkan.');
    }

    public function updateShift(Request $request, Shift $shift)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'nullable|string|max:50',
            'end_time' => 'nullable|string|max:50',
        ]);

        $shift->update([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('admin.users')->with('success', 'Shift kerja berhasil diperbarui.');
    }

    public function deleteShift(Shift $shift)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $shift->delete();

        return redirect()->route('admin.users')->with('success', 'Shift kerja berhasil dihapus.');
    }

    public function createUser()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        return view('admin.KelolaKasir.create');
    }

    public function storeUser(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'role' => 'required|string|in:admin,kasir',
            'shift' => 'nullable|string',
            'shift_hours' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pin' => 'nullable|numeric|digits:4',
            'is_pin_unlocked' => 'nullable|string',
        ], [
            'profile_picture.uploaded' => 'Ukuran foto profil terlalu besar (maksimal 2MB) atau file gagal diunggah.',
            'profile_picture.image' => 'File harus berupa gambar.',
            'profile_picture.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'profile_picture.max' => 'Ukuran foto profil terlalu besar (maksimal 2MB).',
        ]);

        $shiftHours = $request->shift_hours;
        if (empty($shiftHours)) {
            if ($request->shift === 'Pagi') $shiftHours = '06:00 - 14:00';
            elseif ($request->shift === 'Siang') $shiftHours = '14:00 - 22:00';
            elseif ($request->shift === 'Malam') $shiftHours = '22:00 - 06:00';
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'shift' => $request->shift,
            'shift_hours' => $shiftHours,
            'pin' => $request->filled('pin') ? $request->pin : null,
            'is_pin_unlocked' => $request->input('is_pin_unlocked', '0') === '1',
        ];

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('profiles'))) {
                mkdir(public_path('profiles'), 0777, true);
            }
            $file->move(public_path('profiles'), $filename);
            $data['profile_picture'] = 'profiles/' . $filename;
        }

        User::create($data);

        return redirect()->route('admin.users')->with('success', 'Akun kasir/admin berhasil dibuat.');
    }

    public function editUser(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        return view('admin.KelolaKasir.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:4',
            'role' => 'required|string|in:admin,kasir',
            'shift' => 'nullable|string',
            'shift_hours' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pin' => 'nullable|numeric|digits:4',
            'is_pin_unlocked' => 'nullable|string',
        ], [
            'profile_picture.uploaded' => 'Ukuran foto profil terlalu besar (maksimal 2MB) atau file gagal diunggah.',
            'profile_picture.image' => 'File harus berupa gambar.',
            'profile_picture.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'profile_picture.max' => 'Ukuran foto profil terlalu besar (maksimal 2MB).',
        ]);

        $shiftHours = $request->shift_hours;
        if (empty($shiftHours)) {
            if ($request->shift === 'Pagi') $shiftHours = '06:00 - 14:00';
            elseif ($request->shift === 'Siang') $shiftHours = '14:00 - 22:00';
            elseif ($request->shift === 'Malam') $shiftHours = '22:00 - 06:00';
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->shift = $request->shift;
        $user->shift_hours = $shiftHours;
        
        if ($request->filled('pin')) {
            $user->pin = $request->pin;
        }
        $user->is_pin_unlocked = $request->input('is_pin_unlocked', '1') === '1';

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                @unlink(public_path($user->profile_picture));
            }

            $file = $request->file('profile_picture');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('profiles'))) {
                mkdir(public_path('profiles'), 0777, true);
            }
            $file->move(public_path('profiles'), $filename);
            $user->profile_picture = 'profiles/' . $filename;
        }

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Akun kasir/admin berhasil diperbarui.');
    }

    public function deleteUser(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        if (auth()->id() === $user->id) {
            return redirect()->route('admin.users')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
            @unlink(public_path($user->profile_picture));
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Akun berhasil dihapus.');
    }

    public function startShift(Request $request)
    {
        $user = auth()->user();
        
        \App\Models\ShiftLog::where('user_id', $user->id)
            ->where('is_active', true)
            ->update([
                'is_active' => false,
                'end_time' => now()
            ]);

        $shiftLog = \App\Models\ShiftLog::create([
            'user_id' => $user->id,
            'shift_name' => $user->shift ?: 'Pagi',
            'start_time' => now(),
            'is_active' => true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Shift kerja berhasil dimulai!',
            'data' => $shiftLog
        ]);
    }

    public function stopShift(Request $request)
    {
        $user = auth()->user();

        $updated = \App\Models\ShiftLog::where('user_id', $user->id)
            ->where('is_active', true)
            ->update([
                'is_active' => false,
                'end_time' => now()
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Shift kerja berhasil diakhiri!'
        ]);
    }

    public function togglePinStatus(User $user)
    {
        $user->is_pin_unlocked = !$user->is_pin_unlocked;
        $user->save();

        $status = $user->is_pin_unlocked ? 'dibuka (Open PIN)' : 'dikunci (Close PIN)';
        return back()->with('success', "PIN keamanan untuk kasir {$user->name} berhasil {$status}.");
    }
}
