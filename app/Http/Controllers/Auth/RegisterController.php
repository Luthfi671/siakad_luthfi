<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function showRegistrationForm()
    {
        return view('v_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'level' => 'required|in:1,2,3,4', // Validasi level
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 2, //set otomatis ke 2
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Auto login setelah register

        // Redirect berdasarkan level
        switch ($user->level) {
            case 1:
                return redirect()->route('admin.admin');
            case 2:
                return redirect()->route('user.user');
            case 3:
                return redirect()->route('mahasiswa.mahasiswa');
            case 4:
                return redirect()->route('dosen.dosen');
            default:
                return redirect('/login');
        }
    }
}
