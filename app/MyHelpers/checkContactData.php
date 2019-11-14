<?php
  
  /**
   * @param array $data バリデーションにかけたいデータ
   * @param array $request 
   * @return boolean true:成功 false:失敗
   */

  function checkInputContactData($data=array(), $request=array()){
    $validator = Validator::make($data, [
      'name_sei' => 'required|max:32',
      'name_mei' => 'required|max:32',
      'email' => 'required|email|max:128',
      'content' => 'required|max:400',
    ], [
    ]);
    
    // バリデーションの実施
    if ($validator->fails()) {
      $request->session()->put("errors", $validator->errors());
      return false;
    } else {
      return true;
    }
  }