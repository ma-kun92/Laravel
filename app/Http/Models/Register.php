<?php

namespace App\Http\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Register extends Model{
  // DB接続情報
  /**
   * @var string $table テーブル名
   * @var string $primaryKey Primary_Keyのカラム名
   * @var int|string|array $attributes int|string: 値, array[key: カラム名 => value: 値] 
   */
  protected $table = 'tb_user';
  protected $primaryKey = 'user_id';
  protected $attributes = ['status_flg' => '1','address3' => '',];
  
  /**
   * @var string $guarded create()やfill()、update()動作時のブラックリスト
   * @var string $fillable create()やfill()、update()動作時のホワイトリスト
   */
  protected $guarded  = '';
  protected $fillable = [
    'email','name_sei','name_mei','name_sei_kana','name_mei_kana','sex', 'passwd','zip1','zip2','prefecture_id','address1','address2','address3','comment', 'status_flg',
  ];
  
  /**
   * @var boolean $timestamps 自動タイムスタンプ設定
   * @var string CREATED_AT レコード作成日時に使用するカラム名
   * @var string UPDATED_AT レコード更新日時に使用するカラム名
   */
  public $timestamps = true;
  const CREATED_AT = 'make_time';
  const UPDATED_AT = 'update_time';

}
