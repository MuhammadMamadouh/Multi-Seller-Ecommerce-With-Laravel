<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'name'              => 'required|string|max:255',
            'email'             => 'sometimes|email|max:255|unique:vendors,email,except,'. $this->id,
            'mobile'            => 'nullable|unique:vendors,mobile,' .$this->id,
            'password'          => 'sometimes|string|min:6',
            'address'           => 'nullable|string',
            'photo'             => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'status'            => 'sometimes|in:active,inactive',
            'main_category_id'  => 'required_without:id|exists:main_categories,id'
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'max' => __('validation.max'),
            'email' => __('validation.email')
        ];
    }
}
