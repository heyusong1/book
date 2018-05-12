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
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
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
.bggray{ background:#f9f9f9}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
           <form method="get" action="books_show">
          <select class="text-word" name="book_type_id">
            <option value="">==请选择书籍分类==</option>
            @foreach ($book_type as $k => $v)
                <option {{$v->selected}} value="{{$v->book_type_id}}">{{str_repeat("=&nbsp;&nbsp;=>",$v->ji-1)}}{{$v->book_type_name}}</option>
            @endforeach
          </select>
          <input type="submit" name="" value="查询" >
           

           </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">图书ID</th>
        <th align="center" valign="middle" class="borderright">图书名称</th>
        <th align="center" valign="middle" class="borderright">图书分类ID</th>
        <th align="center" valign="middle" class="borderright">图书价格</th>
        <th align="center" valign="middle" class="borderright">结束积分</th>
        <th align="center" valign="middle" class="borderright">图书数量</th>
        <th align="center" valign="middle" class="borderright">图书图片</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      @foreach ($book as $k => $v)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom"><input type="checkbox" name="box" class="box" value="{{$v->book_message_id}}">{{$v->book_message_id}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_name}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_type_id}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_buy}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_loan}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_num}}</td>
        <td align="center" valign="middle" class="borderright borderbottom"><img src="{{$v->book_message_img}}" alt="" width="150px" height="50px"></td>
        <td align="center" valign="middle" class="borderbottom"><a href="books_del?id={{$v->book_message_id}}">删除</a>|| <a href="books_update?id={{$v->book_message_id}}">修改</a>|| <button class="pl">批量删除</button></td>
      </tr>
      @endforeach
  <tr>
  </tr>
   <tr>
  <tr>
    <td align="left" valign="top" class="fenye">{{$data['num']}} 条数据 1/1 页&nbsp;&nbsp;<a href="books_show?page=1&book_message_name=<?= $book_message_name?>&book_type_id=<?= $book_type_id?>"  >首页</a>&nbsp;&nbsp;<a href="books_show?page=<?= $data['up']?>&book_message_name=<?= $book_message_name?>&book_type_id=<?= $book_type_id?>"  >上一页</a>&nbsp;&nbsp;<a href="books_show?page=<?= $data['next']?>&book_message_name=<?= $book_message_name?>&book_type_id=<?= $book_type_id?>">下一页</a>&nbsp;&nbsp;<a href="books_show?page=<?= $data['num_page']?>&book_message_name=<?= $book_message_name?>&book_type_id=<?= $book_type_id?>"  >尾页</a></td>
  </tr>
  </tr>
</table>

</body>
</html>

<script src="jquery-1.8.2.min.js"></script>
<script>
  //批量删除
$(".pl").click(function(){
    var box = $(".box");
    length  = box.length;
    var str ="";
    for(var i=0;i<length;i++){
    if(box[i].checked==true){
    str =str+","+box[i].value;
    }
    }
    str= str.substr(1)
    location.href="del3?id="+str;
})
</script>