<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaketAController;
use App\Http\Controllers\SessionController;

//HOMEPAGE
Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/logout', [SessionController::class, 'logout'])->name('logoutss');

//SESSION
Route::group(['as' => 'session.'], function () {
    Route::get('/login', [SessionController::class, 'index'])->name('index');
    Route::post('/login/authenticate', [SessionController::class, 'authenticate'])->name('login');

    // Forget Password
    Route::get('/forget', [SessionController::class, 'forget'])->name('forget');
    Route::post('/forget', [SessionController::class, 'forget_act'])->name('forget.act');
    Route::get('/forget/{token}', [SessionController::class, 'forget_content'])->name('forget.form');
    Route::post('/forget-form', [SessionController::class, 'forget_form'])->name('forget.form.act');
});


// ADMIN
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [AdminController::class, 'peserta'])->name('index');
    Route::get('/getPembayaranUsers/{user:id}', [AdminController::class, 'getPembayaranUser'])->name('index.get.pembayaran');
    Route::get('/getDataUsers/{user:id}', [AdminController::class, 'getDataUser'])->name('index.get.user');

    // Poin
    Route::get('/poin', [AdminController::class, 'poin'])->name('poin');
    Route::post('/poin', [AdminController::class, 'poin_update'])->name('poin.update');

    Route::get('/jawaban/{user:namaKelompok}', [AdminController::class, 'jawaban'])->name('jawaban');

    Route::post('/validate', [AdminController::class, 'validasi'])->name('validate');
    Route::post('/setJawaban', [AdminController::class, 'setReady'])->name('setReady');



    // ElimDua
    Route::get('/elimdua', [AdminController::class, 'elimduaView'])->name('elimduaView');
    Route::post('/elimdua/store', [AdminController::class, 'elimduaStore'])->name('elimduaStore');

});


//PESERTA
//REGISTRATION
Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration/store', [UserController::class, 'storeRegistration'])->name('storeRegistration');
//grup WA
Route::get('/grupwa', [UserController::class, 'grupwa'])->name('grupwa');

Route::group(['as' => 'user.', 'middleware' => 'isGuest'], function () {
    Route::get('/view', [UserController::class, 'view'])->name('view');
    // 300 soal
    Route::get('/assessment', [UserController::class, 'elim_satu'])->name('elim_satu');
    Route::get('/assessmentB', [UserController::class, 'elim_satuB'])->name('elim_satuB');
    Route::get('/assessmentC', [UserController::class, 'elim_satuC'])->name('elim_satuC');
    Route::get('/assessmentD', [UserController::class, 'elim_satuD'])->name('elim_satuD');
    Route::get('/assessmentE', [UserController::class, 'elim_satuE'])->name('elim_satuE');
    Route::get('/assessmentF', [UserController::class, 'elim_satuF'])->name('elim_satuF');

    Route::post('/save-jawabanA', [UserController::class, 'simpan_jawabanA'])->name('simpan_jawabanA');
    Route::post('/save-jawabanB', [UserController::class, 'simpan_jawabanB'])->name('simpan_jawabanB');
    Route::post('/save-jawabanC', [UserController::class, 'simpan_jawabanC'])->name('simpan_jawabanC');
    Route::post('/save-jawabanD', [UserController::class, 'simpan_jawabanD'])->name('simpan_jawabanD');
    Route::post('/save-jawabanE', [UserController::class, 'simpan_jawabanE'])->name('simpan_jawabanE');
    Route::post('/save-jawabanF', [UserController::class, 'simpan_jawabanF'])->name('simpan_jawabanF');
    // Coming Soon
    Route::get('/coming-soon', [UserController::class, 'comingSoon'])->name('comingSoon');
});
