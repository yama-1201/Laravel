<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DisplayController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('index',['users' => $users]);

    }





    // トップページ
    // public function showToppage()
    // {
        // return view('layouts.toppage');
    // }

    // public function toppage()
    // {

    // }



    // ログイン
    // public function showLogin()
    // {
    //     return view('login.login_form');
    // }

    // public function login()
    // {

    // }
}
