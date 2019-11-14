<?php

if (!function_exists('replace_index')) {
  /**
   * 自作関数
   * @param int|string $str_error デフォルトのエラー（形式：[列番号].[項目名][エラー内容]）
   * @return string 変換後のエラー
   */
  function replace_index($str_error=''){
    $pattern = '/(\d+)\.(.*)/i';
    $replacement = '${1}列目の${2}';
    // return preg_replace($pattern, $replacement, $str_error);
    preg_match($pattern, $str_error, $match);
    $str = "登録データ" . ($match[1]+1) . '列目の' . $match[2];
    return $str;
  }
}
