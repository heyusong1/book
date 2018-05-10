<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="{{ asset('home/css/css.css') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('home/js/sdmenu.js') }}"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url({{ asset('home/images/main/leftbg.jpg') }}) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="{{ asset('home/images/main/member.gif') }}" width="44" height="44" /></div>
    <span>用户：admin<br>角色：超级管理员</span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>管理员设置</span>
        <a href="home_change_password" target="mainFrame" onFocus="this.blur()">修改密码</a>
        <a href="home_insert_admin" target="mainFrame" onFocus="this.blur()">新添管理员</a>
        <a href="home_show_admin" target="mainFrame" onFocus="this.blur()">管理员编辑</a>
      </div>
      <div>
        <span>用户设置</span>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">添加用户</a>
        <a href="main_info.html" target="mainFrame" onFocus="this.blur()">用户展示</a>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">用户编辑</a>
      </div>
      <div>
        <span>系统设置</span>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">分组权限</a>
        <a href="main_list.html" target="mainFrame" onFocus="this.blur()">级别权限</a>
        <a href="main_info.html" target="mainFrame" onFocus="this.blur()">角色管理</a>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">自定义权限</a>
      </div>
       <div>
        <span>系统设置</span>
<<<<<<< HEAD
        <a href="main_list.html" target="mainFrame" onFocus="this.blur()">级别权限</a>
=======
        <a href="homeone" target="mainFrame" onFocus="this.blur()">系统配置</a>
>>>>>>> 6549cf411779661e1cb291ffcbd1c4b6d321a13e
      </div>
    </div>
</body>
</html>