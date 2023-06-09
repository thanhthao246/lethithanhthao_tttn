<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DangNhapController extends Controller
{
    public function dangky()
    {
        return view('frontend.dang-ky');
    }
    public function xulydangky(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'address' => 'required',
            'phone' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',

        ], [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng ít nhất phải 3 kí tự',
            'email.required' => 'Bạn chưa nhập địa chỉ email',
            'email.email' => 'Bạn chưa nhập địa chỉ email không đúng dạng',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 3 kí tự',
            'password.max' => 'Mật khẩu tối đa 32 kí tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'username.required' => 'Bạn chưa nhập tên tài khoản',

        ]);
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->roles = 2;
        //$user->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $user->created_by = 1;
        $user->status = 1;
        //  var_dump($user);
        $user->save();
        return redirect()->route('site.home');
    }
}
