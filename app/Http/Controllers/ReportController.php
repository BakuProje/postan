<?php

namespace App\Http\Controllers;

class ReportController extends Controller
{
    public function reports()
    {
        return view('admin.reports');
    }
}
