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
    
        if (Auth::attempt($credentials)) {
            // セッションの鍵
            $request->session()->regenerate();
            return redirect()->intended('showMypage');
        }
    
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。'
        ]);
    }

    // ログイン新規登録
    public function showNewuser()
     {
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

        $user = User::create([
             'email' => $request->email,
             'name' => $request->name,
             'password' => Hash::make($request->password), 
             'role' => '1',
         ]);

         auth()->login($user);

         return redirect()->route('showMypage');

    }

    // 確認画面
    public function showNewuserconf(Request $request)
    {
        // セッションに保存
        $request->session()->put('user_data', [
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
        ]);
        
        return view('login.newuser_conf', [
            'email' => $request->email,
            'name' => $request->name,           
        ]);
    }
// ログイン完了画面
    public function showNewusercomp()
    {
        return view('login.newuser_comp');
    }
}
