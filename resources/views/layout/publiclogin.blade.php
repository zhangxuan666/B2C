@if (Session::get('name'))
    <span style="color:red"><a href="/home/member?id=<?php echo Session::get('id')?>"><?php echo Session::get('name')?></a> <a style="color:red" href="/home/login_out">退出登录</a></span>
@else
    <span><a href="/home/login">你好请登录</a></span>
@endif