<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Barang extends Controller
{
    public function index()
    {
        return view('barang');
    }
}
