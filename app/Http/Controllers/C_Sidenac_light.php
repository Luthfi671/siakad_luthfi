<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Sidenac_light extends Controller
{
    public function index()
    {
        return view('admin/layout_sidenav_light');
    }
}
