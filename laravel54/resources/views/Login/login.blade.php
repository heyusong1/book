
<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>登录表单</title>
	<style type="text/css">
		#sendcode { 
			
			background: #CCCCFF asset('admin/login/images/overlay.png')  repeat-x;
			display: inline-block;
			padding: 5px 10px 6px;
			color: #fff;
			text-decoration: none;
			-moz-border-radius: 6px;
			-webkit-border-radius: 6px;
			-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
			-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
			text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
			border-bottom: 1px solid rgba(0,0,0,0.25);
			position: relative;
			cursor: pointer
		
		 }
		 #admin_user_tel { 
			
			width: 250px;
		
		 }
	</style>
	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="{{ asset('admin/login/css/style.css') }}" type="text/css" media="all">
	<script src="{{ asset('admin/login/css/jquery.min.js') }}"></script>


</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>登录表单</h1>

	<div class="container w3layouts agileits">

		<div class="login w3layouts agileits">
			<h2>登 录</h2>
			<form action="login_user" method="get">
				<input type="text" Name="admin_user_name" placeholder="用户名" required="">
				<input type="password" Name="admin_user_pwd" placeholder="密码" required="">

			<ul class="tick w3layouts agileits">
				
			</ul>
			<div class="send-button w3layouts agileits">

					<input type="submit" value="登 录">

			</div>
			</form>
			<div class="clear"></div>
		</div><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" ></a></div>
		<div class="register w3layouts agileits">
			<h2>注 册</h2>
			<form action="user_insert" method="get">
				<input type="text" Name="admin_user_name" placeholder="用户名" required="">
				<font style="position: absolute; right: 380px; top: 290px; color: #999" class="name_info"></font>
				<input type="password" Name="admin_user_pwd" placeholder="密码" required="">
				<font style="position: absolute; right: 380px; top: 350px; color: #999" class="pwd_info"></font>
				<input type="text" Name="admin_user_tel" id="admin_user_tel" placeholder="手机号" required="" ></input><a id="sendcode" style="position: absolute; right: 380px; top: 410px; " onclick="sendCode(this)" >验证码</a><a id="sendcode_" class="codebrother" style="display:none;position: absolute; top: 410px; right: 380px; color: red;"></a>
							<font style="position: absolute; right:460px; top: 410px; color: #999" class="phone_info"></font>
				<input type="text" Name="Phone_Number" placeholder="验证码" required="">
				<font style="position: absolute; right: 166px; top: 345px; color: #999" class="code_info"></font>

			<div class="send-button w3layouts agileits">
					<input type="submit" value="免费注册">
			</div>
			</form>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>

	</div>

	<div class="footer w3layouts agileits">
		
	</div>

</body>
<!-- //Body -->

</html>
<script type="text/javascript">
    var nums = 60;//验证码秒数
    function sendCode(thisBtn)
    {
        var phone_rule = /^[1][3,4,5,7,8][0-9]{9}$/;
        var admin_user_tel 	   = $("input[name='admin_user_tel']").val();

        var my_		   = $("#sendcode");

        if ( admin_user_tel =='' || !phone_rule.test(admin_user_tel)){
            $(".phone_info").html("手机号错误");
            return false;
        }

        $.ajax({
            type:"get",
            url:"{{url('validation')}}",
            data:{admin_user_tel:admin_user_tel},
            success:function(a){
                if(a==1)
                {
                    $(".phone_info").html("手机号已存在");
                }
                if(a==2)
                {
                    $(".phone_info").html("系统繁忙");
                }
                if(a==3)
                {
                    $("#sendcode").hide(); 					   //将发送验证码按钮隐藏
                    $(".codebrother").show();				   //将定时器显示
                    $(".codebrother").html(nums+'秒后重新获取');//读取秒数
                    clock = setInterval(doLoop, 1000); 		   //一秒执行一次
                }
            }
        })
    }
    function doLoop()
    {

        nums--;
        if(nums > 0){

            $(".codebrother").html(nums+'秒后重新获取');
        }else{
            clearInterval(clock); //清除js定时器
            $(".codebrother").hide()
            $("#sendcode").show();
            $("#sendcode").html("验证码");
            nums = 60; //重置时间
        }
    }
    $("[name='admin_user_name']").blur(function(){
        if (this.value=='' || this.value.length > 20 || this.value.length<4 ){
            $(".name_info").html("长度为4~20位");
            return false;
        }else{
            $(".name_info").html("");
            return true;
        }
    })
    $("[name='admin_user_pwd']").blur(function(){
        if (this.value=='' || this.value.length > 20 || this.value.length<6 ){
            $(".pwd_info").html("密码为6~20位");
            return false;
        }else{
            $(".pwd_info").html("");
            return true;
        }
    })



    $("[name='admin_user_tel']").blur(function(){

        var phone_rule = /^[1][3,4,5,7,8][0-9]{9}$/;
        // var yes_no = $("[name='type']:checked").val() ? $("[name='type']:checked").val() :'';
        //alert(yes_no)

        if (this.value=='' || !phone_rule.test(this.value) ){
            $(".phone_info").html("手机号错误");
            return false;
        }else{
            $(".phone_info").html("");
            return true;
        }
    })

    $("[name='phone']").focus(function(){

        $(".phone_info").html("");

    })
</script>