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

        if(!$user->bookmarks()->where('store_id',$id)->exists())
        {
            $user->bookmarks()->attach($store);
        }
         return back()->with('message', 'ブックマークしました');
    }

    public function bookmarkdestroy($id)
    {
        $user = Auth::user();
        $user->bookmarks()->detach($id);

         return back()->with('message', 'ブックマークを解除しました');
    }
}
