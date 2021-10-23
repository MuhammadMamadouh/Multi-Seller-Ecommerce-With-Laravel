<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name' => 'required|string',
            'abbr' => 'required|string|max:10',
            'status' => 'required|in:active,inactive',
            'direction' => 'required|in:rtl,ltr',
        ];
    }

    public function messages()
    {
        return [
            'string' => 'هذا الحقل يجب أن يكون نصًا',
            'required' => 'هذا الحقل مطلوب',
            'in' => 'القيم المدخلة غير صحيحة',
            'abbr.max' => 'هذا الحقل لابد ألا يزيد عن 10 أحرف',
        ];
    }
}
