<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Static_nav extends Controller
{
    public function index()
    {
        return view('admin/static_navigation');
    }
}
