<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
// フォームリクエスト
use Illuminate\Http\Request;
// リクエストバリデーション
use App\Http\Requests\RegisterRequest;
// Registerモデル
use App\Http\Models\Register;
// Validator使用
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller{
  // 入力画面表示
  public function index(Request $request) {
    // session内に登録情報が保持されていた場合削除（登録時の途中離脱用）
    if ($request->session()->has('register_data')) {
      $request->session()->forget('register_data');
    }
    return view('front.register.index');
  }
  
  // 入力値バリデーション処理
  public function check(Request $request) {
    /** @var array $data フォームでの入力値 */
    $data = $request->only(['name_sei', 'name_mei', 'name_sei_kana', 'name_mei_kana', 'sex', 'email', 'passwd', 'passwd_confirmation', 'zip1', 'zip2', 'prefecture_id', 'address1', 'address2', 'address3', 'comment']);
    $request->session()->put("register_data", $data);
    
    // バリデーション処理
    /** @var boolean $rtn バリデーションの判定（true:成功, false:失敗） */
    $rtn = checkInputRegisterData($data, $request);
    if ($rtn === true) {
      return redirect('/register/confirm');
    } else {
      return redirect('/register/error');
    }
  }
  
  // 確認画面表示
  public function confirm(Request $request) {
    $data = $request->session()->get('register_data');;
    return view('front.register.index_conf')->with('data', $data);
  }
  
  // 戻り画面表示
  public function return(Request $request) {
    $data = $request->session()->pull('register_data');
    return view('front.register.index_rtn')->with('data', $data);
  }
  
  // エラー画面表示
  public function error(Request $request) {
    $data = $request->session()->pull('register_data');
    return view('front.register.index_err')->with(['data' => $data]);
  }
  
   // DB登録処理
   public function end(Request $request) {
    // 登録ボタン選択時の処理
    if($request->filled('go')){
      // セッションから入力値取得
      $data = $request->session()->pull('register_data');
      // 再度バリデーションにかける
      $rtn = checkInputRegisterData($data, $request);
      // DB登録処理
      if ($rtn === true) {
        $register = new Register($data);
        $register['passwd'] = encrypt($register['passwd']);//参照時はdecrypt()を使用する
        
        if ($register->save()) {
          return redirect()->route('RegisterComplete');
        }
        return redirect()->route('Register')->with("errors",'DBに登録できませんでした');
      } else {
        return redirect('/register/error');
      }
    // 戻りボタン選択時の処理
    } else {
      return redirect()->route('RegisterReturn');
    }
  }
  
  // 完了画面表示
  public function complete(){
    return view('front.register.index_comp');
  }
}
