<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\jawabanLabirinController;
use App\Http\Controllers\SoalbomController;

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

    Route::get('/pass', [SessionController::class, 'change_pass'])->name('changePass');
    Route::post('/pass/change', [SessionController::class, 'pass_change'])->name('pass.change');
});


// ADMIN
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    // Registration
    Route::get('/registration', [UserController::class, 'registration'])->name('registration');
    Route::post('/registration/store', [UserController::class, 'storeRegistration'])->name('storeRegistration');

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

    // Lihat History & Leaderboard
    Route::get('/elimsatu/leaderboard', [AdminController::class, 'elimsatuLeaderboard'])->name('elimsatuLeaderboard');
    Route::get('/elimdua/leaderboard', [AdminController::class, 'elimduaLeaderboard'])->name('elimduaLeaderboard');
    Route::get('/elimdua/history', [AdminController::class, 'elimduaHistory'])->name('elimduaHistory');
    Route::get('/final/leaderboard', [AdminController::class, 'finalLeaderboard'])->name('finalLeaderboard');
    Route::get('/final/history', [AdminController::class, 'finalHistory'])->name('finalHistory');
});


//PESERTA
//grup WA
Route::get('/grupwa', [UserController::class, 'grupwa'])->name('grupwa');
//Close Reg
Route::get('/close_regist', [UserController::class, 'closeReg'])->name('closeReg');
// Coming Soon
Route::get('/coming-soon', [UserController::class, 'comingSoon'])->name('comingSoon');

Route::group(['as' => 'user.', 'middleware' => ['isGuest', 'isPanit']], function () {
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

    // Soal Bom
    Route::get('/soalBom$2y$10$667Kvfk21J4g2QHqRop3r.Mk37i6R0B./CXR3kYFqPpN0rlO7bbta', [SoalbomController::class, 'showSoal'])->name('soalBom');
    Route::post('/soalBom/store', [SoalbomController::class, 'storeSoal'])->name('soalBomStore');

    // View mini game
    Route::get('/game_elim1', [UserController::class, 'game_elim1'])->name('game_elim1');

    // soal minigame elim 1
    Route::get('/soal_labirin1fgkaprWrJ71k9fs7T5hwqriiO82almi4sm0fd', [UserController::class, 'labirin1_soal'])->name('labirin1_soal');
    Route::get('/soal_labirin2piOffYzjA9cxI5Meq1BN5fr90lW6ax8D6K4y1', [UserController::class, 'labirin2_soal'])->name('labirin2_soal');
    Route::get('/soal_labirin3pRS2wbLeKD067XyA3L5g8hCi05D9Ai8u0R5P0', [UserController::class, 'labirin3_soal'])->name('labirin3_soal');

    Route::post('/soal_labirin1/validate', [UserController::class, 'labirin1_validate'])->name('labirin1_validate');
    Route::post('/soal_labirin2/validate', [UserController::class, 'labirin2_validate'])->name('labirin2_validate');
    Route::post('/soal_labirin3/validate', [UserController::class, 'labirin3_validate'])->name('labirin3_validate');

    Route::post('/checkAnswer', [jawabanLabirinController::class, 'checkAnswer'])->name('checkAnswer');
    Route::post('/checkAnswer2', [jawabanLabirinController::class, 'checkAnswer2'])->name('checkAnswer2');
    Route::post('/checkAnswer3', [jawabanLabirinController::class, 'checkAnswer3'])->name('checkAnswer3');
});
