<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; 
use Illuminate\Support\ViewErrorBag;
// Sliderモデル
use App\Http\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has("slider_image")) {
            $request->session()->forget('slider_image');
        }
        return view('manage/cms/slider/index');
    }

    public function input(SliderRequest $request)
    {
        return view('manage/cms/slider/index');
    }

    public function check(Request $request)
    {
        // 必要データのみ取得
        $data = $request->only(['name', 'caption', 'image']);
        // validateする前に下記の行を配置すると$data['image']が別の値に置き換わった後なのでエラーになってしまう。よってここに配置。
        $validator = Validator::make($data,['name' => 'required|max:100', 'image' => 'sometimes|file|mimes:jpeg,bmp,png', 'caption' => 'required|max:100',],[]);
        // 戻り＆エラー画面から画像で画像の削除操作が行われた場合に、セッション内に保存していた古い画像データを削除
        $file_flg = $request->only(['del_flg']);
        if (!empty($file_flg) && $file_flg['del_flg'] == 'delete') {
             $request->session()->forget('slider_image');
        }
        
        // ファイルに対してバリデーション実施 ＆ ファイルを保存
        if ($request->has('image') && $request->file('image')->isValid()) {
            // fileインスタンス取得
            $file = $request->file('image');
            // ファイルの拡張子を取得
            $extension = $file->extension();//もしくは$file->getClientOriginalExtension()
            // ファイル名を取得
            $file_fullname = $file->getClientOriginalName();
            $data['original_image_name'] = $file_fullname;
            $file_name = pathinfo($file_fullname, PATHINFO_FILENAME);
            // 現時刻を取得
            $date = date('Ymd');
            // 新しく保存用のファイル名を作成
            $new_file_name = $file_name."_".$date."_".Str::random(8).'.'.$extension;
            // ファイルをアップロード（返り値はアップロードされたファイルのpath）
            $image_file = $file->storeAs('public/temp', $new_file_name);
            $request->session()->put('slider_file', $image_file);
            $image_file = str_replace('public', '/storage', $image_file);
            $data['image'] = $image_file;
            $request->session()->put('slider_image', $image_file);  
        } elseif ($slider_image = $request->session()->get('slider_image')) {
          // バリデーション成功＆アップロードファイルなし＆セッション内に画像情報有り
            $data['image'] = $slider_image;
            $request->session()->put('slider_image', $slider_image);
        } else {
            // アップロードファイルなし＆セッション内にファイル情報なし
            // fileがバリデーションに引っかからないのでエラー追加用のフラグを立てる
            $data['image'] ="";
            $file_flg = false;
        }
        $request->session()->put('slider_data', $data);
        
        // ファイル以外のバリデーション実施
        if($validator->fails()){
            // バリデーション失敗
            return redirect('/manage/cms/slider/error')->withErrors($validator);
        } elseif($file_flg === false) {
          // バリデーション成功＆ファイルのアップロードなし＆セッション内にファイル情報なし
            $errors = new ViewErrorBag();
            $errors->put('default', $validator->errors()->add('image', '画像が選択されていません。'));
            $request->session()->flash('errors', $errors);
            return redirect('/manage/cms/slider/error')->withErrors($validator);  
        } else {
            return redirect('manage/cms/slider/confirm');
        }
    }

    public function confirm(Request $request)
    {
        $data = $request->session()->get('slider_data');
        return view('manage/cms/slider/confirm', compact('data'));
    }

    public function error(Request $request)
    {
        $data = $request->session()->get('slider_data');
        return view('/manage/cms/slider/error', compact('data'));
    }

    public function return(Request $request)
    {
        $data = $request->session()->get('slider_data');
        return view('/manage/cms/slider/return', compact('data'));
    }
    
    public function end(Request $request)
    {
        $flg = $request->only(['flg']);
        if ($flg['flg']==1) {
            return redirect('/manage/cms/slider/return');
        }
        
        // ヴァリデーション
        $data = $request->session()->pull('slider_data');
        $validator = Validator::make($data,['name' => 'required|max:100', 'caption' => 'required|max:100',],[]);
        if ($validator->fails()) {
            return redirect('/manage/cms/slider/error'); 
        }
        // ファイルの移動＆temp配下のファイルの削除
        $temp_file = str_replace('/storage/temp', storage_path().'/app/public/temp', $data['image']);
        $public_file = str_replace('/storage/temp', storage_path().'/app/public', $data['image']);
        $rtn = rename($temp_file, $public_file);
        
        // DB登録処理
        if ($rtn == TRUE) {
            $data['image_url'] = str_replace('/storage/temp', '/storage', $data['image']);
            unset($data['image']);
            $image_object = new Slider($data);
            $image_object->save();
            return redirect('/manage/cms/slider/complete');
        } else {
            return redirect('/manage/cms/slider/error');
        }
    }

    public function complete(Request $request)
    {
        return view('manage/cms/slider/complete');
    }
    public function show(Request $request)
    {
        $data = DB::table('tb_slider')->get();
        // var_dump($data);
        // exit;
        return view('manage/cms/slider/show ', compact('data'));
    }
    public function sort(Request $request)
    {
        $data = DB::table('tb_slider')->orderBy('sort_num', 'asc')->get();
        return view('manage/cms/slider/sort ', compact('data'));
    }
    public function sort_check(Request $request)
    {
        $slider_ids = $request->input('slider_ids');
        $slider_nums = $request->input('slider_nums');
        $slider_id_ar = explode(',', $slider_ids);
        // var_dump($slider_nums);
        // echo '<br>';
        // var_dump($slider_id_ar);
        
        
        $count = count($slider_nums);
        // echo $count;
        $sql_data = array();
        for ($i=0; $i < $count; $i++) { 
            $sql_data[] = array($slider_id_ar[$i] => $slider_nums[$i]);
        }
        // var_dump($sql_data);
        // exit;
        foreach ($slider_nums as $num) {
            DB::table('tb_slider')->update();
        }
        $data = DB::table('tb_slider')->orderBy('sort_num', 'asc')->get();
        return view('manage/cms/slider/show ', compact('data'));
    }
}
