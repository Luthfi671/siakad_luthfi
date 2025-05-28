<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_login extends Controller
{
    public function index(){
        return view('v_login');
    }
    public function register(){
        return view('v_register');
    }
}
