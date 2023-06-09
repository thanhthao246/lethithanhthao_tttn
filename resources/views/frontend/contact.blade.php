@extends('layouts.site')
@section('title', 'Liên hệ')
@section('content')
    <style>

    </style>
    <div class="container back">
        <div class="row">
            <div class="col-md-6">
                <H4>THÔNG TIN LIÊN HỆ</H4>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Số điện thoại:</h5>
                    </div>
                    <div class="col-md-6">
                        <p>0367890256</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Email:</h5>
                    </div>
                    <div class="col-md-6">
                        <p>thanhthao@gmail.com</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Địa chỉ:</h5>
                    </div>
                    <div class="col-md-6">
                        <p>20 đường Tăng Nhơn Phú, Phước Long B, Q9</p>
                    </div>
                </div>
                <h4></h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6590.536588029644!2d106.77368496678501!3d10.82993724816805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752701a34a5d5f%3A0x30056b2fdf668565!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEPDtG5nIFRoxrDGoW5nIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1686039187392!5m2!1svi!2s"
                    width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                @includeIf('frontend.message_alert')
                <form action="" method="POST" role="form">
                    <legend>THÔNG TIN CẦN GỬI</legend>
                    @csrf
                    <div class="form-group ">
                        <label for="">Họ tên</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên">
                        @if ($errors->any())
                            {{ $errors->first('name') }}
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email">
                        @if ($errors->any())
                            {{ $errors->first('email') }}
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <label for="">Phone</label>
                        <input class="form-control" name="phone" placeholder="Nhập số điện thoại">
                        @if ($errors->any())
                            {{ $errors->first('phone') }}
                        @endif
                    </div>
                    <div class="form-group my-3">
                        <label for="">Nội dung</label>
                        <textarea name="content" class="form-control" cols="20" rows="5"></textarea>
                        @if ($errors->any())
                            {{ $errors->first('content') }}
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Gửi đi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
