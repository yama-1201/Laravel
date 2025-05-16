<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Store;
use App\Models\Review;

// ユーザーの新規登録処理
class RegistrationController extends Controller
{
    // ユーザー情報の編集
   public function showEdituser(int $id)
   {
    $user = Auth::user();
    return view('layouts.mypage.user_edit', compact('user'));
    
   }

   public function edituser(int $id, Request $request)
   {
   
        $user = Auth::user();

        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'nullable|string|confirmed',
        ]);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->profile = $request->profile;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/mypage');
    }

    // 退会処理
    public function showUserdelete(int $id)
    {
        $user = Auth::user();
        return view('layouts.mypage.user_delete', compact('user'));
    }

    public function userdelete(int $id, Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'password' => 'required|string',
        ]);

        // 自分のIDと同じかチェック
        if ($user && $user->id === $id){
            $user->del_flg = 1;
            $user->save();

            Auth::logout();
        }

        return redirect('/');
    }

    // レビュー投稿画面
    public function showPost(int $id)
    {
        $user = Auth::user();
        $store = Store::findOrFail($id);

        return view('layouts.mypage.post', compact('user', 'store'));
    }

    public function post(int $id, Request $request)
    {
        $user = Auth::user();

        $store = Store::findOrFail($id);

        // バリデーション
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'rating' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $review = new Review();

        $review->user_id = $user->id;   
        $review->store_id = $store->id;
        $review->title = $request->title;
        $review->content = $request->content;
        $review->rating = $request->rating;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $review->image = $path;
        }

        $review->save();

        return redirect('/mypage');
    }

    public function showPostall(int $id)
    {
        $user = Auth::user();

        $reviews = Review::where('user_id', $user->id)
        ->with('store')
        ->orderBy('created_at', 'desc') 
        ->get();

        return view('layouts.mypage.post_all', compact('reviews'));
    }

    // レビュー詳細
    public function showReviewdetail(int $id)
    {
        $user = Auth::user();

        $review = Review::with('store')->findOrFail($id);
        
        return view('layouts.shop.review_detail', compact('review'));
    }
    

    
}
