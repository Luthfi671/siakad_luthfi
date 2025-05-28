<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah kredensial valid
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Redirect berdasarkan level user
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
                    return redirect()->route('login')->with('error', 'Level tidak valid.');
            }
        }

        // Jika login gagal
        return back()->with('error', 'Email atau Password salah.');
    }

    public function showLoginForm()
    {
        return view('v_login'); // pastikan ini mengarah ke view yang kamu buat
    }
}
