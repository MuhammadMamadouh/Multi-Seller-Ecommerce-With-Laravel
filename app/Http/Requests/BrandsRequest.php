<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandsRequest extends FormRequest
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
            'translation'               => 'required|array|min:1',
            'translation.*.description' => 'nullable',
            'translation.*.name'        => 'required',
            'status'                    => 'required|in:active,inactive',
            'photo'                     => 'sometimes|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'max'      => __('validation.max'),
        ];
    }
}
