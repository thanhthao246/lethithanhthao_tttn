<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh Thao</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css') }}">

</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-white text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="card-body">
                                <p class="login-box-msg">Đăng nhập để tiếp tục</p>

                                <form action="{{ route('postlogin') }}" method="post">
                                    @method('POST')
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input name="usersname" type="name" class="form-control form-control-lg" />
                                        <label class="form-label" for="Email"></label>
                                        @if ($errors->any())
                                            {{ $errors->first('usersname') }}
                                        @endif
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input name="password" type="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX"></label>
                                        @if ($errors->any())
                                            {{ $errors->first('password') }}
                                        @endif
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="remember">
                                                <label for="remember">
                                                    Lưu đăng nhập?
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                                <div class="social-auth-links text-center mt-2 mb-3">
                                    <a href="#" class="btn btn-block btn-primary">
                                        <i class="fab fa-facebook mr-2"></i> Đăng nhập bằng Facebook
                                    </a>
                                    <a href="#" class="btn btn-block btn-danger">
                                        <i class="fab fa-google-plus mr-2"></i> Đăng nhập bằng Google+
                                    </a>
                                </div>
                                <!-- /.social-auth-links -->

                                <p class="mb-1">
                                    <a href="forgot-password.html">Bạn đã quên password?</a>
                                </p>
                                <p class="mb-0">
                                    <a href="register.html" class="text-center">Tạo tài Khoản mới?</a>
                                </p>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
