<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function outlet()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        $outlet = Outlet::first() ?: new Outlet();
        return view('admin.outlet.index', compact('outlet'));
    }

    public function updateOutlet(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
        ], [
            'name.required' => 'Nama outlet wajib diisi.',
            'logo.image' => 'Logo harus berupa gambar.',
            'logo.max' => 'Ukuran logo maksimal 2MB.',
        ]);

        $outlet = Outlet::first() ?: new Outlet();
        $outlet->name = $request->name;
        $outlet->address = $request->address;
        $outlet->phone = $request->phone;

        if ($request->hasFile('logo')) {
            if ($outlet->logo && file_exists(public_path($outlet->logo))) {
                @unlink(public_path($outlet->logo));
            }

            $file = $request->file('logo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('outlets'))) {
                mkdir(public_path('outlets'), 0777, true);
            }
            $file->move(public_path('outlets'), $filename);
            $outlet->logo = 'outlets/' . $filename;
        }

        $outlet->save();

        return back()->with('success', 'Informasi outlet berhasil diperbarui.');
    }
}
