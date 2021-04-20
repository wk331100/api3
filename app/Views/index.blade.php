@include('common.header')

<div class="container">
    <div class="m-5 text-center">
        <h3>API3 接口管理系统 !</h3>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md">
            <h5 class="font-monospace lh-lg" id="w"></h5>
            <p id="btn"></p>
        </div>
        <div class="col-md-2"></div>
    </div>


</div>


@include('common.footer')
<script type="application/javascript">
    var index = 0;
    var word = "API3 接口管理系统。本着前后端分离开发模式，服务端需给前端、客户端、其他服务等提供API接口，因此，需要一个规范的接口文档编辑和查看的地方。 ?";
    function type(){
        document.getElementById("w").innerText = word.substring(0,index++);
        console.log(index)
        if(index == 120){
            document.getElementById("btn").innerHTML = "<a class=\"btn btn-dark mb-3\" href=\"/stage\">Start</a>"
            clearInterval(st1)
        }
    }
    st1 = setInterval(type, 150);


</script>