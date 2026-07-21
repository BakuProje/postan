<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
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
}
