<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddrequest extends FormRequest
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
            'name' => 'bail|required|unique:sliders|max:255',
            'description' => 'required',
            'image_path' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được phép để trống',
            'description.required' => 'Mô tả không được phép để trống',
            'image_path.required' => 'Ảnh không được phép để trống',
            'name.unique'  => 'Tên sản phẩm không được phép trùng với sản phẩm đã có',
            'name.max'  => 'Tên sản phẩm không được phép nhiều hơn 255 kí tự',

        ];
    }
}
