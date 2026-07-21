<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class VoucherController extends Controller
{

    public function vouchers(Request $request)
    {
        $query = Voucher::query();
        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            $today = Carbon::today()->toDateString();
            $sevenDaysLater = Carbon::today()->addDays(7)->toDateString();

            if ($status === 'active') {
                $query->where('is_active', true)->where('end_date', '>=', $today);
            } elseif ($status === 'inactive') {
                $query->where(function ($q) use ($today) {
                    $q->where('is_active', false)
                      ->orWhere('end_date', '<', $today);
                });
            } elseif ($status === 'expiring') {
                $query->where('is_active', true)
                      ->whereBetween('end_date', [$today, $sevenDaysLater]);
            }
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        $vouchers = $query->orderBy('created_at', 'desc')->get();

        $today = Carbon::today()->toDateString();
        $sevenDaysLater = Carbon::today()->addDays(7)->toDateString();

        $totalVouchers    = Voucher::count();
        $activeVouchers   = Voucher::where('is_active', true)->where('end_date', '>=', $today)->count();
        $expiringVouchers = Voucher::where('is_active', true)->whereBetween('end_date', [$today, $sevenDaysLater])->count();
        $totalUsed        = Voucher::sum('used_count');

        return view('admin.vouchers.index', compact(
            'vouchers',
            'totalVouchers',
            'activeVouchers',
            'expiringVouchers',
            'totalUsed'
        ));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'         => 'required|string|max:50|unique:vouchers,code',
            'type'         => 'required|string|in:discount_percent,discount_nominal,free_shipping,cashback',
            'value'        => 'required|numeric|min:0',
            'description'  => 'required|string|max:255',
            'min_spend'    => 'nullable|numeric|min:0',
            'max_discount' => 'nullable|numeric|min:0',
            'end_date'     => 'required|date',
        ]);

        $validated['code']         = strtoupper(trim($validated['code']));
        $validated['min_spend']    = $request->input('min_spend', 0);
        $validated['max_discount'] = $request->input('max_discount', 0);
        $validated['is_active']    = $request->has('is_active') ? (bool) $request->input('is_active') : true;

        Voucher::create($validated);

        return redirect()->route('admin.vouchers')->with('success', "Voucher '{$validated['code']}' berhasil dibuat.");
    }


    public function update(Request $request, int $id)
    {
        $voucher = Voucher::findOrFail($id);

        $validated = $request->validate([
            'code'         => 'required|string|max:50|unique:vouchers,code,' . $id,
            'type'         => 'required|string|in:discount_percent,discount_nominal,free_shipping,cashback',
            'value'        => 'required|numeric|min:0',
            'description'  => 'required|string|max:255',
            'min_spend'    => 'nullable|numeric|min:0',
            'max_discount' => 'nullable|numeric|min:0',
            'end_date'     => 'required|date',
        ]);

        $validated['code']         = strtoupper(trim($validated['code']));
        $validated['min_spend']    = $request->input('min_spend', 0);
        $validated['max_discount'] = $request->input('max_discount', 0);
        $validated['is_active']    = $request->has('is_active') ? (bool) $request->input('is_active') : $voucher->is_active;

        $voucher->update($validated);

        return redirect()->route('admin.vouchers')->with('success', "Voucher '{$voucher->code}' berhasil diperbarui.");
    }


    public function toggleStatus(int $id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->is_active = !$voucher->is_active;
        $voucher->save();

        $statusStr = $voucher->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.vouchers')->with('success', "Voucher '{$voucher->code}' berhasil {$statusStr}.");
    }


    public function destroy(int $id)
    {
        $voucher = Voucher::findOrFail($id);
        $code = $voucher->code;
        $voucher->delete();

        return redirect()->route('admin.vouchers')->with('success', "Voucher '{$code}' berhasil dihapus.");
    }

    public function checkVoucher(Request $request): JsonResponse
    {
        $request->validate([
            'code'        => 'required|string',
            'total_price' => 'required|numeric|min:0',
        ]);

        $code = strtoupper(trim($request->input('code')));
        $today = Carbon::today()->toDateString();

        $voucher = Voucher::where('code', $code)
            ->where('is_active', true)
            ->where('end_date', '>=', $today)
            ->first();

        if (!$voucher) {
            return response()->json([
                'success' => false,
                'message' => 'Voucher tidak ditemukan, tidak aktif, atau sudah kedaluwarsa.'
            ], 422);
        }

        $totalPrice = (float) $request->input('total_price');
        $discountAmount = 0;

        if ($voucher->type === 'discount_percent') {
            $discountAmount = floor($totalPrice * ($voucher->value / 100));
            $discountDesc   = $voucher->value . '%';
        } else {
            $discountAmount = (float) $voucher->value;
            $discountDesc   = 'Rp ' . number_format($voucher->value, 0, ',', '.');
        }

        $discountAmount = min($discountAmount, $totalPrice);

        return response()->json([
            'success' => true,
            'message' => 'Voucher berhasil digunakan.',
            'data'    => [
                'code'            => $voucher->code,
                'type'            => $voucher->type,
                'value'           => $voucher->value,
                'discount_amount' => $discountAmount,
                'discount_desc'   => $discountDesc
            ]
        ]);
    }
}
