<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibraryController;
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
Route::get('/', function(){
    return redirect('/login');
});
Route::get('/login', [LibraryController::class, 'login'])->name('login');
Route::get('/register', [LibraryController::class, 'register'])->name('register');
Route::get('/profil', [LibraryController::class, 'profil'])->name('profil');

//login action

Route::post('/login', [AuthController::class, 'login'])->name('login_user');

//register action

Route::post(('/register'), [AuthController::class, 'register'])->name(('register_user'));

//logout action

Route::post('/logout', [AuthController::class, 'logout'])->name('logout_user');

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/dashboard', [LibraryController::class, 'index_admin'])->name('dashboard_admin');
    Route::get('/akun', [LibraryController::class, 'index_akun'])->name('dashboard_akun');
    Route::delete('/buku/{id}', [LibraryController::class, 'delete_buku'])->name('buku.delete');
    Route::post('/buku', [LibraryController::class, 'create_buku'])->name('buku.create');
    Route::put('/buku/{id}', [LibraryController::class, 'edit_buku'])->name('buku.edit');
});

Route::prefix('siswa')->middleware('auth:siswa')->group(function (){
    Route::get('/dashboard', [LibraryController::class, 'index_siswa'])->name('dashboard_siswa');
});