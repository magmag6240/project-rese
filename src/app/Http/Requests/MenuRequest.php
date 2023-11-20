<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'menu_name' => ['required', 'string', 'max:191'],
            'price' => ['required', 'numeric'],
            'menu_detail' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'menu_name.required' => 'プラン名は必須項目です',
            'menu_name.string' => 'プラン名は文字列で入力してください',
            'menu_name.max' => 'プラン名は191文字以下で入力してください',
            'price.required' => '価格は必須項目です',
            'price.numeric' => '価格は数値で入力してください',
            'menu_detail.required' => 'プラン詳細は必須項目です',
            'menu_detail.string' => 'プラン紹介は文字列で入力してください'
        ];
    }
}
