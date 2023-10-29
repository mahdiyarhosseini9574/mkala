<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

            'title' => ['required'],
            'description' => ['required'],
            'meta_description' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'deleted_at' => ['nullable', 'date'],
            'image'=>['file']
        ];
        return $rules;

//        if ($this->method() == self::METHOD_POST) {
//            $rules['user_id'] = ['required'];
//            $rules['category_id'] = ['required'];
//            $rules['brand_id'] = ['required'];
//            if ($this->method() == self::METHOD_PATCH) {
////                $rules['user_id'] = ['required', 'exists:users'];
//                $rules  ['category_id'] = ['required', 'exists:categories'];
//                $rules ['brand_id'] = ['required', 'exists:brands'];

            }




}
