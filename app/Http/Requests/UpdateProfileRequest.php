<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check() && ($this->user->id === \Auth::user()->id);
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
                'regex:/(^([a-z|A-Z|\d|_@.]+)?$)/u',
                Rule::unique('users')->ignore($this->user->id)
            ],
            'fullname' => 'nullable|string|min:3|max:191',
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('users')->ignore($this->user->id)
            ],
            'gender' => 'nullable|numeric',
            'birthday' => 'nullable|format_date',
            'description' => 'nullable|string',
            'avatar' => 'nullable|image',
        ];

        return $rules;
    }
}
