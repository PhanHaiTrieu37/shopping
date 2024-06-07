<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|unique:products|max:255|min:10',
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required'

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được phép để trống',
            'price.required' => 'Giá sản phẩm không được phép để trống',
            'category_id.required' => 'Danh mục sản phẩm không được phép để trống',
            'contents.required' => 'Mô tả sản phẩm không được phép để trống',
            'name.unique'  => 'Tên sản phẩm không được phép trùng với sản phẩm đã có',
            'name.max'  => 'Tên sản phẩm không được phép nhiều hơn 255 kí tự',
            'name.min'  => 'Tên sản phẩm không được phép ít hơn 10 kí tự',
        ];
    }
}
