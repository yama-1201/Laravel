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
        'profile' => 'nullable|string',
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

    
}
