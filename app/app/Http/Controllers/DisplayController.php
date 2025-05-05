<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Review;
use App\Models\Report;
use App\Models\Bookmark;


class DisplayController extends Controller
{
//    モデルのテスト
    public function index()
    {
        $users = User::all();
        $stores = Store::all();
        $reviews = Review::all();
        $reports = Report::all();
        $bookmarks = Bookmark::all();

        return view('layouts.index',
        [
            'users' => $users, 
            'stores' => $stores,
            'reviews' => $reviews,
            'reports' => $reports,
            'bookmarks' => $bookmarks
        
        ]);
    }




    // トップページ
    // public function showToppage()
    // {
    //   return view('layouts.toppage.toppage');
    // }

    // public function toppage()
    // {

    // }



    // ログイン
    // public function showLogin()
    // {
    //     return view('login.login_form');
    // }

    // public function login()
    // {

    // }
}
