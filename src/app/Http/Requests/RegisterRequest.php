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
            'name.required' => '名前は必ずしてください',
            'name.string' => '名前は文字列で指定してください',
            'name.max' => '名前は191文字以下で指定してください',
            'email.required' => 'メールアドレスは必ず指定してください',
            'email.email' => '有効なメールアドレスを指定してください',
            'email.max' => 'メールアドレスは191文字以下で指定してください',
            'password.required' => 'パスワードは必ず指定してください',
            'password.min' => 'メールアドレスは8文字以上で指定してください',
            'password.max' => 'メールアドレスは191文字以下で指定してください',
        ];
    }
}
