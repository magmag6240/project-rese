<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Shop;
use Illuminate\Validation\Rule;

class CsvRequest extends FormRequest
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
            '' => ['required', 'numeric', 'max:5'],
            'comments' => ['required', 'string', 'max:400'],
            'image_url' => ['required', 'mimes:jpeg,png']
        ];
    }

    public function messages()
    {
        return [
            'csv.mimes' => 'ファイルは.csv形式のみ有効です',
            'header.required' => 'ファイル内にヘッダーを記載してください',
            'header.regex' => 'ファイル内のヘッダーに誤りがあります',
            'data.*.shop_name.required' => '店名は必須項目です',
            'data.*.shop_name.string' => '店名は文字列で入力してください',
            'data.*.shop_name.max' => '店名は50文字以内で入力してください',
            'data.*.shop_manager_id.required' => '店舗代表者は必須項目です',
            'data.*.shop_manager_id.numeric' => '店舗代表者はidで入力してください',
            'data.*.prefecture_id.required' => '所在地（都道府県）は必須項目です',
            'data.*.prefecture_id.numeric' => '所在地（都道府県）は定められたidで入力してください',
            'data.*.prefecture_id.max' => '所在地（都道府県）は定められたidで入力してください',
            'data.*.genre_id.required' => 'ジャンル名は必須項目です',
            'data.*.genre_id.numeric' => 'ジャンル名はidで入力してください',
            'data.*.genre_id.max' => 'ジャンル名は定められたidで入力してください',
            'data.*.shop_detail.required' => '店舗紹介は必須項目です',
            'data.*.shop_detail.string' => '店舗紹介は文字列で入力してください',
            'data.*.shop_detail.max' => '店舗紹介は400文字以内で入力してください',
            'data.*.image_url.required' => '店舗イメージ画像は必須項目です',
            'data.*.image_url.mimes' => '店舗イメージ画像はjpeg,png形式で入力してください',
        ];
    }
}
