<?php

use App\Models\Peserta;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaketAController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SessionController;

//HOMEPAGE
Route::get('/', [PesertaController::class, 'index'])->name('index');

//SESSION
Route::group(['as' => 'session.'], function () {
    Route::get('/login', [SessionController::class, 'index'])->name('index');
    Route::post('/login/authenticate', [SessionController::class, 'login'])->name('login');
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
});

// ADMIN
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'peserta'])->name('index');
    Route::get('/selection', [AdminController::class, 'adminSelection'])->name('adminSelection');

    Route::post('/validate', [AdminController::class, 'validasi'])->name('validate');
    Route::post('/setPaketA', [AdminController::class, 'setReadyA'])->name('setReadyA');
});


//PESERTA
//REGISTRATION
Route::get('/registration', [PesertaController::class, 'registration'])->name('registration');
Route::post('/registration/store', [PesertaController::class, 'storeRegistration'])->name('storeRegistration');

Route::group(['as' => 'user.', 'prefix' => '{id}'], function () {
    Route::get('/view', [PesertaController::class, 'view'])->name('view');
    // 300 soal
    Route::get('/assestment', [PesertaController::class, 'elim_satu'])->name('elim_satu');
});
