<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function members()
    {
        return view('admin.members.index');
    }
}
