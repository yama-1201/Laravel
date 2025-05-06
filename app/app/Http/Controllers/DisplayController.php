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
    // public function index()
    // {
       
    //     $reviews = Review::all();
       

    //     return view('layouts.index',
    //     [
           
    //         'reviews' => $reviews,
            
        
    //     ]);
    // }




    // トップページ
    public function showToppage()
    {
        $reviews = Review::with('store')->get();
        
      return view('layouts.toppage.toppage',compact('reviews'));
    }

    public function toppage()
    {
        
    }



    // ログイン
    // public function showLogin()
    // {
    //     return view('login.login_form');
    // }

    // public function login()
    // {

    // }
}
