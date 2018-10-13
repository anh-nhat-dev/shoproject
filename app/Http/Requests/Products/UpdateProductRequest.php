<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use App\Support\AddSlugToRequest;

class UpdateProductRequest extends FormRequest
{
    use AddSlugToRequest;
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => "required|unique:products,slug,{$this->segment(3)},product_id",
            'sku' => "required|unique:products,sku,{$this->segment(3)},product_id",
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'status' => 'required'
        ];
    }
}
