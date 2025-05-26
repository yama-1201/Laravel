<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class OwnerController extends Controller
{
    // 管理者トップページ
    public function showOwner()
    {
       $user = Auth::user();

       $users = User::where('role', 1)
        ->where('stop', 0)  // stop=0のユーザーに限定
        ->withCount(['reviews as deleted_reviews_count' => function ($query) {
            $query->where('is_hedden', 1);
        }])
        ->having('deleted_reviews_count', '>', 0)
        ->orderBy('deleted_reviews_count', 'desc')
        ->take(10)
        ->get();

        $reviews = Review::withCount('reports')
        ->where('is_hedden', 0)
        ->having('reports_count', '>', 0)
        ->orderBy('reports_count', 'desc')
        ->take(20)
        ->get();

        return view('layouts.owner.owner', compact('user', 'reviews', 'users'));
    
    }

    // ユーザー詳細
    public function showOwner_userdetail(int $id)
    {
         $user = User::withCount(['reviews as deleted_reviews_count' => function ($query) {
            $query->where('is_hedden', 1);
        }])->find($id);

         return view('layouts.owner.user_detail', compact('user'));
    }

    public function owner_userdetail(int $id)
    {
        $user = User::findOrFail($id);
        $user->stop = 1;
        $user->save();

         return redirect()->route('showOwner', ['id' => $id]);
    }

    // 投稿詳細
    public function showOwner_postdetail(int $id)
    {
        $review = Review::with('user') 
                    ->withCount('reports') 
                    ->find($id);

        

        return view('layouts.owner.post_detail', compact('review'));
    }

    public function owner_postdetail(int $id)
    {
        $review = Review::findOrFail($id);
        $review->is_hedden = 1;
        $review->save();

         return redirect()->route('showOwner');
    }
}
