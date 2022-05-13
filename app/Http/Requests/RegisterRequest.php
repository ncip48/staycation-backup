<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|min:4|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'username.unique' => 'Username is already taken',
            'username.min' => 'Username must be at least 4 characters',
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already taken',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'phone.required' => 'Phone is required',
            'address.required' => 'Address is required',
            'dob.required' => 'Date of birth is required',
        ];
    }
}
