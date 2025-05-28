<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Contact extends Controller
{
    public function index()
    {
        return view('contact');
    }
}
