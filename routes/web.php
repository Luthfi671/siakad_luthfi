<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_login;

Route::get('/', [C_login::class, "index"]);


#REGSTER--------------------------------------

use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


#LOGIN--------------------------------------

use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::middleware('auth', 'level:1')->get('/admin', fn () => view('admin.admin'))->name('admin.admin');
    Route::middleware('auth', 'level:2')->get('/user', fn () => view('user.user'))->name('user.user');
    Route::middleware('auth', 'level:3')->get('/mahasiswa', fn () => view('mahasiswa.mahasiswa'))->name('mahasiswa.mahasiswa');
    Route::middleware('auth', 'level:4')->get('/dosen', fn () => view('dosen.dosen'))->name('dosen.dosen');
});

#LOGOUT--------------------------------------

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');



#ADMIN--------------------------------------
use App\Http\Controllers\c_admin;

Route::get('/admin/kelola_dosen', [c_admin::class, 'kelola_dosen'])->name('dosen');
Route::get('/admin/about', [c_admin::class, 'about'])->name('about');
Route::get('/admin/mahasiswa', [c_admin::class, 'mahasiswa'])->name('mahasiswa');
Route::get('/admin/nilai', [c_admin::class, 'nilai'])->name('nilai');
Route::get('/admin/user', [c_admin::class, 'user'])->name('user');
Route::get('/admin/invoice', [c_admin::class, 'invoice'])->name('invoice');
Route::get('/admin/chart', [c_admin::class, 'chart'])->name('chart');
#ADMIN-DOSEN
Route::get('/admin/dosen/add', [c_admin::class, 'add_dosen'])->name('add_dosen');
Route::get('/admin/dosen/detail/{nidn}', [c_admin::class, 'detail_dosen'])->name('detail_dosen');
Route::get('/admin/dosen/edit/{nidn}', [c_admin::class, 'edit_dosen'])->name('edit_dosen');
Route::get('/admin/dosen/delete/{nidn}', [c_admin::class, 'delete_dosen'])->name('delete_dosen');
Route::post('/admin/dosen/update/{nidn}', [c_admin::class, 'update_dosen'])->name('update_dosen');
Route::post('/admin/dosen/insert', [c_admin::class, 'insert_dosen'])->name('insert_dosen');
#ADMIN-MAHASISWA
Route::get('/admin/mahasiswa/add', [c_admin::class, 'add_mahasiswa'])->name('add_mahasiswa');
Route::get('/admin/mahasiswa/detail/{nim}', [c_admin::class, 'detail_mahasiswa'])->name('detail_mahasiswa');
Route::get('/admin/mahasiswa/edit/{nim}', [c_admin::class, 'edit_mahasiswa'])->name('edit_mahasiswa');
Route::get('/admin/mahasiswa/delete/{nim}', [c_admin::class, 'delete_mahasiswa'])->name('delete_mahasiswa');
Route::post('/admin/mahasiswa/update/{nim}', [c_admin::class, 'update_mahasiswa'])->name('update_mahasiswa');
Route::post('/admin/mahasiswa/insert', [c_admin::class, 'insert_mahasiswa'])->name('insert_mahasiswa');
#ADMIN-NILAI
Route::get('/admin/nilai/add', [c_admin::class, 'add_nilai'])->name('add_nilai');
Route::get('/admin/nilai/edit/{id_nilai}', [c_admin::class, 'edit_nilai'])->name('edit_nilai');
Route::get('/admin/nilai/delete/{id_nilai}', [c_admin::class, 'delete_nilai'])->name('delete_nilai');
Route::post('/admin/nilai/update/{id_nilai}', [c_admin::class, 'update_nilai'])->name('update_nilai');
Route::post('/admin/nilai/insert', [c_admin::class, 'insert_nilai'])->name('insert_nilai');
#ADMIN-NILAI-RINCIAN_NILAI
Route::get('/admin/nilai/rincian_nilai/{id_nilai}', [c_admin::class, 'rincian_nilai'])->name('rincian_nilai');
Route::get('/admin/nilai/rincian_nilai/add/{id_nilai}', [c_admin::class, 'add_rincian_nilai'])->name('add_rincian_nilai');
Route::get('/admin/nilai/rincian_nilai/insert', [c_admin::class, 'insert_rincian_nilai'])->name('insert_rincian_nilai');

#DOSEN--------------------------------------
use App\Http\Controllers\c_dosen;

Route::get('/dosen/kelola_akun', [c_dosen::class, 'kelola_akun'])->name('kelola_akun');

// Route::get('/login', [C_login::class, "index"]);
// Route::get('/register', [C_login::class, "register"]);
// Route::get('/about', [C_home::class, 'about']);
// Route::get('/about/{id}', [C_home::class, 'about']);

// Route::get('/dosen', [C_dosen::class, 'index'])->name('dosen');
// Route::get('/dosen/detail/{id_dosen}', [C_dosen::class, 'detail']);
// Route::get('/dosen/add', [C_dosen::class, 'add']);
// Route::post('/dosen/insert', [C_dosen::class, 'insert']);
// Route::get('/dosen/edit/{id_dosen}', [C_dosen::class, 'edit']);
// Route::post('/dosen/update/{id_dosen}', [C_dosen::class, 'update']);
// Route::get('/dosen/delete/{id_dosen}', [C_dosen::class, 'delete']);

// Route::get('/mahasiswa', [C_mahasiswa::class, 'index'])->name('mahasiswa');
// Route::get('/mahasiswa/detail/{nim}', [C_mahasiswa::class, 'detail']);
// Route::get('/mahasiswa/add', [C_mahasiswa::class, 'add']);
// Route::post('/mahasiswa/insert', [C_mahasiswa::class, 'insert']);
// Route::get('/mahasiswa/edit/{nim}', [C_mahasiswa::class, 'edit']);
// Route::post('/mahasiswa/update/{nim}', [C_mahasiswa::class, 'update']);
// Route::get('/mahasiswa/delete/{nim}', [C_mahasiswa::class, 'delete']);

// Route::get('/home', [C_home::class, 'index']);
// Route::get('/tes', [C_dosen::class, 'tes']);

// // Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
