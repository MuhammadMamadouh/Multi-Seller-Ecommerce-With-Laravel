<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'translation.*.title'       => 'required|string',
            'translation.*.description' => 'nullable',
            'photo'                     => 'sometimes|mimes:jpeg,jpg,png',
//            'condition'                 => 'nullable|in:banner,promo',
            'status'                    => 'nullable|in:active,inactive'
        ];
    }
}
