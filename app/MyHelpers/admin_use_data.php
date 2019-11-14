<?php
  use Illuminate\Support\Facades\DB;
  /**
   * @param
   * 
   * @return boolean true(1):認証済み false(0):未認証
   */
  
  function admin_user_data(){
    $admin_id = session('ADMIN_ID');
    $user = DB::table('tb_user')->where(['user_id'=>$admin_id])->first();
    var_dump($user);
    exit;
  }