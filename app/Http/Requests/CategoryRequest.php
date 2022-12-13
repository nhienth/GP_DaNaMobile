<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required | unique:categories,category_name',
            'category_image' => ['required'],
            'parent_id' => ['required'],
        ];
    }

    public function messages() {
        return [
        'category_name.required' => 'Tên danh mục không được để trống!',
        'category_image.required' => 'Tên danh mục không được để trống!',
        'parent_id.required' => 'Tên danh mục không được để trống!',
        ];
    }
}
