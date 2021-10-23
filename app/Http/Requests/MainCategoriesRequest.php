<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoriesRequest extends FormRequest
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
            'photo'                 => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'translation.*'         => 'required|array|min:1',
            'translation.*.name'    => 'required',
            'status'                => 'required|in:active,inactive'
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
        ];
    }
}
