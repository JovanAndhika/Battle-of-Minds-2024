<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaketAController;
use App\Http\Controllers\SessionController;

//HOMEPAGE
Route::get('/', [UserController::class, 'index'])->name('index');

//SESSION
Route::group(['as' => 'session.'], function () {
    Route::get('/login', [SessionController::class, 'index'])->name('index');
    Route::post('/login/authenticate', [SessionController::class, 'authenticate'])->name('login');
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

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

    Route::get('/selection', [AdminController::class, 'adminSelection'])->name('adminSelection');

    Route::post('/validate', [AdminController::class, 'validasi'])->name('validate');
    Route::post('/setPaketA', [AdminController::class, 'setReadyA'])->name('setReadyA');
    Route::post('/setPaketB', [AdminController::class, 'setReadyB'])->name('setReadyB');
    Route::post('/setPaketC', [AdminController::class, 'setReadyC'])->name('setReadyC');
    Route::post('/setPaketD', [AdminController::class, 'setReadyD'])->name('setReadyD');
    Route::post('/setPaketE', [AdminController::class, 'setReadyE'])->name('setReadyE');
    Route::post('/setPaketF', [AdminController::class, 'setReadyF'])->name('setReadyF');
});


//PESERTA
//REGISTRATION
Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration/store', [UserController::class, 'storeRegistration'])->name('storeRegistration');

Route::group(['as' => 'user.'], function () {
    Route::get('/view', [userController::class, 'view'])->name('view');
    // 300 soal
    Route::get('/assestment', [UserController::class, 'elim_satu'])->name('elim_satu');
    Route::post('/save-jawaban', [UserController::class, 'simpan_jawaban'])->name('simpan_jawaban');
});
