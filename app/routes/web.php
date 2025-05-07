<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/',[DisplayController::class,'index'])->name('home');


// トップページ(店舗一覧)の処理
Route::get('/toppage',[DisplayController::class,'showToppage'])->name('showToppage');
Route::post('/toppage',[DisplayController::class,'toppage'])->name('toppage');

// 店舗詳細画面
Route::get('/shopdetail',[DisplayController::class,'showShopdetail'])->name('showShopdetail');
Route::post('/shopdetail',[DisplayController::class,'shopdetail'])->name('shopdetail');

// ログインの処理
// Route::get('/',[DisplayController::class,'showLogin'])->name('showLogin');
// Route::post('login',[DisplayController::class,'login'])->name('login');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
