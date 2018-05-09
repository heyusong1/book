<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="{{ asset('admin/css/css.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('admin/css/main.css') }}" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="{{ asset('admin/images/main/favicon.ico') }}" />
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form select.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF; margin-left: 10px;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url({{ asset('admin/images/main/list_input.jpg') }}) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url({{ asset('admin/images/main/add.jpg') }}) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url({{ asset('admin/images/main/list_bg.jpg') }}) repeat-x; height:32px; line-height:32px;}
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
<center>
<table width="1000px;" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="get" action="adminindex">
	         <span>图书名称：</span>
	         <input type="text" name="book_message_name" value="{{$book_message_name}}" class="text-word">
          <select class="text-word" name="book_type_id">
            <option value="">==请选择书籍分类==</option>
            @foreach ($book_type as $k => $v)
                <option {{$v->selected}} value="{{$v->book_type_id}}">{{str_repeat("=&nbsp;&nbsp;=>",$v->ji-1)}}{{$v->book_type_name}}</option>
            @endforeach
          </select>
	         <input name="" type="submit" value="查询" class="text-but">

	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="adminuser"  class="add" style="font-size: 16px; color: red;"><strong>个人中心</strong></a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">图书名称</th>
        <th align="center" valign="middle" class="borderright">图书分类</th>
        <th align="center" valign="middle" class="borderright">封面</th>
        <th align="center" valign="middle" class="borderright">作者</th>
        <th align="center" valign="middle" class="borderright">简介</th>
        <th align="center" valign="middle" class="borderright">购买积分</th>
        <th align="center" valign="middle" class="borderright">借阅积分</th>
        <th align="center" valign="middle" class="borderright">数量</th>
        <th align="center" valign="middle">操作</th>
      </tr>
       @foreach ($book as $k => $v)
      <tr class="bggray" onMouseOut="this.style.backgroundColor='#f9f9f9'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_id}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_name}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_type_name}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_id}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_author}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_desc}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_buy}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_loan}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$v->book_message_num}}</td>
        @if ($v->book_message_num== 0) <td align="center" valign="middle" class="borderbottom"><a href="adminorder"  onFocus="this.blur()" class="add"><strong style="font-size: 16px; color: red">预约</strong></a><span class="gray">&nbsp;</td>
        @else
        <td align="center" valign="middle" class="borderbottom"><a href="add.html"  onFocus="this.blur()" class="add"><strong style="font-size: 16px; color: green">借阅</strong></a><span class="gray">&nbsp;</td>
        @endif
      </tr>
       @endforeach
    </table></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="fenye">{{$data['num']}} 条数据 1/1 页&nbsp;&nbsp;<a href="adminindex?page=1&book_message_name=<?= $book_message_name?>&book_type_id=<?= $book_type_id?>"  >首页</a>&nbsp;&nbsp;<a href="adminindex?page=<?= $data['up']?>&book_message_name=<?= $book_message_name?>&book_type_id=<?= $book_type_id?>"  >上一页</a>&nbsp;&nbsp;<a href="adminindex?page=<?= $data['next']?>&book_message_name=<?= $book_message_name?>&book_type_id=<?= $book_type_id?>">下一页</a>&nbsp;&nbsp;<a href="adminindex?page=<?= $data['num_page']?>&book_message_name=<?= $book_message_name?>&book_type_id=<?= $book_type_id?>"  >尾页</a></td>
  </tr>
</table>
</center>
</body>
</html>