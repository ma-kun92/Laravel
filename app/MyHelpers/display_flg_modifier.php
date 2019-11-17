<?php

if (!function_exists('display_flg_modifier')) {
  
  function display_flg_modifier($display_flg){
    if ($display_flg==1) {
      return "公開する";
    } else {
      return "公開しない";
    }
  }
}