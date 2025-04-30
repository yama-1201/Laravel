<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
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
