<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CsvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // 権限によるバリデーションをするかfalseだと実行する
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
          'csv_file' => 'required|file|mimes:csv,txt|max:100000',
          // mimes:csv,txt'なのかも
          // php.iniのupload_max_filesizeとpost_max_sizeを考慮する必要があるので注意
        ];
    }
    public function attributes()
    {
        return [
          'csv_file' => 'CSVファイル',
        ];
    }
}