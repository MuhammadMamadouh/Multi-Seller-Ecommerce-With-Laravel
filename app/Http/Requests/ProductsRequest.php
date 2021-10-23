<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'images.0'                      => 'sometimes|mimes:jpeg,bmp,png',
            'translation'                   => 'required|array|min:1',
            'translation.*.name'            => 'required',
            'translation.*.description'     => 'string|nullable',
            'price'                       => 'required|numeric',
            'offer_price'                   => 'nullable|numeric',
//            'start_offer_at'                => 'nullable|date',
//            'end_offer_at'                  => 'nullable|date',
            'status'                        => 'required|in:active,inactive',
            'stock'                         => 'required|min:1',
//            'colors'                        => 'nullable|array',
//            'sizes.*'                       => 'nullable',
            'main_categories_id'            => 'required_without:id|exists:main_categories,id',
            'sub_category_id'               => 'nullable|exists:sub_categories,id',
            'brand_id'                      => 'required_without:id|exists:brands,id',
            'vendor_id'                     => 'nullable|exists:vendors,id',
        ];
    }

    public function messages()
    {
        return [
//            'required' => 'هذا الحقل مطلوب'
        ];
    }
}
