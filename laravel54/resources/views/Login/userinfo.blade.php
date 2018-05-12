  <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>展示个人信息</title>
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
  <center>
<!--main_top-->
<div style="float: left;margin-left: 200px;">
<table width="500px;" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    
  </tr>
  <tr>
    <td width="90%" align="left" valign="top" id="addinfo">
<!--     <a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a>
 -->    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
      <table width="100%"  border="0" id="main-tab" cellpadding="0" cellspacing="0"  align="center">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">用户名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="search" name="user_info_email" disabled="disabled" value="{{$userdata['0']->admin_user_name}}" id="User" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">手机号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="search" name="user_info_email" disabled="disabled" value="{{$userdata['0']->admin_user_tel}}" id="User" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">邮箱：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="search" name="user_info_email" disabled="disabled" value="{{$userdata['0']->user_info_email}}" id="User" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">住址：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="user_info_site" disabled="disabled" id="Pwd" value="{{$userdata['0']->user_info_site}}"  class="text-word">
        </td>
        </tr>
       <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">性别：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="user_info_site" id="" disabled="disabled" value="@if ($userdata['0']->user_info_sex==1)男@elseif ($userdata['0']->user_info_sex==2)女 @endif" class="text-word"></td></tr>
         <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">身份证：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="user_info_id_card" disabled="disabled" value="{{$userdata['0']->user_info_id_card}}"  class="text-word">
        </td>
         <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">个人钱包</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="user_info_id_card" disabled="disabled" value="{{$userdata['0']->user_info_money}}"  class="text-word">
        </td>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input name="" type="button" value="修改" onclick="dian()" class="text-but">
        <input name="" type="reset" value="重置" class="text-but"></td>
        </tr>
    </table>
    </td>
    </tr>
</table>
</div>
<div style="float: left; ">
        <h2>借阅的书籍</h2> 
    <table width="600px;" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright" style="width: 100px;">图书名称</th>
        <th align="center" valign="middle" class="borderright">图书分类</th>
        <th align="center" valign="middle" class="borderright">封面</th>
        <th align="center" valign="middle" class="borderright">作者</th>
        <th align="center" valign="middle" class="borderright" style="width: 100px;">状态</th>
        <th align="center" valign="middle">操作</th>
      </tr>
       @foreach ($loan_book as $k => $v)
      <tr class="bggray" onMouseOut="this.style.backgroundColor='#f9f9f9'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_id}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_name}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_type_name}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_id}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_author}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">
           @if ($v->book_state==0)
          
            <strong style="font-size: 16px; color: green">正在借阅中</strong>
          
          @else
            <strong style="font-size: 16px; color: red">正在还书</strong>
          @endif
        </td>
       <td align="center" valign="middle" class="borderbottom"><a href=""  onFocus="this.blur()" class="add"><strong style="font-size: 16px; color: red">
         @if ($v->book_state==0)
          
            <strong style="font-size: 16px; color: green">我要还书</strong>
          
          @else
            <strong style="font-size: 16px; color: red"></strong>
          @endif



       </strong></a><span class="gray">&nbsp;</td>
      </tr>
       @endforeach
      </td>
    </tr>
</table>
 <h2>预约的书籍</h2> 
    <table width="600px;" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright" style="width: 100px;">图书名称</th>
        <th align="center" valign="middle" class="borderright">图书分类</th>
        <th align="center" valign="middle" class="borderright">封面</th>
        <th align="center" valign="middle" class="borderright">作者</th>
        <th align="center" valign="middle" class="borderright" style="width: 100px;">状态</th>
        <th align="center" valign="middle">操作</th>
      </tr>
       @foreach ($order_book as $k => $v)
      <tr class="bggray" onMouseOut="this.style.backgroundColor='#f9f9f9'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_id}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_name}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_type_name}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_id}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_author}}</td>

        <td align="center" valign="middle" class="borderright borderbottom">
          @if ($v->order_state==0)
          
            <strong style="font-size: 16px; color: green">正在预约</strong>
          
          @else
            <strong style="font-size: 16px; color: red">可以去取书</strong>
          @endif
        </td>
        <td align="center" valign="middle" class="borderbottom"><a href="delorder?order_id=<?= $v->order_id?>"   class="add"><strong style="font-size: 16px; color: red">取消预约</strong></a><span class="gray">&nbsp;</td>
        
      </tr>
       @endforeach
      </td>
    </tr>
</table>
</div>
</center>
</body>
</html>
<script type="text/javascript">
  function dian()
  {
    location.href='updateuser';
  }
</script>

