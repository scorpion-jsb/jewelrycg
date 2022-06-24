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
        $image_required = 'required';
        if(request()->routeIs('backend.products.update'))
        {
            $image_required = 'nullable';
        }

        return [
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|string',
            'qty' => 'required|numeric|integer|min:0',
            'category' => 'required|string|max:24',
            'images' => "$image_required|array|min:1",
            'images.*' => "$image_required|mimes:jpeg,jpg,png,pdf|max:3072"
        ];
    }
}
