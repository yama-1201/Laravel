<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


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

Route::group(['middleware' => 'auth'],function(){
    // マイページ
    Route::get('/mypage',[DisplayController::class,'showMypage'])->name('showMypage');
    Route::post('/mypage',[DisplayController::class,'mypage'])->name('mypage');


});
// トップページ(店舗一覧)の処理
Route::get('/',[DisplayController::class,'showToppage'])->name('showToppage');
Route::post('/',[DisplayController::class,'toppage'])->name('toppage');

// 店舗一覧
Route::get('/shopall',[DisplayController::class,'showShopall'])->name('showShopall');
Route::post('/shopall',[DisplayController::class,'shopall'])->name('shopall');

// 店舗詳細画面
Route::get('/shopdetail/{id}',[DisplayController::class,'showShopdetail'])->name('showShopdetail');
Route::post('/shopdetail/{id}',[DisplayController::class,'shopdetail'])->name('shopdetail');

// ログインの処理
Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// ログイン新規登録
Route::get('/newuser', [LoginController::class, 'showNewuser'])->name('showNewuser');
Route::post('/newuser', [LoginController::class, 'newuser'])->name('newuser');
// ログイン確認画面
Route::get('/newuser_conf', [LoginController::class, 'showNewuserconf'])->name('showNewuserconf');
// ログイン完了画面
Route::get('/newuser_comp', [LoginController::class, 'showNewusercomp'])->name('showNewusercomp');
Route::post('/newuser_comp', [LoginController::class, 'newusercomp'])->name('newusercomp');

// ログアウト
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
