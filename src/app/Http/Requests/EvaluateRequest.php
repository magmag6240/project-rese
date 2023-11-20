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
            'shop_id' => ['required', 'numeric'],
            'comments' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'star_id.required' => '評価点数は必須項目です',
            'star_id.numeric' => '評価点数はidで入力してください',
            'star_id.max' => '評価点数は決められたidで入力してください',
            'shop_id.required' => '店舗は必須項目です',
            'shop_id.numeric' => '店舗はidで入力してください',
            'comments.required' => '感想は必須項目です',
            'comments.string' => '感想は文字列で入力してください'
        ];
    }
}
