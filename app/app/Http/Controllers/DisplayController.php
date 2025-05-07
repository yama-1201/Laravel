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
    // トップページ　店舗一覧画面
    public function showToppage(Request $request)
    {
        // レビュー平均点
        // $stores = Store::withAvg('reviews', 'rating')->get();


    

        // 検索
        $keyword = $request->input('keyword');
        $rating = $request->input('rating');
        $query = Review::with('store');

        // キーワード検索
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%') // レビュータイトル
                  ->orWhere('content', 'like', '%' . $keyword . '%') // レビュー内容
                  ->orWhereHas('store', function ($subQuery) use ($keyword) {
                      $subQuery->where('address', 'like', '%' . $keyword . '%'); // 住所
                  });
            });
        }

        // レビュー点数検索
        if (!empty($rating)) {
            $query->where('rating', $rating);
        }

        $reviews = $query->get();
        
      return view('layouts.shop.toppage', compact('keyword', 'rating','reviews'));
    }

    public function toppage()
    {
        
    }

    // 店舗詳細画面
    public function showShopdetail()
    {
    
    }

    public function shopdetail()
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
