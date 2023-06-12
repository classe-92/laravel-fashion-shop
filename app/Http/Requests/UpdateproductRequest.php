<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
        return [
            'name' => ['required', Rule::unique('products')->ignore($this->product)],
            'description' => 'nullable',
            'price' => 'nullable|min:0,01|max:9999,99',
            'cover_image' => 'nullable|image|max:255',
            'texture_id' => 'required|exists:textures,id',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'colors' => 'nullable'
        ];
    }
}