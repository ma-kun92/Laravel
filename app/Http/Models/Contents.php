<?php

namespace App\Http\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contents extends Model
{
      // DB接続情報
  /**
   * @var string $table テーブル名
   * @var string $primaryKey Primary_Keyのカラム名
   * @var int|string|array $attributes int|string: 値, array[key: カラム名 => value: 値] 
   */
  protected $table = 'contents';
  protected $primaryKey = 'id';
  protected $attributes = ['status_flg' => '1',];
  
  /**
   * @var string $guarded create()やfill()、update()動作時のブラックリスト
   * @var string $fillable create()やfill()、update()動作時のホワイトリスト
   */
  protected $guarded  = '';
  protected $fillable = [
    'title','main_image', 'main_capture', 'main_discription','second_image', 'second_capture', 'second_discription','third_image', 'third_capture', 'third_discription','display_flg', 'public_at', 'end_at',
  ];
  
  /**
   * @var boolean $timestamps 自動タイムスタンプ設定
   * @var string CREATED_AT レコード作成日時に使用するカラム名
   * @var string UPDATED_AT レコード更新日時に使用するカラム名
   */
  public $timestamps = true;
  
  
  public function rules()
{
    return [
        'title' => 'required|max: 100','main_image' => 'required|file|image', 'main_capture' => 'required|max:128', 'main_discription' => 'required|max: 400','second_image' => 'required|file|image', 'second_capture' => 'required|max: 128', 'second_discription' => 'required|max: 400','third_image' => 'required|file|image', 'third_capture' => 'required|max: 128', 'third_discription' => 'required|max: 400','display_flg' => 'nullable|digits: 1', 'public_at' => 'required|date', 'end_at' => 'required|date|after:public_at',
    ];
}

public function attributes()
{
    return [
        'title' => 'タイトル','main_image' => 'メイン画像', 'main_capture' => 'メイン画像キャプション', 'main_discription' => 'メイン内容','second_image' => 'サブ１画像', 'second_capture' => 'サブ１画像キャプション', 'second_discription' => 'サブ１内容','third_image' => 'サブ２画像', 'third_capture' => 'サブ２画像キャプション', 'third_discription' => 'サブ２内容','display_flg' => '公開フラグ', 'public_at' => '公開日時', 'end_at' => '終了日時',
    ];
}
  
  
  
  
  
}
