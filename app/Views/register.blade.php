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
            <a href="/login">登录</a>
            <b>·</b>
            <a class="active" href="/register">注册</a>
        </div>
        <!-- end login-header -->

        <!-- begin login-content -->
        <div class="login-content">
            <form action="/register/doRegister" method="POST" class="margin-bottom-0">
                @csrf
                @if(!empty(session('error')))
                    @foreach(session('error') as $item)
                    <div class="alert alert-danger fade show label">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>错误!</strong>
                        {{$item}}
                    </div>
                    @endforeach
                @endif
                <div class="form-group m-b-20">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="手机号" required />
                </div>
                <div class="form-group m-b-15 clearfix">
                    <input type="text" name="code" class="form-control code pull-left" placeholder="验证码" required />
                    <button type="button" id="send-button" class="btn btn-sm btn-outline-info pull-left" style="margin-top: 3px" onclick="sendCode();">发送验证码</button>
                </div>
                <div class="form-group m-b-15">
                    <input type="password" name="password" class="form-control" placeholder="密码" required />
                </div>
                <div class="form-group m-b-15">
                    <input type="password" name="password_repeat" class="form-control" placeholder="重复密码" required />
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-outline-success btn-block  ">注册</button>
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
<script src="/editor/third-party/jquery-1.10.2.min.js"></script>
<script src="/js/main.js"></script>
<!-- ================== END BASE JS ================== -->

</body>
</html>

<script>
    let count = 59;
    function sendCode() {
        let url = '/register/sendCode'
        let phone = $('#phone').val();
        let data = 'phone=' + phone;
        if(phone == ''){
            alert('手机号不能为空');
            return false;
        }

        $.ajax({
            type: "POST",//方法类型
            dataType: "json",//预期服务器返回的数据类型
            url: url ,//url
            data: data,
            success: function (result) {
                console.log(result);//打印服务端返回的数据(调试用)
                if (result.code == 200) {
                    $('#send-button').html('发送成功 60');
                    $('#send-button').attr('disabled', 'disabled');
                    var codeTimer = setInterval(function(){
                        $('#send-button').html('发送成功 ' + count);
                        count--;
                        if(count <= 0){
                            clearInterval(codeTimer);
                            $('#send-button').html('发送验证码');
                            $('#send-button').removeAttr('disabled')
                        }
                    }, 1000);
                } else {
                    alert('错误: ' + result.msg + '【code:' + result.code + '】');
                }
            },
            error : function() {
                alert("异常！");
            }
        });
    }


</script>
