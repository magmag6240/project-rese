<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluateRequest extends FormRequest
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
            'star_id' => ['required', 'numeric', 'max:5'],
            'comments' => ['required', 'string', 'max:400'],
            'image_url' => ['required', 'mimes:jpeg,png']
        ];
    }

    public function messages()
    {
        return [
            'star_id.required' => '評価点数は必須項目です',
            'star_id.numeric' => '評価点数は数値で入力してください',
            'star_id.max' => '評価点数は決められた数値で入力してください',
            'comments.required' => 'コメントは必須項目です',
            'comments.string' => 'コメントは文字列で入力してください',
            'comments.max' => 'コメントは400字以内で入力してください',
            'image_url.required' => '画像は必須項目です',
            'image_url.mimes' => '画像はjpeg、png形式で入力してください',
        ];
    }
}
