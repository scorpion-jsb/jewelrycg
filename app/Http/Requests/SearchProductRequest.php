<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'searchWord' => 'nullable|string|max:255',
            'categoryId' => 'required|string|max:24'
        ];
    }
}
