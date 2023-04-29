<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'usersname' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'usersname.required' => 'tên bắt buộc phải có',
            'password.required' => 'bắt buột nhập password'
        ];
    }
}
