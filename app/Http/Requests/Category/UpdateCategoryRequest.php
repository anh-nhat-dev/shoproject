<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use App\Support\AddSlugToRequest;

class UpdateCategoryRequest extends FormRequest
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
            'slug' => "required|unique:categories,slug,{$this->segment(3)},category_id"
        ];
    }


}
