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
Auth::routes();
// Route::get('/',[DisplayController::class,'index'])->name('home');


// トップページ(店舗一覧)の処理
Route::get('/toppage',[DisplayController::class,'showToppage'])->name('showToppage');
Route::post('/toppage',[DisplayController::class,'toppage'])->name('toppage');

// 店舗一覧
Route::get('/shopall',[DisplayController::class,'showShopall'])->name('showShopall');
Route::post('/shopall',[DisplayController::class,'shopall'])->name('shopall');

// 店舗詳細画面
Route::get('/shopdetail/{id}',[DisplayController::class,'showShopdetail'])->name('showShopdetail');
Route::post('/shopdetail/{id}',[DisplayController::class,'shopdetail'])->name('shopdetail');

// ログインの処理
Route::get('/login', [DisplayController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [DisplayController::class, 'login'])->name('login');




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
