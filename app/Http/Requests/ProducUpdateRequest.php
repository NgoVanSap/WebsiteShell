<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducUpdateRequest extends FormRequest
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
            'id'          => 'required|exists:products,id',
            'name'                  => 'required|unique:products',
            'price'                 => 'required|numeric',
            'price_sale'            => 'required|numeric',
            'infomation'            => 'required',
            'image'                 => 'required|image',
            'product_type_id'       => 'required',
            'is_open'               => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required'                 => 'Tên sản phẩm không để trống',
            'name.unique'                   => 'Tên sản phẩm đã tồn tại',
            'price.required'                => 'Giá tiền không để trống',
            'price.numeric'                 => 'Giá tiền phải nhập bằng số',
            'price_sale.required'           => 'Giá khuyến mãi không để trống',
            'price_sale.numeric'            => 'Giá khuyến mãi phải nhập bằng số',
            'image.required'                => 'Ảnh không để trống',
            'image.image'                   => 'Phải chọn ảnh',
            'product_type_id.required'      => 'Hãy chọn danh mục',
            'is_open.required'              => 'Hãy chọn tình trạng',
            'infomation.required'           =>' Thông tin không để trống'
        ];
    }
}
