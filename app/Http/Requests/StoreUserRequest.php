<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'username' => [
                'required',
                'string',
                'min:5',
                'max:16',
                'unique:users',
                'regex:/(^([a-z|A-Z|\d|_@.]+)?$)/u',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'max:20',
                'regex:/(^([a-z|A-Z|\d|!@#$%^&*_-]+)?$)/u',
            ],
            'password_confirmation' => 'required|min:6|max:20',
            'role' => 'required|exists:users,role',
            'fullname' => 'nullable|string|min:3|max:191',
            'email' => 'required|email|max:191|unique:users',
            'gender' => 'nullable|numeric',
            'birthday' => 'nullable|format_date',
        ];

        return $rules;
    }
}
