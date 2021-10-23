<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributRequest extends FormRequest
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
            'translation.*'         => 'required|array|min:1',
            'translation.*.name'    => 'required',
            'main_category_id'  => 'sometimes|exists:main_categories,id'

        ];
    }
}
