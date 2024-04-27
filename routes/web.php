<?php

use App\Models\Peserta;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaketAController;
use App\Http\Controllers\PesertaController;

Route::get('/', [PesertaController::class, 'index'])->name('index');

//REGISTRATION
Route::get('/registration', [PesertaController::class, 'registration'])->name('registration');
Route::post('/registration/store', [PesertaController::class, 'storeRegistration'])->name('storeRegistration');


//LOGIN
Route::get('/login', [PesertaController::class, 'login'])->name('login');
Route::post('/login/store', [PesertaController::class, 'authenticate'])->name('authenticate');
// LOGOUT
Route::post('/logout', [PesertaController::class, 'logout'])->name('logout');


// ADMIN
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'peserta'])->name('index');
    Route::get('/selection', [AdminController::class, 'adminSelection'])->name('adminSelection');

    Route::post('/validate', [AdminController::class, 'validasi'])->name('validate');
    Route::post('/setPaketA', [AdminController::class, 'setReadyA'])->name('setReadyA');
});



//PESERTA
Route::group(['as' => 'user.'], function () {
    Route::get('/{peserta}/view', [PesertaController::class, 'view'])->name('view');
    // 300 soal
    Route::get('/assessment', [PesertaController::class, 'assessment'])->name('assessment');
});
