<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StatusController;

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

    // Final
    Route::get('/final', [AdminController::class, 'finalView'])->name('finalView');
    Route::post('/final/store', [AdminController::class, 'finalStore'])->name('finalStore');

    // Lihat History
    Route::get('/elimdua/leaderboard', [AdminController::class, 'elimduaLeaderboard'])->name('elimduaLeaderboard');
    Route::get('/elimdua/history', [AdminController::class, 'elimduaHistory'])->name('elimduaHistory');
    Route::get('/final/leaderboard', [AdminController::class, 'finalLeaderboard'])->name('finalLeaderboard');
    Route::get('/final/history', [AdminController::class, 'finalHistory'])->name('finalHistory');

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
    Route::get('/coming-soon', [UserController::class, 'comingSoon']) -> name ('comingSoon');
    
    // View mini game
    Route::get('/game_elim1', [UserController::class, 'game_elim1']) -> name ('game_elim1');

    // soal minigame elim 1
    Route::get('/soal_labirin1fgkaprWrJ71k9fs7T5hwqriiO82almi4sm0fd', [UserController::class, 'labirin1_soal'])->name('labirin1_soal');
    Route::get('/soal_labirin2piOffYzjA9cxI5Meq1BN5fr90lW6ax8D6K4y1', [UserController::class, 'labirin2_soal'])->name('labirin2_soal');
    Route::get('/soal_labirin3pRS2wbLeKD067XyA3L5g8hCi05D9Ai8u0R5P0', [UserController::class, 'labirin3_soal'])->name('labirin3_soal');

    Route::post('/soal_labirin1/validate', [UserController::class, 'labirin1_validate'])->name('labirin1_validate');
    Route::post('/soal_labirin2/validate', [UserController::class, 'labirin2_validate'])->name('labirin2_validate');
    Route::post('/soal_labirin3/validate', [UserController::class, 'labirin3_validate'])->name('labirin3_validate');

    Route::post('/soal_labirin1/store', [UserController::class, 'labirin1_store'])->name('labirin1_store');
    Route::post('/soal_labirin2/store', [UserController::class, 'labirin2_store'])->name('labirin2_store');
    Route::post('/soal_labirin3/store', [UserController::class, 'labirin3_store'])->name('labirin3_store');
    Route::get('/soal_labirin1', [UserController::class, 'soal_labirin1']) -> name ('soal_labirin1');
    Route::post('/soal_labirin1', [StatusController::class, 'labirin1']);
    Route::get('/soal_labirin2', [StatusController::class, 'labirin2']) -> name ('soal_labirin2');
    Route::get('/soal_labirin3', [StatusController::class, 'labirin3']) -> name ('soal_labirin3');
   
    Route::post('/checkAnswer', [jawabanLabirinController::class, 'checkAnswer'])->name('checkAnswer'); 
    // Route::post('/check-answer', [jawabanLabirinController::class, 'labirin2']);
    // Route::post('/check-answer', [jawabanLabirinController::class, 'labirin3']);

});
