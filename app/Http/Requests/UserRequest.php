<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'name'      => 'required|string|max:255',
//            'username'  => 'sometimes|unique:users,username,except,'. $this->id,
//            'email'     => 'sometimes|email|max:255|unique:users,email,except,'. $this->id,
            'password'  => ['sometimes'],
            'phone'     => 'nullable|numeric',
            'address'   => 'nullable|string',
            'photo'     => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
