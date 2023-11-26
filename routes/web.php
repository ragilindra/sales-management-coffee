<?php

use App\Http\Controllers\controllerBarista;
use App\Http\Controllers\controllerInvenAlat;
use App\Http\Controllers\controllerInvenBahan;
use App\Http\Controllers\controllerMenu;
use App\Http\Controllers\controllerPenjualan;
use App\Http\Controllers\messageControl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [LoginController::class, 'halamanLogin'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin');
Route::group(['middleware' => ['auth','ceklevel:owner,barista']], function () {
    // your routes here
    Route::get('/pesan', [FlashMessageController::class],'index');
    Route::get('/get-pesan', [FlashMessageController::class],'pesan');
    Route::get('/dashboard', [PageController::class, 'index']);
    Route::get('/alat', [controllerInvenAlat::class, 'index']);
    Route::get('/deleteAlt/{alat}',[controllerInvenAlat::class,'destroy']);
    Route::get('/deleteBhn/{bahan}',[controllerInvenBahan::class,'destroy']);
    Route::get('/deleteMn/{menu}',[controllerMenu::class,'destroy']);
    Route::get('/deleteBarista/{barista}',[controllerBarista::class,'destroy']);
    Route::get('/deletePn/{penjualan}',[controllerPenjualan::class,'destroy']);
    Route::get('/bahan', [controllerInvenBahan::class, 'index']);
    Route::get('/menu', [controllerMenu::class, 'index']);
    Route::get('/penjualan', [controllerPenjualan::class, 'index']);
    Route::get('/barista', [controllerBarista::class, 'index']);
    Route::post('/addAlat', [controllerInvenAlat::class, 'store']);
    Route::post('/addBahan', [controllerInvenBahan::class, 'store']);
    Route::post('/addMenu', [controllerMenu::class, 'store']);
    Route::post('/addPenjualan', [controllerPenjualan::class, 'store']);
    Route::post('/addBarista', [controllerBarista::class, 'store']);
    Route::post('/editAlat/{id}',[controllerInvenAlat::class, 'update']);
    Route::post('/editBahan/{id}',[controllerInvenBahan::class, 'update']);
    Route::post('/editMenu/{id}',[controllerMenu::class, 'update']);
    Route::post('/editPenjualan/{id}', [controllerPenjualan::class, 'update']);
    Route::post('/editBarista/{id}',[controllerBarista::class, 'update']);
});

