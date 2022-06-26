<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $image_required = 'required';
        if(request()->routeIs('backend.posts.update'))
        {
            $image_required = 'nullable';
        }

        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'categorie_id' => 'required',
            'post' => 'required',
            'cover_image' => "$image_required",
            'cover_image.*' => "$image_required|mimes:jpeg,jpg,png,pdf|max:3072"
        ];
    }
    
}
