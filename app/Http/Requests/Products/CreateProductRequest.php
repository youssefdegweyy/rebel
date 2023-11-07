<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
            'points_price' => 'required|numeric|gt:0',
            'discount_price' => 'nullable|numeric|lt:price',
            'description' => 'required',
            'size_one_stock' => 'nullable|numeric',
            'size_two_stock' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|mimes:jpg,jpeg,png',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|mimes:jpg,jpeg,png',
        ];
    }
}
