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
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191'],
            'password' => ['required', 'min:8', 'max:191'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須項目です',
            'name.string' => '名前は文字列で入力してください',
            'name.max' => '名前は191文字以下で入力してください',
            'email.required' => 'メールアドレスは必須項目です',
            'email.email' => '有効なメールアドレスを入力してください',
            'email.max' => 'メールアドレスは191文字以下で入力してください',
            'password.required' => 'パスワードは必須項目です',
            'password.min' => 'メールアドレスは8文字以上で入力してください',
            'password.max' => 'メールアドレスは191文字以下で入力してください',
        ];
    }
}
