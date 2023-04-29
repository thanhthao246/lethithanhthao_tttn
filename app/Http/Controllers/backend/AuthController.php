<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    function getlogin()
    {
        return view('backend.auth.login');
    }
    function postlogin(LoginRequest $request)
    {
        $usersname = $request->usersname;
        $password = $request->password;
        $data = ['username' => $usersname, 'password' => $password];
        if (Auth::attempt($data)) {
            return redirect(('admin'));
            echo bcrypt($password);
        } else {
            return redirect(('admin/login'));
            echo bcrypt($password);
        }
    }
    function logout(){
        Auth::logout();
        return redirect(('admin/login'));
    }
}
