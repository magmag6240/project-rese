<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'reserve_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required', 'date_format:H:i'],
            'number' => ['required', 'numeric', 'max:10']
        ];
    }

    public function messages()
    {
        return [
            'reserve_date.required' => '予約日は必須項目です',
            'reserve_date.date' => '予約日は日付形式で入力してください',
            'reserve_date.after_or_equal' => '予約可能日は本日以降です',
            'start_time.required' => '予約時刻は必須項目です',
            'start_time.date_format' => '予約時刻は"時:分"の形式で入力してください',
            'number.required' => '人数は必須項目です',
            'number.numeric' => '人数は数字で入力してください',
            'number.max' => 'このページから予約できる人数は10人までです'
        ];
    }
}
