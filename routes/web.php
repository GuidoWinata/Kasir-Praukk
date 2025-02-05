<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Models\Kategori;

//Ketika ada update di web.php maka harus menjalankan "php artisan optimize"

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');

	//KATEGORI
	Route::prefix('/kategori')->group(function() {
		Route::get('/list', [KategoriController::class, 'index'])->name('kategori');
		Route::get('/add', [KategoriController::class, 'add'])->name('add');
		Route::get('/update/{id}', [KategoriController::class, 'update'])->name('update');
		Route::put('/do-update/{id}', [KategoriController::class, 'doUpdate'])->name('doUpdate');
		Route::delete('/delete/{id}', [KategoriController::class, 'delete'])->name('delete');
		Route::post('/do-create', [KategoriController::class, 'doCreate'])->name('doCreate');
	});

	Route::prefix('/penjualan')->group(function () {
		Route::get('/index', [PenjualanController::class, 'index'])->name('penjualan');
		Route::post('/add', [PenjualanController::class, 'store'])->name('penjualan.add');
	});

	//PRODUK
	Route::prefix('/produk')->group(function() {
		Route::get('/list', [ProdukController::class, 'index'])->name('produk');
		Route::get('/add', [ProdukController::class, 'add'])->name('produk.add');
		Route::get('/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
		Route::put('/do-update/{id}', [ProdukController::class, 'doUpdate'])->name('produk.doUpdate');
		Route::delete('/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
		Route::post('/do-create', [ProdukController::class, 'doCreate'])->name('produk.doCreate');
	});

	// PEGAWAI
	Route::prefix('/pegawai')->group(function() {
		Route::get('/list', [PegawaiController::class, 'index'])->name('pegawai');
		Route::get('/add', [PegawaiController::class, 'add'])->name('pegawai.add');
		Route::get('/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
		Route::put('/do-update/{id}', [PegawaiController::class, 'doUpdate'])->name('pegawai.doUpdate');
		Route::delete('/delete/{id}', [PegawaiController::class, 'delete'])->name('pegawai.delete');
		Route::post('/do-create', [PegawaiController::class, 'doCreate'])->name('pegawai.doCreate');
	});
	
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');

	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});