<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
// フォームリクエスト
use Illuminate\Http\Request;
// リクエストバリデーション
use App\Http\Requests\ContactRequest;
// Contactモデル
use App\Http\Models\Contact;
// Validator使用
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller{
  // 入力画面表示
  public function index(Request $request) {
    // session内に登録情報が保持されていた場合削除（登録時の途中離脱用）
    if ($request->session()->has('contact_data')) {
      $request->session()->forget('contact_data');
    }
    return view('front.contact.index');
  }
  
  // 入力値バリデーション処理
  public function check(ContactRequest $request) {
    /** @var array $data フォームでの入力値 */
    $data = $request->only(['name_sei', 'name_mei', 'email', 'content']);
    $request->session()->put("contact_data", $data);
    // $rtn_flg = $request->session()->pull('rtn_flg');
    // if ($rtn_flg) {
    //   return redirect('/contact/confirm');
    // } else {
    //   return redirect('/contact/error');
    // }
    return redirect('/contact/confirm');
  }
  
  // 確認画面表示
  public function confirm(Request $request) {
    $data = $request->session()->get('contact_data');
    return view('front.contact.confirm')->with('data', $data);
  }
  
  // 戻り画面表示
  public function return(Request $request) {
    $data = $request->session()->pull('contact_data');
    return view('front.contact.return')->with('data', $data);
  }
  
  // エラー画面表示
  public function error(Request $request) {
    $data = $request->session()->pull('contact_data');
    return view('front.contact.error')->with(['data' => $data]);
  }
  
   // DB登録処理
   public function end(Request $request) {
    // 登録ボタン選択時の処理
    if($request->filled('go')){
      // セッションから入力値取得
      $data = $request->session()->pull('contact_data');
      // 再度バリデーションにかける
      $rtn = checkInputContactData($data, $request);
      // DB登録処理
      if ($rtn === true) {
        $contact = new Contact($data);
        if ($contact->save()) {
          return redirect()->route('ContactComplete');
        }
        return redirect()->route('Contact')->with("errors",'DBに登録できませんでした');
      } else {
        return redirect('/contact/error');
      }
    // 戻りボタン選択時の処理
    } else {
      return redirect()->route('ContactReturn');
    }
  }
  
  // 完了画面表示
  public function complete(){
    return view('front.contact.complete');
  }
}
