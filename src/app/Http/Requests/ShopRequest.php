<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'shop_name' => ['required', 'string', 'max:50'],
            'prefecture_id' => ['required', 'numeric', 'max:47'],
            'genre_id' => ['required', 'numeric'],
            'shop_detail' => ['required', 'string'],
            'image_url' => ['required', 'active_url']
        ];
    }

    public function messages()
    {
        return [
            'shop_name.required' => '店名は必須項目です',
            'shop_name.string' => '店名は文字列で入力してください',
            'shop_name.max' => '店名は191文字以下で入力してください',
            'prefecture_id.required' => '所在地（都道府県）は必須項目です',
            'prefecture_id.numeric' => '所在地（都道府県）はidで入力してください',
            'prefecture_id.max' => '所在地（都道府県）は決められたidで入力してください',
            'genre_id.required' => 'ジャンル名は必須項目です',
            'genre_id.numeric' => 'ジャンル名はidで入力してください',
            'shop_detail.required' => '店舗紹介は必須項目です',
            'shop_detail.string' => '店舗紹介は文字列で入力してください',
            'image_url.required' => '店舗イメージ画像は必須項目です',
            'image_url.active_url' => '店舗イメージ画像はURL形式で入力してください'
        ];
    }
}
