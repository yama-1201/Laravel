<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Review;
use App\Models\Report;
use App\Models\Bookmark;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// データや画面の表示
class DisplayController extends Controller
{
    // トップページ　店舗一覧画面
    public function showToppage(Request $request)
    {
        // 検索
        $keyword = $request->input('keyword');
        $rating_min = $request->input('rating_min');
        $rating_max = $request->input('rating_max');
        $query = Review::with('store')
            ->where('is_hedden', 0);

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
        if ($rating_min) {
            $query->where('rating', '>=', $rating_min);
        }

        if ($rating_max) {
            $query->where('rating', '<=', $rating_max);
        }

        $reviews = $query->get();
        
      return view('layouts.shop.toppage', compact('keyword','reviews', 'rating_min', 'rating_max'));
    }

    public function toppage()
    {
        
    }

    // 店舗一覧
    public function showShopall()
    {
        $stores = Store::withAvg('reviews', 'rating')->get();

        return view('layouts.shop.shop_all',compact('stores'));
    }

    public function shopall()
    {

    }

    // 店舗詳細画面
    public function showShopdetail($id)
    {
        $store = Store::with(['reviews.user'])->withAvg('reviews', 'rating')->findOrFail($id);

        $bookmarkedstores = null;
        if (Auth::check()) {
            $bookmarkedstores = Auth::user()->bookmarks()->pluck('store_id');
        }
        return view('layouts.shop.shop_detail',compact('store','bookmarkedstores'));
    }

    public function shopdetail()
    {

    }


    // マイページ
    public function showMypage()
    {
        $user = Auth::user();

        if ($user->role === 2) {
            $stores = $user->stores()->latest()->take(3)->get();
        } else {
            $stores = collect(); 
        }

        $reviews = $user->reviews()->latest()->take(3)->get();

        $bookmarks = $user->bookmarks()->withAvg('reviews', 'rating')->take(3)->get();
        // 退会済みのアカウント
        if ($user->del_flg === 1) {
            Auth::logout();
            return redirect('/login');
        }

        return view('layouts.mypage.mypage',compact('user', 'reviews','stores', 'bookmarks'));
    }

    public function mypage()
    {

    }

    // 利用停止画面
    public function showStop()
    {
        return view('layouts.user.stop');
    }

    

    
}
