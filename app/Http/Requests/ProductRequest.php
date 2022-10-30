<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'                  => 'required',
            'price'                 => 'required|numeric',
            'price_sale'            => 'required|numeric',
            'infomation'            => 'required',
            'image'                 => 'required|image',
            'product_type_id'       => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required'                 => 'Product name can be blank',
            'price.required'                => 'Price is not blank',
            'price.numeric'                 => 'Price must be entered in numbers',
            'price_sale.required'           => 'Promotion price is not empty',
            'price_sale.numeric'            => 'Promotion price must be entered in numbers',
            'image.required'                => 'Photos are not blank',
            'image.image'                   => 'Must choose photo',
            'product_type_id.required'      => 'Please select a category',
            'infomation.required'           =>' Information is not blank'
        ];
    }
}
