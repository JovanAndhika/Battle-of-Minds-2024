<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaketAController;
use App\Http\Controllers\SessionController;

//HOMEPAGE
Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

//SESSION
Route::group(['as' => 'session.', 'middleware' => 'guest'], function () {
    Route::get('/login', [SessionController::class, 'index'])->name('index');
    Route::post('/login/authenticate', [SessionController::class, 'authenticate'])->name('login');

    // Forget Password
    Route::get('/forget', [SessionController::class, 'forget'])->name('forget');
    Route::post('/forget', [SessionController::class, 'forget_act'])->name('forget.act');
    Route::get('/forget/{token}', [SessionController::class, 'forget_content'])->name('forget.form');
    Route::post('/forget-form', [SessionController::class, 'forget_form'])->name('forget.form.act');
});


// ADMIN
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'peserta'])->name('index');

    // Poin
    Route::get('/poin', [AdminController::class, 'poin'])->name('poin');
    Route::post('/poin', [AdminController::class, 'poin_update'])->name('poin.update');

    Route::get('/jawaban/{user:namaKelompok}', [AdminController::class, 'jawaban'])->name('jawaban');

    Route::get('/selection', [AdminController::class, 'adminSelection'])->name('adminSelection');

    Route::post('/validate', [AdminController::class, 'validasi'])->name('validate');
    Route::post('/setJawaban', [AdminController::class, 'setReady'])->name('setReady');
});


//PESERTA
//REGISTRATION
Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration/store', [UserController::class, 'storeRegistration'])->name('storeRegistration');

Route::group(['as' => 'user.', 'middleware' => 'auth'], function () {
    Route::get('/view', [UserController::class, 'view'])->name('view');
    // 300 soal
    Route::get('/assestment', [UserController::class, 'elim_satu'])->name('elim_satu');
    Route::get('/assestmentB', [UserController::class, 'elim_satuB'])->name('elim_satuB');
    Route::get('/assestmentC', [UserController::class, 'elim_satuC'])->name('elim_satuC');
    Route::get('/assestmentD', [UserController::class, 'elim_satuD'])->name('elim_satuD');
    Route::get('/assestmentE', [UserController::class, 'elim_satuE'])->name('elim_satuE');
    Route::get('/assestmentF', [UserController::class, 'elim_satuF'])->name('elim_satuF');

    Route::post('/save-jawabanA', [UserController::class, 'simpan_jawabanA'])->name('simpan_jawabanA');
    Route::post('/save-jawabanB', [UserController::class, 'simpan_jawabanB'])->name('simpan_jawabanB');
    Route::post('/save-jawabanC', [UserController::class, 'simpan_jawabanC'])->name('simpan_jawabanC');
    Route::post('/save-jawabanD', [UserController::class, 'simpan_jawabanD'])->name('simpan_jawabanD');
    Route::post('/save-jawabanE', [UserController::class, 'simpan_jawabanE'])->name('simpan_jawabanE');
    Route::post('/save-jawabanF', [UserController::class, 'simpan_jawabanF'])->name('simpan_jawabanF');
    // Coming Soon
    Route::get('/coming-soon', [UserController::class, 'comingSoon']) -> name ('comingSoon');
});
