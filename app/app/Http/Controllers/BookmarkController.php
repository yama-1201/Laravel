<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function bookmarkstore($id)
    {
        $user=Auth::user();
        $store=Store::findOrFail($id);

        if (!$user->bookmarks()->where('store_id', $id)->exists())
        {
        $user->bookmarks()->attach($store->id, [
            'created_at' => now()
        ]);
        }
        return response()->json(['message' => 'ブックマークしました']);
    }

    public function bookmarkdestroy($id)
    {
        $user = Auth::user();
        $user->bookmarks()->detach($id);

        return response()->json(['message' => 'ブックマークを解除しました']);
    }

    public function showBookmark($id)
    {
        $user = Auth::user();

        if (!$user || $user->del_flg === 1)
        {
            Auth::logout();
            return redirect('/login');
        }

        $bookmarks = $user->bookmarks()->withAvg('reviews', 'rating')->get();

        return view('layouts.mypage.bookmark', compact('bookmarks'));
    }
}
