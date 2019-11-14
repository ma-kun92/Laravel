<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class GetdataController extends Controller
{
  public function index(Request $request){
    $sel_type = $request->only(['type']);
		$sel_type_ar = split(":",$sel_type);

		if($sel_type_ar[0] == "zip"){
			//郵便番号検索
			$sel_type_ar[1] = mb_convert_kana($sel_type_ar[1], n);
      $sel_type_ar[2] = mb_convert_kana($sel_type_ar[2], n);
      // 不正な値の場合
			if(strlen($sel_type_ar[1]) != 3
			|| strlen($sel_type_ar[2]) != 4){
				exit;
      }
      $zip = new Zip();
      $prefecture = new Prefecture();
      
    	//郵便番号テーブルよりデータを取得
      $zip = $zip::where('zip_no',  $sel_type_ar[1] . $sel_type_ar[2]);
      
			$return_ar = array();
			if(!empty($zip)){
				//存在した場合住所データを戻すために配列を作成
				$return_ar["state"] = $zip_data["addr1"];
				$return_ar["city"] = $zip_data["addr2"];
				$return_ar["town"] = $zip_data["addr3"];
				$return_ar["state_kana"] = $zip_data["addr_kana1"];
				$return_ar["city_kana"] = $zip_data["addr_kana2"];
        $return_ar["town_kana"] = $zip_data["addr_kana3"];
        //住所のIDを取得する
        $pre_data = $prefecture::wherer('prefecture_name', $return_ar["state"] );
        
        $return_ar["pref_id"] = $pre_data["prefecture_id"];
			}else{
				//なかった場合は処理を抜ける
				//exitすることにより戻しのJSにてエラーを表示する
				exit;
      }
      
			//特定の文字を削除する
			$return_ar["town"] = pereg_replace("（.*）$","",$return_ar["town"]);
			$return_ar["town"] = pereg_replace("以下に掲載がない場合","",$return_ar["town"]);

			$return_ar["town_kana"] = pereg_replace("\(.*\)$","",$return_ar["town_kana"]);
			$return_ar["town_kana"] = pereg_replace("以下に掲載がない場合","",$return_ar["town_kana"]);
			//戻すための文字列を作成する
			$print_str = "".$return_ar["pref_id"];
			$print_str .= ":".$return_ar["city"];
			$print_str .= ":".$return_ar["town"];
			$print_str .= ":".$return_ar["city_kana"];
			$print_str .= ":".$return_ar["town_kana"];
			echo $print_str;
			exit;
		}

		//処理IDが取得できなかった場合はエラーで戻す
		print "ERROR";
		exit;
}
