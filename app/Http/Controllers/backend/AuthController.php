<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function getlogin()
    {
        return view('backend.user.login');
    }
    function postlogin(Request $request)
    {
        $usersname = $request->usersname;
        $password = $request->password;
        if (filter_var($usersname, FILTER_VALIDATE_EMAIL)) {
            $data = ['email' => $usersname, 'password' => $password];
        } else {
            $data = ['name' => $usersname, 'password' => $password];
        }
        if (Auth::attempt($data)) {
            echo "thành công";
        } else {
            echo "thất bại";
        }
    }
}
