<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckTicketRequest extends FormRequest
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
            'recaptcha_response_field' => 'required|recaptcha'
        ];
    }

    public function messages()
    {
        return [
            'recaptcha_response_field.required' => 'Vui lòng chọn',
            'recaptcha_response_field.recaptcha' => 'Chọn nếu bạn không phải là robot'
        ];
    }
