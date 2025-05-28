<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_About;
use App\Http\Controllers\C_Barang;
use App\Http\Controllers\C_Contact;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_Dosen;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Mahasiswa;
use App\Http\Controllers\C_Sidenac_light;
use App\Http\Controllers\C_Static_nav;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', [C_About::class, 'index']);
Route::get('/barang', [C_Barang::class, 'index']);
Route::get('/contact', [C_Contact::class, 'index']);
Route::get('/dashboard', [C_Dashboard::class, 'index']);
Route::get('/dosen', [C_Dosen::class, 'index']);
Route::get('/login', [C_Login::class, 'index']);
Route::get('/mahasiswa', [C_Mahasiswa::class, 'index']);
Route::get('/layout_sidenav_light', [C_Sidenac_light::class, 'index']);
Route::get('/static_navigation', [C_Static_nav::class, 'index']);
// Route::view('/dosen', 'dosen');
// Route::view('/about', 'about');
// Route::view('/contact', 'contact');
// Route::view('/barang', 'barang');
// Route::view('/dashboard', 'admin/dashboard');
// Route::view('/static_navigation', 'admin/static_navigation');
// Route::view('/layout_sidenav_light', 'admin/layout_sidenav_light');



// Route::view('/contact');

// Route::view('/contact', [
//     'name' => 'Luthfi',
//     'email' => 'luthfi@gmail.com'
// ]);

// Route::get('/contact', function () {
//     return view('contact', [
//         'name' => 'luthfi',
//         'email' => 'luthfi@gmail.com'
//     ]);
// });

// Route::get('/mahasiswa', function ($nama_mahasiswa = 'Luthfi') {
//     return view('mahasiswa', [
//         'nama_mahasiswa' => $nama_mahasiswa
//     ]);
// });

// Route::get('/contact', function () {
//     return view('contact', [
//         'name' => 'Luthfi',
//         'email' => 'luthfi@gmail.com'
//     ]);
// });

// Route::get('/about', function () {
//     return view('about', [
//         'nama' => 'Mahasiswa A',
//         'alamat' => 'Cibogo, Subang'
//     ]);
// });




// Route::get('/kali', function () {
//     return 9 * 9;
// });
