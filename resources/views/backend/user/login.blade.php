<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh Thao</title>
</head>

<body>
    <div>
        <form action="{{ route('postlogin') }}" method="get" accept-charset="utf-8">
            @csrf
            <input type="text" name="username" class="form-contrrol">
            <input type="password" name="password" class="form-contrrol">
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</body>

</html>
