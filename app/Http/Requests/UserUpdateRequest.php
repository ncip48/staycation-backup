<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'username' => 'sometimes|string|max:255',
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255',
            'phone' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:255',
            'dob' => 'sometimes|date',
        ];
    }
}
