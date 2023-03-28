<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'metakey' => 'required',
            'metadesc' => 'required'
        ];
    }
    public function message()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên ít nhất 2 kí tự',
            'metakey.required' => 'chưa nhập từ khóa tìm kiếm',
            'metadesc.required' => 'chưa nhập mô tả'
        ];
    }
}
