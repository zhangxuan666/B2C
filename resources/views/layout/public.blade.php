<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <base href="/admin/">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="login.html"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>

  @foreach($data as $v)

  @if($v->pid==0)
  <h2>{{$v->menu_name}}</h2>
  @endif
   <ul>
   @foreach($data as $k)
     @if($v->id==$k->pid)
       <li><a href="{{$k->url}}" target="right"><span class="icon-caret-right"></span>{{$k->menu_name}}</a></li>
      @endif
   @endforeach
    </ul>
  @endforeach


</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
    $(this).next().slideToggle(200);  
    $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
      $("#a_leader_txt").text($(this).text());
      $(".leftnav ul li a").removeClass("on");
    $(this).addClass("on");
  })
 $(".leftnav").children("ul:last-child").css("padding-bottom","100px");
});
</script>
<ul class="bread">
  <li><a href="/index/info" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="/index/info" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>
@yield('content')