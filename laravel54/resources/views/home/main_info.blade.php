  <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<link href="css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(images/main/add.jpg) no-repeat 0px 6px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9; font-size:14px; font-weight:bold; padding:10px 10px 10px 0; width:120px;}
.main-for{ padding:10px;}
.main-for input.text-word{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; padding:0 10px;}
.main-for select{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666;}
.main-for input.text-but{ width:100px; height:40px; line-height:30px; border: 1px solid #cdcdcd; background:#e6e6e6; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#969696; float:left; margin:0 10px 0 0; display:inline; cursor:pointer; font-size:14px; font-weight:bold;}
#addinfo a{ font-size:14px; font-weight:bold; background:url(images/main/addinfoblack.jpg) no-repeat 0 1px; padding:0px 0 0px 20px; line-height:45px;}
#addinfo a:hover{ background:url(images/main/addinfoblue.jpg) no-repeat 0 1px;}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理&nbsp;&nbsp;>&nbsp;&nbsp;添加用户</td>
  </tr>
  <tr>
    <td width="90%" align="left" valign="top" id="addinfo">
<!--     <a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a>
 -->    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" name="form1"  enctype="multipart/form-data" onsubmit="return checkreg()" action="insert_user_one">
      <table width="100%"  border="0" id="main-tab" cellpadding="0" cellspacing="0"  align="center">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">管理员名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="search" name="home_user_name" value="" id="User" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">管理员密码：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="password" name="home_user_password" id="Pwd" value=""  class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">确认密码：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="password" name="pwd1" value=""  id="Pwdagain" class="text-word">
        </td>
         <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">管理员头像：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="home_user_img" value="" placeholder="上传头像" class="text-word">
        </td>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">管理员Email：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="email" name="home_user_email" id="Email" value="" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
          <td align="right" valign="middle" class="borderright borderbottom bggray">管理员简介：</td>
          <td align="left" valign="middle" class="borderright borderbottom main-for">
            <textarea name="home_user_matt" style="width: 310px; height: 100px;" id="Matt" class="text-word"></textarea>
          </td>
        </tr>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">管理员权限：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="home_user_state" id="level">
	    <option value="0" >&nbsp;&nbsp;一般管理员</option>
	    <option value="1" >&nbsp;&nbsp;超级管理员</option>
        </select>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input name="" type="submit" value="提交" class="text-but">
        <input name="" type="reset" value="重置" class="text-but"></td>
        </tr>
    </table>
    </form>
    </td>
    </tr>
</table>
</body>
</html>
<SCRIPT language="JavaScript">
<!--
 function checkreg()
  {
            if (document.form1.User.value=="")
   {
    alert("请输入您的用户名!");
    form1.User.focus();
    return false;
   }
      if (document.form1.User.value.length<4 || document.form1.User.value.length>15)
   {
    alert("用户名长度限制在4-15位!");
    form1.User.focus();
    return false;
   }
      if (document.form1.Pwd.value=="")
   {
    alert("请输入密码!");
    form1.Pwd.focus();
    return false;
   }
      if (document.form1.Pwd.value.length<6 || document.form1.Pwd.value.length>15)
   {
    alert("密码长度限制在6-15位!");
    form1.Pwd.focus();
    return false;
   }
            if(document.form1.Pwd.value!=document.form1.Pwdagain.value)
   {
    alert("两次输入的密码不同!")
    form1.Pwd.focus();
    return false;
   }
      if (document.form1.Email.value=="")
   {
    alert("请输入您的Email地址!");
    form1.Email.focus();
    return false;
   }
      var myRegex = /@.*\.[a-z]{2,6}/;
      var home_user_email = form1.Email.value;
      home_user_email = home_user_email.replace(/^ | $/g,"");
      home_user_email = home_user_email.replace(/^\.*|\.*$/g,"");
      home_user_email = home_user_email.toLowerCase();
       
                        //验证电子邮件的有效性
      if (home_user_email == "" || !myRegex.test(home_user_email))
      {
        alert ("请输入有效的E-MAIL!");
        form1.Email.focus();
        return false;
      }
      if (document.form1.Matt.value=="")
      {
          alert("请做一个简单的介绍!");
          form1.Matt.focus();
          return false;
      }
      if (document.form1.Matt.value.length<8 || document.form1.Matt.value.length>40)
      {
          alert("介绍至少要在8个字到40字之间!");
          form1.Matt.focus();
          return false;
      }
      return true;
  }



//-->
   </SCRIPT>