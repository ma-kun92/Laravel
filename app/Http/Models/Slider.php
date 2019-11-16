<?php

namespace App\Http\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model
{
    // DB接続情報
  /**
   * @var string $table テーブル名
   * @var string $primaryKey Primary_Keyのカラム名
   * @var int|string|array $attributes int|string: 値, array[key: カラム名 => value: 値] 
   */
  protected $table = 'tb_slider';
  protected $primaryKey = 'slider_id';
  protected $attributes = ['status_flg' => '1','display_flg' => '1', 'sort_num' => 99999];
  
  /**
   * @var string $guarded create()やfill()、update()動作時のブラックリスト
   * @var string $fillable create()やfill()、update()動作時のホワイトリスト
   */
  protected $guarded  = '';
  protected $fillable = [
    'name','caption', 'original_image_name', 'image_name','image_url', 'sort_num',
  ];
  
  /**
   * @var boolean $timestamps 自動タイムスタンプ設定
   * @var string CREATED_AT レコード作成日時に使用するカラム名
   * @var string UPDATED_AT レコード更新日時に使用するカラム名
   */
  public $timestamps = true;
  
  /**
* Mass (bulk) insert or update on duplicate for Laravel 4/5
* 
* insertOrUpdate([
*   ['id'=>1,'value'=>10],
*   ['id'=>2,'value'=>60]
* ]);
* 
*
* @param array $rows
*/
function insertOrUpdate(array $rows){
  $table = \DB::getTablePrefix().with(new self)->getTable();
  $first = reset($rows);
  
  $columns = implode( ',',
      array_map( function( $value ) { return "$value"; } , array_keys($first) )
  );
  
  $values = implode( ',', array_map( function( $row ) {
          return '('.implode( ',',
              array_map( function( $value ) { return '"'.str_replace('"', '""', $value).'"'; } , $row )
          ).')';
      } , $rows )
  );
  
  $updates = implode( ',',
      array_map( function( $value ) { return "$value = VALUES($value)"; } , array_keys($first) )
  );
  
  $sql = "INSERT INTO {$table}({$columns}) VALUES {$values} ON DUPLICATE KEY UPDATE {$updates}";
  
  return \DB::statement( $sql );
}
}
