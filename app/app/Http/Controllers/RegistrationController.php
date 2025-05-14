<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

    
}
