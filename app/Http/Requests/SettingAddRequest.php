<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'required|unique:settings|max:255|min:5',
            'config_value' => 'required|min:5',


        ];
    }

    public function messages()
    {
        return [
            'config_value.required' => 'config value không được phép để trống',
            'config_key.required' => 'config key không được phép để trống',
            'config_key.unique' => 'config key không được phép trùng',

        ];
    }
}
