<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'=>'required|unique:products',
            'price'=>'required|numeric',
            'sale_price'=>'required|numeric',
            'photo'=>'required|image',
            'category_id'=>'required'
        ];
    }
    public function messages():array {
        return [
            'name.required'=>'Vui long dien ten danh muc',
            'name.unique'=>"$this->name da ton tai",
            'price.required'=>'Gia khong de trong',
            'price.numeric'=>'Gia phai la so',
            'sale_price.required'=>'Gia KMkhong de trong',
            'sale_price.numeric'=>'Gia KM phai la so',
            'photo.required'=>'Anh khong de trong',
            'photo.image'=>'ANh khong dung dinh dang',
            'category_id.required'=>'Danh muc khong de trong',
        ];
    }
}
