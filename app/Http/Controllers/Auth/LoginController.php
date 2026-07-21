<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
 
    public function showLoginForm()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            }
            return redirect()->route('admin.transactions');
        }

        return view('auth.login');
    }

   
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            $user->update(['last_login_at' => now()]);

            try {
                Notification::create([
                    'type' => $user->role === 'admin' ? 'system' : 'login',
                    'title' => ($user->role === 'admin' ? 'Admin ' : 'Kasir ') . $user->name . " login",
                    'subtitle' => $user->role === 'admin' ? 'Sesi Admin dimulai' : "Shift " . ($user->shift ?? 'Harian') . " dimulai",
                ]);
            } catch (\Exception $e) {
            }

            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            }
            return redirect()->route('admin.transactions');
        }

        return back()->withInput()->withErrors([
            'email' => 'Email atau kata sandi yang Anda masukkan belum sesuai.',
        ]);
    }

    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
