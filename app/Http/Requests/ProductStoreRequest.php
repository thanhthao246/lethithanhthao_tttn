<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'detail' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price_buy' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'detail.required' => 'chưa nhập từ khóa tìm kiếm',
            'metakey.required' => 'chưa nhập từ khóa tìm kiếm',
            'metadesc.required' => 'chưa nhập mô tả',
            'category_id.required' => 'chưa chọn danh mục',
            'brand_id.required' => 'chưa chọn thương hiệu',
            'price_buy.required' => 'chưa nhập giá'

        ];
    }
}
