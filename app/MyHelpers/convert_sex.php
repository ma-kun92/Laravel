<?php

if (!function_exists('convert_sex')) {
  /**
   * 自作関数
   * @param int|string $sex 性別ID
   * @return string 性別出力
   */
  function convert_sex($sex=''){
    if ($sex=='1') {
      echo '男性';
    }elseif ($sex=='2') {
      echo "女性";
    }
  }
}
