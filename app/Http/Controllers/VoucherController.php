<?php

namespace App\Http\Controllers;

class VoucherController extends Controller
{
    public function vouchers()
    {
        return view('admin.vouchers');
    }
}
