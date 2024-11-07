<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'logo' => 'required|image|max:2999',
            'category' => 'required',
            'website' => 'required|string',
            'cover_img' => 'sometimes|image|max:3999'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'logo.required' => 'Logo is required',
            'category.required' => 'Category is required',
            'website.required' => 'Website is required',
            'cover_img.required' => 'Cover image is required',
            'title.min' => 'Title must be at least 5 characters',
            'description.min' => 'Description must be at least 5 characters',
            'logo.image' => 'Logo must be an image',
            'cover_img.image' => 'Cover image must be an image',
            'logo.max' => 'Logo must be less than 3 MB',
            'cover_img.max' => 'Cover image must be less than 3 MB'
        ];
    }
}
