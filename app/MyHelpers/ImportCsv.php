<?php
  function importCsvData($file_path){
    $csv_header = array();
    $csv_data = array();
    $errors_collection = array();
    // ファイルのフルパス
    $file_path = storage_path('app/public/') . $file_path;
    $file = new SplFileObject($file_path);
    $file->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
    // データのヘッダータイトルを取得
    $csv_header = array("name_sei", "name_mei", "birth", "sex", "status_flg");
    // $line = mb_convert_encoding($line, "UTF-8", "SJIS");
    if($file->eof()) {
      return $errors_collection[] = array("com", "データが存在しません");
    }
    // 二行目以降を行単位で配列に追加
    foreach ($file as $num => $line) {
      if($num===0) {
        continue;
      }else{
        $one_data = array();
        foreach ($csv_header as $key => $column) {
          // excelで作成されたものでないと変換エラーが起こる。
          // テキストエディタ（設定文字コードUTF-8）で作成されたCSVファイルにはエンコードの必要なし
          $one_data[$column] = $line[$key];
        }
        $csv_data[] = $one_data;
      }
    }
    return $csv_data;
  }