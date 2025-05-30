<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Store;
use App\Models\Report;
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
    
    // 違反報告
    public function showReport(int $id, Request $request)
    {
        $user = Auth::user();
        $review = Review::findOrFail($id);

        return view('layouts.shop.report', compact('user', 'review'));
    }

    public function report(Request $request)
    {
        // バリデーション
        $request->validate([
            'review_id' => 'required|integer|exists:reviews,id',
            'comment' => 'nullable|string',
        ]);

        // 違反報告を保存
        $report = new Report();

        $report->review_id = $request->review_id;
        $report->comment = $request->comment;
        $report->user_id = Auth::id();
        $report->created_at = now();

        $report->save();        
    
        return redirect()->route('showToppage');
    }

    // 店舗登録
    public function showNewshop(Request $request)
    {
        if ($request->session()->has('shopuser_data')) {
            session()->flashInput($request->session()->get('shopuser_data'));
        }
    
        return view('layouts.shop.shop');
    }

    public function newshop(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image_path' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('shop_images', 'public');
        } else {
            $path = null;
        }

        $request->session()->put('shop_data', [
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'image_path' => $path,
        ]);

         return redirect()->route('showNewconf');

    }

    // 店舗確認画面
    public function showNewconf(Request $request)
    {
        // セッションから取り出す
        $shopData = $request->session()->get('shop_data');
    
        if (!$shopData) {
            return redirect()->route('showNewshop');
        }
    
        return view('layouts.shop.shop_conf', [
            'name' => $shopData['name'],
            'address' => $shopData['address'],
            'description' => $shopData['description'],
            'image_path' => $shopData['image_path'] ?? null,
        ]);
    }

    // 店舗登録完了画面
    public function showNewshopcomp()
    {
        return view('layouts.shop.shop_comp') ;       
    }

    public function newshopcomp(Request $request)
    {
        $shopData = $request->session()->get('shop_data');

        if (!$shopData) 
        {
            return redirect()->route('showNewshop');
        }
        $user = Auth::user();
        

        // DBに登録
        $store = new Store();

        $store->name = $shopData['name'];
        $store->address = $shopData['address'];
        $store->description = $shopData['description'];
        $store->image_path = $shopData['image_path'] ?? null;
        $store->user_id = $user->id;

        $store->save();
        
        // セッションから削除
        $request->session()->forget('shop_data');

        return redirect()->route('showNewshopcomp');
    }
    
    // パスワード再設定
    public function showReset()
    {
        return view('user.psw_reset');
    }

    public function reset()
    {
       
    }

    

}
