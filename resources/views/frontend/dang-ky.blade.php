<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký tài khoản</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style> 
    .lienket {

      margin-top: 20px !important;
      width: 120px;
      height: 37px;
      margin: auto;
      border-radius: 5px;
      background: rgb(47, 11, 250);
      position: relative;
      bottom: 57px;
      right: 80px;
    }
    .lienket a{
      text-decoration: none;
      color: aliceblue;
      position: relative;
      top: 3px;
      left: 20px;
    }
  </style>
</head>
<body>
	<div class="col-md-12">
    <div class="row">
        <div class="col-md-4"></div>
		<div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Thông tin đăng ký tài khoản</h2>
                </div>
                  <form action="{{route('login.xulidangky')}}" method="post">
                    @method('POST')
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                          <label for="usr">Họ và tên</label>
                          <input required="true" name="name" type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                          <label for="email">Địa chỉ gmail</label>
                          <input required="true"  name="email" type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="usr">Tài khoản người dùng</label>
                            <input required="true" name="username" type="text" class="form-control" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Số điện thoại</label>
                            <input required="true" name="phone" type="text" class="form-control" id="usr">
                          </div>
                        <div class="form-group">
                          <label for="pwd">Mật khẩu</label>
                          <input required="true" type="password" name="password" class="form-control" id="pwd">
                        </div>
                        {{-- <div class="form-group">
                          <label for="confirmation_pwd">Confirmation Password:</label>
                          <input required="true" type="password" class="form-control" id="confirmation_pwd">
                        </div> --}}
                        <div class="form-group">
                          <label for="address">Địa chỉ</label>
                          <input type="text" class="form-control" name="address" id="address">
                        </div>
                        <button class="btn btn-success">ĐĂNG KÝ</button>
                    </div>
                  </form>
                  <div class="lienket">
                    <a href="{{route('site.postlogin')}}">ĐĂNG NHẬP</a>
                  </div>
            </div>
        </div>
        <div class="col-md-4">
          
        </div>
    </div>
	</div>
</body>
</html>