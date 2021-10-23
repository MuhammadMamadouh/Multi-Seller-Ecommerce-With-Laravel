<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'title'                     => 'required|string',
            'code'                      => 'required|string',
            'value'                     => 'required|numeric',
            'status'                    => 'nullable|in:active,inactive',
            'free_shipping'             => 'nullable|in:0,1',
            'start_at'                  => 'nullable|date|after_or_equal:today',
            'end_at'                    => 'nullable|date|after:start_at',
            'discount_type'             => 'required|in:fixed,percent',
            'minimum_spend'             => 'nullable|numeric',
            'maximum_spend'             => 'nullable|numeric',
            'usage_limit_per_limit'     => 'nullable|numeric',
            'usage_limit_per_customer'  => 'nullable|numeric',
        ];
    }
}
