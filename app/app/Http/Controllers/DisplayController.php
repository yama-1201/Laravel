<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class DisplayController extends Controller
{
    public function index(){
        $user = new User;
        $users = $user->all();

        $user_with_store = $user->with('store')->first()->toArray();
        var_dump($user_with_store);

    }





    // トップページ
    public function showToppage()
    {
        return view('layouts.toppage');
    }

    public function toppage()
    {

    }



// ログイン
    public function showLogin()
    {
        return view('login.login_form');
    }

    public function login()
    {

    }
}
