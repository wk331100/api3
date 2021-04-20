<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>登录 | {{$title}}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/all.min.css">
</head>
<body class="pace-top">
<!-- begin #page-loader -->
    <!-- begin login -->
    <div class="login">
        <!-- begin login-header -->
        <div class="normal-title">
            <a class="active" href="/login">登录</a>
            <b>·</b>
            <a class="" href="/register">注册</a>
        </div>
        <!-- end login-header -->

        <!-- begin login-content -->
        <div class="login-content">
            <form action="/doLogin" method="POST" class="margin-bottom-0">
                @csrf
                @include('common.notice')
                <div class="form-group m-b-20">
                    <input type="text" name="phone" class="form-control" placeholder="手机号" required />
                </div>
                <div class="form-group m-b-15">
                    <input type="password" name="password" class="form-control" placeholder="密码" required />
                </div>
                <div class="checkbox checkbox-css m-b-30">
                    <input type="checkbox" id="remember_me_checkbox" value="" />
                    <label for="remember_me_checkbox" class="label">
                        记住账号
                    </label>
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-outline-success btn-block  ">登录</button>
                </div>
                <hr />
                <p class="text-center label">
                    &copy; http://blog.getcoder.cn All Right Reserved 2019
                </p>
            </form>
        </div>
        <!-- end login-content -->
    </div>
    <!-- end login -->

<!-- ================== BEGIN BASE JS ================== -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha384-L2pyEeut/H3mtgCBaUNw7KWzp5n9+4pDQiExs933/5QfaTh8YStYFFkOzSoXjlTb" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
<!-- ================== END BASE JS ================== -->

</body>
</html>
