<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
// フォームリクエスト
use Illuminate\Http\Request;
// リクエストバリデーション
// use App\Http\Requests\LoginRequest;
// loginモデル
// use App\Http\Models\Login;
// Validator使用
use Illuminate\Support\Facades\Validator;
// DB
use Illuminate\Support\Facades\DB;

class LoginController extends Controller{
  // 入力画面表示
  public function index(Request $request){
    if ($request->session()->has('LOGIN_DATA')) {
      $request->session()->forget('LOGIN_DATA');
    }
    return view('front.login.index');
  }
  
  // 入力値バリデーション処理
  public function check(Request $request){
    /** @var array $data フォームでの入力値 */
    $data = $request->only(['email', 'passwd']);
    $request->session()->put("LOGIN_DATA", $data);
    
    // 入力値のメールアドレスをもとにDBからデータを取得
    $email = $data['email'];
    $user = DB::table('tb_user')->where('email', $email)->first();
    if (isset($user)) {
      $admin_id = $user->user_id;
    }else{
      $request->session()->put('errors', array('message' => 'メールアドレス、もしくはパスワードが正しくありません。'));
      return redirect('/login/error');
    }
    
    // ログインの処理
    if (decrypt($user->passwd) === $data['passwd']) {
      $request->session()->put('ADMIN_ID', $admin_id);
      return redirect('/');
    } else {
      $request->session()->put('errors', array('message' => 'メールアドレス、もしくはパスワードが正しくありません。'));
      return redirect('/login/error');
    }
  }
  
  // エラー画面表示
  public function error(Request $request){
    $data = $request->session()->pull('LOGIN_DATA');
    $errors = $request->session()->pull('errors');
    return view('front.login.index_err')->with(['data' => $data, 'error' => $errors]);
  }
  
  // ログアウト処理
  public function logout(Request $request){
    $admin_data = $request->session()->get('ADMIN_ID');
    if (!empty($admin_data)) {
      $request->session()->forget('ADMIN_ID');
      return redirect('/')->with('message', 'ログアウトしました。');
    } else {
      return redirect('/');
    }
  } 
}
