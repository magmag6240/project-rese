<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'メールアドレスは必ず指定してください',
            'email.email' => '有効なメールアドレスを指定してください',
            'password.required' => 'パスワードは必ず指定してください',
            'password.min' => 'パスワードは8文字以上で指定してください'
        ];
    }
}
