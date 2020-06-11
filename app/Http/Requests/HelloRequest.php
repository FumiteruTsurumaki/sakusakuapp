<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      {
        return true;
      }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'circle_name' => 'required',
         'genre_id' => 'required',
         'university_1' => 'required',
        ];
    }

    public function messages()
    {
         return [
          'circle_name.required' => 'サークル名を必ず入力してください。',
          'genre_id.required' => 'ジャンルは必ず選択してください。',
          'university_1.required' => '大学はひとつ以上は必ず入力してください。',
         ];
    }
}
