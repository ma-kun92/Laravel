<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    protected $redirect = 'contact/error';
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    protected function prepareForValidation(): void
    {
        // ここで任意の処理を行う
        // 今回は、comment配列から、空の配列要素を取り除く処理を行う例
        // if ($this->has('comment')) {
        //     $this->merge([
        //         'comment' => $this->trimEmptyElements(
        //             $this->input('comment')
        //         )
        //     ]);
        // }
        $data = $this->only(['name_sei', 'name_mei', 'email', 'content']);
        $this->session()->put("contact_data", $data);
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
          'email' => 'required|email:filter|max:128',
          'content' => 'required|max:400',
        ];
    }
    public function attributes()
    {
        return [
          'email' => 'メールアドレス',
          'name_sei' => 'お名前（姓）',
          'name_mei' => 'お名前（名）',
          'content' => 'お問い合わせ内容',
        ];
    }
}
