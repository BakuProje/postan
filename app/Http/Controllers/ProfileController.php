<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        
        $todayTransactionsCount = 0;
        $todayRevenue = 0;
        $workDurationStr = "0 Jam 00 Menit";
        $shiftStartTimeStr = "-";
        $shiftStartDateStr = "-";
        
        $estimasiPulangTimeStr = "16:00";
        $estimasiPulangDateStr = \Carbon\Carbon::today()->translatedFormat('d M Y');
        
        $outlet = \App\Models\Outlet::first();
        
        if ($user->role === 'kasir') {
            $todayTransactionsCount = \App\Models\Transaction::where('user_id', $user->id)
                ->whereDate('created_at', \Carbon\Carbon::today())
                ->count();
                
            $todayRevenue = \App\Models\Transaction::where('user_id', $user->id)
                ->whereDate('created_at', \Carbon\Carbon::today())
                ->sum('total_price');
                
            $activeShift = $user->activeShiftLog();
            
            // Resolve shift hours based on database shifts table, falling back to defaults
            $resolvedShiftHours = $user->shift_hours;
            $dbShift = \App\Models\Shift::where('name', $user->shift)->first();
            if ($dbShift && $dbShift->start_time && $dbShift->end_time) {
                $s_start = strlen($dbShift->start_time) > 5 ? substr($dbShift->start_time, 0, 5) : $dbShift->start_time;
                $s_end = strlen($dbShift->end_time) > 5 ? substr($dbShift->end_time, 0, 5) : $dbShift->end_time;
                $resolvedShiftHours = $s_start . ' - ' . $s_end;
            } elseif (!$resolvedShiftHours) {
                if ($user->shift === 'Pagi') {
                    $resolvedShiftHours = '06:00 - 14:00';
                } elseif ($user->shift === 'Siang') {
                    $resolvedShiftHours = '14:00 - 22:00';
                } elseif ($user->shift === 'Malam') {
                    $resolvedShiftHours = '20:00 - 05:00';
                } else {
                    $resolvedShiftHours = '20:00 - 05:00';
                }
            }
            $user->shift_hours = $resolvedShiftHours;

            if ($activeShift && $activeShift->start_time) {
                $durationSeconds = abs(now()->timestamp - $activeShift->start_time->timestamp);
                $hours = floor($durationSeconds / 3600);
                $minutes = floor(($durationSeconds % 3600) / 60);
                $workDurationStr = "{$hours} Jam " . str_pad($minutes, 2, '0', STR_PAD_LEFT) . " Menit";
                
                $shiftStartTimeStr = $activeShift->start_time->format('H:i');
                $shiftStartDateStr = $activeShift->start_time->translatedFormat('d M Y');
                
                if ($resolvedShiftHours) {
                    $parts = explode(' - ', $resolvedShiftHours);
                    if (count($parts) === 2) {
                        $estimasiPulangTimeStr = $parts[1];
                        
                        $startHour = intval(explode(':', $parts[0])[0]);
                        $endHour = intval(explode(':', $parts[1])[0]);
                        
                        $startDate = $activeShift->start_time;
                        if ($endHour < $startHour) {
                            $estimasiPulangDateStr = $startDate->copy()->addDay()->translatedFormat('d M Y');
                        } else {
                            $estimasiPulangDateStr = $startDate->translatedFormat('d M Y');
                        }
                    }
                }
            }
        }
        
        return view('admin.profile.index', compact(
            'user', 
            'todayTransactionsCount', 
            'todayRevenue', 
            'workDurationStr',
            'shiftStartTimeStr',
            'shiftStartDateStr',
            'estimasiPulangTimeStr',
            'estimasiPulangDateStr',
            'outlet'
        ));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:4',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'profile_picture.uploaded' => 'Ukuran foto profil terlalu besar (maksimal 2MB) atau file gagal diunggah.',
            'profile_picture.image' => 'File harus berupa gambar.',
            'profile_picture.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'profile_picture.max' => 'Ukuran foto profil terlalu besar (maksimal 2MB).',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

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

        return back()->with('success', 'Profil Anda berhasil diperbarui.');
    }

    public function updatePin(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== 'kasir') {
            return back()->with('error', 'Hanya kasir yang memiliki PIN keamanan.');
        }

        if (!$user->is_pin_unlocked) {
            return back()->with('error', 'Fitur ubah PIN dikunci oleh Administrator.');
        }

        $request->validate([
            'pin' => 'required|numeric|digits:4',
        ], [
            'pin.required' => 'PIN harus diisi.',
            'pin.numeric' => 'PIN harus berupa angka.',
            'pin.digits' => 'PIN harus tepat 4 digit angka.',
        ]);

        $user->pin = $request->pin;
        $user->save();

        return back()->with('success', 'PIN keamanan Anda berhasil diperbarui.');
    }

    public function verifyPin(Request $request)
    {
        $request->validate([
            'pin' => 'required|string',
        ]);

        $user = auth()->user();

        if (empty($user->pin)) {
            if (!is_numeric($request->pin) || strlen($request->pin) !== 4) {
                return response()->json(['success' => false, 'message' => 'PIN baru harus berupa 4 digit angka.']);
            }
            $user->pin = $request->pin;
            $user->save();

            session(['pin_verified' => true]);
            return response()->json(['success' => true, 'is_new_pin' => true]);
        }

        if ($user->pin === $request->pin) {
            session(['pin_verified' => true]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'PIN yang Anda masukkan salah.']);
    }
}
