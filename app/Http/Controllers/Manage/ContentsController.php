<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; 
use Illuminate\Support\ViewErrorBag;

// Contentsモデル
use App\Http\Models\Contents;
use Illuminate\Support\Facades\DB;

class ContentsController extends Controller
{
    //
    public function index() {
        return view('manage/cms/contents/index');
    }
    
    public function check(Request $request){
        $input = $request->all();
        // var_dump($input);
        // exit;
        unset($input['_token']);
        $contents = new Contents($input);
        $validator = Validator::make($input, $contents->rules());
        if ($validator->fails()) {
            $contents_image1 = $request->session()->get('contents_images1', '');
            $contents_image2 = $request->session()->get('contents_images2', '');
            $contents_image3 = $request->session()->get('contents_images3', '');
            if (!empty($contents_images1) && (!empty($contents_image2) || !empty($contents_image3))) {
                $input['main_image'] = $contents_image1;
                $input['second_image'] = $contents_image2;
                $input['third_image'] = $contents_image3;
                return view('manage/cms/contents/confirm')->with('data', $input);
            }
            // return redirect('/manage/cms/contents/error')->withErrors($validator);  
            return redirect('/manage/cms/contents/index')->withErrors($validator);  
        }else{
            // fileインスタンス取得
            $file1 = $input['main_image'];
            $file2 = $input['second_image'];
            $file3 = $input['third_image'];
            
            // 取得した３ファイルに対して同様の一時ファイル保存処理を行う
            for ($i=1; $i <= 3; $i++) { 
                if ($i === 1) {
                    $file = $input['main_image'];
                } elseif ($i === 2) {
                    $file = $input['second_image'];
                } elseif ($i === 3) {
                    $file = $input['third_image'];
                }
                // ファイルの拡張子を取得
                $extension = $file->extension();//もしくは$file->getClientOriginalExtension()
                // ファイル名を取得
                $file_fullname = $file->getClientOriginalName();
                $input['original_image_name'] = $file_fullname;
                $file_name = pathinfo($file_fullname, PATHINFO_FILENAME);
                // 現時刻を取得
                $date = date('Ymd');
                // 新しく保存用のファイル名を作成
                $new_file_name = $file_name."_".$date."_".Str::random(8).'.'.$extension;
                // ファイルをアップロード（返り値はアップロードされたファイルのpath）
                $image_file = $file->storeAs('public/temp', $new_file_name);
                $image_file = str_replace('public', '/storage', $image_file);
                if ($i === 1) {
                    $input['main_image'] = $image_file;
                } elseif ($i === 2) {
                    $input['second_image'] = $image_file;
                } elseif ($i === 3) {
                    $input['third_image'] = $image_file;
                }
                // $request->session()->put('contents_image'.$i, $image_file);
                // $image_file = str_replace('public', '/storage', $image_file);
                $request->session()->put('contents_image'.$i, $image_file);
                
            }
            // end

            return view('manage/cms/contents/confirm')->with('data', $input);
        }
    }
}
