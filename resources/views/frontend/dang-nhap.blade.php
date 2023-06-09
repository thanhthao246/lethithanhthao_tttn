@extends('layouts.site')
@section('title', 'Đăng nhập')
@section('content')
<style>
    .login{
      margin: auto;
      width: 350px;
      height: 300px;
      border: 1px solid gray;
      border-radius: 10px;
      text-align: center;

    }
    .login h2{
      margin-top: 10px
    }
    .dangky{
      margin-top: 25px !important;
    }
    input{
      width: 300px !important;
      border: 1px solid gray;
      border-radius: 15px !important;
      padding-left: 10px;
      margin: auto;
    }
    {
      width: 200px;
      height: 40px;
      margin-bottom: 20px;
      border: 1px solid gray;
      border-radius: 7px;
      background: skyblue;
    }
    .lienket {
      margin-top: 20px !important;
      width: 110px;
      height: 37px;
      margin: auto;
      border-radius: 5px;
      background: rgb(41, 13, 224);

    }
    .lienket a{
        text-decoration: none;
        color: aliceblue;
      top: 3px;
      left: 20px;
    }
    .button{
        color: aliceblue;
      width: 110px;
      height: 37px;
      margin: auto;
      border-radius: 5px;
      background: rgb(41, 13, 224);
    }
  </style>
<div class="login">
    <h2>ĐĂNG NHẬP</h2>
    <form class="dang-ky" action="{{route('site.login')}}" method="post" accept-charset="utf-8">
      @csrf
      @includeIf('frontend.massage_alert')
      <input type="text" name="username" class="form-control " placeholder="Nhập tên người dùng"><br/>
      @if ($errors->any())
        {{ $errors->first('name') }}     
        @endif
      <input type="password" name="password" class="form-control " placeholder="Nhập mật khẩu"><br/>
      @if ($errors->any())
        {{ $errors->first('password') }}
            
        @endif
      <button class="button" type="submit">ĐĂNG NHẬP</button>
  </form>
  <div class="lienket">
    <a href="{{route('login.xulidangky')}}">ĐĂNG KÝ</a>
  </div>
  </div>
@endsection