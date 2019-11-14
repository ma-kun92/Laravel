<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function download(Request $request)
    {
        $header = ['Content-Type' => 'text/csv'];
        $filename = 'register_format.csv';
        return Storage::download('download/csv_format.csv', $filename, $header);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 操作したいファイル
        $csv_file = "";
        // csvファイルの保存
        if($request->file('csv_file')->isValid()){
          // fileインスタンス取得
          $file = $request->file('csv_file');
          // ファイルの拡張子を取得
          $extension = $file->extension();//もしくは$file->getClientOriginalExtension()
          // ファイル名を取得
          $file_fullname = $file->getClientOriginalName();
          $file_name = pathinfo($file_fullname, PATHINFO_FILENAME);
          // 現時刻を取得
          $date = date('Ymd');
          // 新しく保存用のファイル名を作成
          $new_file_name = $file_name."_".$date."_".Str::random(8).'.'.$extension;
          // ファイルをアップロード（返り値はアップロードされたファイルのpath）
          $csv_file = $file->storeAs('public', $new_file_name);
        }else{
          echo 'invalid';
          exit;
        }
        
        $csv_data = importCsvData($new_file_name);
        // var_dump($csv_data);
        // exit;
        
        //csvファイル内のデータのバリデーション
        /**
         * Determine if the user is authorized to make this request.
         *
         * @第一引数：csv_data import csv_data
         * @第二引数 validation rules
         * @第三引数 バリデーション方法に対するカスタムエラーメッセージ
         */
        // $count = count($csv_data);
        // for ($i=0; $i < $count ; $i++) { 
        //   $validator = Validator::make($csv_data[$i], [
        //     "name_sei"     => "required|max:200",
        //     "name_mei"     => "required|max:200",
        //     "birth"  => "required",
        //     "sex"      => "required|numeric|digits:1",
        //     ], [
        //     'required' => ":attribute は必須項目です",
        //     'numeric' => ":attribute は数字で入力してください",
        //     'max' => ":attribute は400文字以下で入力してください",
        //     'digits' => ":attribute は数字かつ1桁以下で入力してください",
        //     ], [
        //       "account_id"     => "account_id",
        //       "name"     => "名前",
        //       "birth"     => "誕生日",
        //       "sex"  => "性別",
        //       "comment"      => "メモ",
        //     ]
        //   );//->validate()で自動リダイレクトを利用できる
        //   if ($validator->fails()) {
        //     $request->session
        //     // エラー時のリダイレクト先設定
        //     // return redirect('/manage/register/index')->withErrors($validator);
        //   } else {
        //     // DBへの登録処理
        //     $csv = new CSV($csv_data[$i]);
        //   }
        // }
      
        // 配列内の要素を一気にバリデーションにかけている
        $validator = Validator::make($csv_data, ['*.name_sei' => 'required|max:200', '*.name_mei' => 'required|max:200', '*.birth' => 'required', '*.sex' => 'required|numeric|digits:1', '*.status_flg' => 'required|digits:1'],[
              // "name"     => "名前",
              // "birth"     => "誕生日",
              // "sex"  => "性別",
              // "comment"      => "メモ",
              ]);
        if ($validator->fails()) {
          
          // ここに各行に対するエラー文が入っている。これをbladeに渡してforeachで表示すればいい
          // var_dump($validator->errors());
          // exit;
          return redirect('/manage/register/index')->withErrors($validator);
        } else {
          // DBへの登録処理
          DB::table('tb_account')->insert($csv_data);
          return redirect('/manage/index')->with('message', '成功しました。');
        }
        
        
        
        return redirect('/manage/register/index')->with('message', '登録したでござる');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
