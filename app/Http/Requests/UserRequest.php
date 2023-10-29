<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        $rules = [
            'name' => ['required'],
            'family' => ['required'],
            'image'=>['file'],

        ];
        if ($this->method() == self::METHOD_PATCH) {

            $rules['phone'] = ['required', 'unique:users,phone,' . request()->user->id];
            $rules['email'] = ['required','email', 'unique:users,email,' . request()->user->id];

        };
        if ($this->method() == self::METHOD_POST) {
            $rules['password'] = ['required'];
            $rules['email'] = ['required', 'email', 'max:254'];
            $rules['phone'] = ['required'];
        };

        return $rules;
    }
}

