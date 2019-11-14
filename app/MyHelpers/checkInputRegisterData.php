<?php
  
  /**
   * @param array $data バリデーションにかけたいデータ
   * @param array $request 
   * @return boolean true:成功 false:失敗
   */

  function checkInputRegisterData($data=array(), $request=array()){
    $validator = Validator::make($data, [
      'name_sei' => 'required|max:32',
      'name_mei' => 'required|max:32',
      'name_sei_kana' => 'max:32',
      'name_mei_kana' => 'max:32',
      'sex' => 'required|numeric|digits:1',
      'email' => 'required|email|max:128',
      'passwd' => 'required|between:4,16|confirmed',
      'passwd_confirmation' => 'required|between:4,16',
      'zip1' => 'required|digits:3',
      'zip2' => 'required|numeric|digits:4',
      'prefecture_id' => 'required|integer|max:128',
      'address1' => 'required|max:128',
      'address2' => 'required|max:128',
      'address3' => 'nullable|max:128',
      'comment' => 'required|max:400',
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