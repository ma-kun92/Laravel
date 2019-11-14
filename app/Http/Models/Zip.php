<?php

namespace App\Http\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Zip extends Model{
  // DB接続情報
  protected $table = 'mt_zip';
  protected $primaryKey = 'rec_id';
  protected $attributes = ['status_flg' => '1'];
  // create()やfill()、update()動作時のブラックリスト
  // protected $guarded  = array('contact_id');
  // create()やfill()、update()動作時のホワイトリスト
  
  // タイムスタンプを使用するかの設定
  public $timestamps = true;
  const CREATED_AT = 'make_time';
  const UPDATED_AT = 'update_time';

  // DBからデすべてのデータを取得してくるメソッド
  public function getDataAll(){
    $data = DB::table($this->table)->get();
    return $data;
  }

  // DBから指定したデータを取得するメソッド
  public function getDataOne($rec_id){
    $data = $this-->where('user_id', $contact_id)->get();
    return $data;
  }


}
