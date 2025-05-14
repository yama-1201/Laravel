<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/showMypage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

     // ログイン
     public function showLogin()
     {
         return view('login.login_form');
     }

    public function login(Request $request)
    {
        // バリデーション
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
   
        //  del_flg=0の人がログインできる
        if (Auth::attempt(array_merge($credentials, ['del_flg' => 0]))) {
            // セッションの鍵
            $request->session()->regenerate();
            return redirect('/mypage');
        }
    
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。'
        ]);
    }

    // ログイン新規登録
    public function showNewuser(Request $request)
     {
        if ($request->session()->has('user_data')) {
            session()->flashInput($request->session()->get('user_data'));
        }
    
        return view('login.newuser');
     }

    public function newuser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email'],
            'name' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $request->session()->put('user_data', [
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
        ]);

         return redirect()->route('showNewuserconf');

    }

    // 確認画面
    public function showNewuserconf(Request $request)
    {
        // セッションから取り出す
        $userData = $request->session()->get('user_data');
    
        if (!$userData) {
            return redirect()->route('showNewuser');
        }
    
        return view('login.newuser_conf', [
            'email' => $userData['email'],
            'name' => $userData['name'],
        ]);
    }
// ログイン完了画面
    public function showNewusercomp()
    {
        return view('login.newuser_comp') ;       
    }
    public function newusercomp(Request $request)
    {
        $userData = $request->session()->get('user_data');

        if (!$userData) 
        {
            return redirect()->route('showNewuser');
        }

        // DBに登録
        $user = User::create([
            'email' => $userData['email'],
            'name' => $userData['name'],
            'password' => Hash::make($userData['password']),
            'role' => '1',
        ]);


        // セッションから削除
        $request->session()->forget('user_data');

        return redirect()->route('showNewusercomp');
    }

    // ログアウト
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
