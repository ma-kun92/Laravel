<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name_sei' => 'required|string|max:128',
          'name_mei' => 'required|string|max:128',
          'name_sei_kana' => 'required|string|max:128',
          'name_mei_kana' => 'required|string|max:128',
          'sex' => 'required|integer|max:128',
          'email' => 'required|email:filter|max:128',
          'passwd' => 'required|between4,16|confirmed',
          'passwd_confirmation' => 'required|between4,16'
          'zip1' => 'required|digits:3',
          'zip2' => 'required|numeric|digits:4',
          'prefecture_id' => 'required|integer|max:128',
          'address1' => 'required|max:128',
          'address2' => 'required|max:128',
          'address3' => 'nullable|max:128',
          'comment' => 'required|max:400',
        ];
    }
    public function attributes()
    {
        return [
          'email' => 'メールアドレス',
          'name_sei' => 'お名前（姓）',
          'name_mei' => 'お名前（名）',
          'name_sei_kana' => 'お名前（セイ）',
          'name_mei_kana' => 'お名前（メイ）',
          'sex' => '性別',
          'passwd' => 'パスワード',
          'passwd_confirmation' => '確認用パスワード',
          'zip1' => '住所（上三桁）',
          'zip2' => '住所（下四桁）',
          'prefecture_id' => '都道府県',
          'address1' => '住所1',
          'address2' => '住所2',
          'address3' => '住所3',
          'comment' => 'お問い合わせ内容',
        ];
    }
}