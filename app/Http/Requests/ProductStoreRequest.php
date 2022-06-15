<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric|integer|min:0|max:65535',
            'qty' => 'required|numeric|integer|min:0',
            'category' => 'required|string|max:24',
            'images' => 'required|array|min:1',
            'images.*' => 'required|mimes:jpeg,jpg,png,pdf|max:3072'
        ];
    }
}
