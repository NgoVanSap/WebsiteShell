<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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

            'emailCus'         => 'required|email|unique:customers',
            'usernameCus'      => 'required|unique:customers',
            'passwordCus'      => 'required|max:20|min:6',
            're_passwordCus'   => 'required|same:password',
            'phoneCus'          => 'required|min:11|numeric',
        ];
    }
}
