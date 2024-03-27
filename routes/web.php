<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesertaController;
use App\Models\Peserta;

Route::get('/', [PesertaController::class, 'index'])->name('index');

//REGISTRATION
Route::get('/registration', [PesertaController::class, 'registration'])->name('registration');
Route::post('/registration/store', [PesertaController::class, 'storeRegistration'])->name('storeRegistration');


//LOGIN
Route::get('/login', [PesertaController::class, 'login'])->name('login');
Route::post('/login', [PesertaController::class, 'authenticate'])->name('authenticate');
// LOGOUT
Route::post('/logout', [PesertaController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function(){
Route::get('/adminRole', [AdminController::class, 'adminIndex'])->name('admin');
    Route::get('/peserta', [AdminController::class, 'peserta'])->name('listPeserta');
    Route::post('/validate', [AdminController::class, 'validasi'])->name('validate');
});


//ELIMINASI 1
//PESERTA
Route::get('/eliminationone', [PesertaController::class, 'eliminationone'])->name('eliminationone');