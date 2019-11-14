<?php
  
  /**
   * @param
   * 
   * @return boolean true(1):認証済み false(0):未認証
   */
  
  function admin_user(){
    $admin_id = session('ADMIN_ID');
    if (!empty($admin_id)) {
      return true;
    } else {
      return false;
    }
  }