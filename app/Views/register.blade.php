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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
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
            <a href="/login">登录</a>
            <b>·</b>
            <a class="active" href="/register">注册</a>
        </div>
        <!-- end login-header -->

        <!-- begin login-content -->
        <div class="login-content">
            <form action="/register" method="POST" onsubmit="return checkForm()" class="margin-bottom-0">
                @include("common.notice")
                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-control  mb-3" placeholder="邮箱" required />
                </div>
                <div class="form-group ">
                    <input type="password" name="password" class="form-control  mb-3" placeholder="密码" required />
                </div>
                <div class="form-group">
                    <input type="password" name="password_repeat" class="form-control  mb-4" placeholder="重复密码" required />
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-outline-primary form-control ">注册</button>
                </div>
                <hr class="mt-4" />
                <p class="text-center label">
                    Api3.cc©2021 Powered By Kunkka Wu
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
<script src="/js/main.js"></script>
<!-- ================== END BASE JS ================== -->

</body>
</html>

<script>
    let count = 59;
    function checkForm() {
        let email = $('#email').val();
        var myReg=/^[a-zA-Z0-9_-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/;

        if(myReg.test(email)){
            return true;
        } else {
            alert("邮箱格式不正确!");
            return false;
        }
    }


</script>
