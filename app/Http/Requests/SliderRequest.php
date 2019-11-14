<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    
    $redirect = '/manage/cms/slider/error';
    
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
            'name' => 'required|max:100',
            'image' => 'required|file|mimes:jpeg,bmp,png',
            'caption' => 'required|max:100',
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => 'スライダー名',
            'image' => '登録画像',
            'caption' => '画像キャプション',
        ];
    }
}
