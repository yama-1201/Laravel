<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function showLogin()
    {
        return view('login.login_form');
    }

    public function login()
    {

    }
}
