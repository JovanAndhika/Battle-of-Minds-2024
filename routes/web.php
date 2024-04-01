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

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'peserta'])->name('index');
    Route::get('/peserta', [AdminController::class, 'peserta'])->name('listPeserta');
    Route::post('/validate', [AdminController::class, 'validasi'])->name('validate');
    Route::get('/adminRole/selection', [AdminController::class, 'adminSelection'])->name('adminSelection');
    Route::post('adminRole/setSelection/{peserta}', [AdminController::class, 'setReady'])->name('setReady');
});




//PESERTA
//ELIMINASI 1
Route::get('/eliminationone', [PesertaController::class, 'eliminationone'])->name('eliminationone');
Route::get('/eliminationone/paketa', [PaketAController::class, 'mainview'])->name('paketA');
