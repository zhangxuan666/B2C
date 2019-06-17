<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <base href="/admin/">
    <title></title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<form method="post" action="/service/update" class="form-x">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="panel admin-panel">
    	<div class="panel-head"><strong class="icon-reorder">评论详情</strong></div>
    	<div class="discuss">
    		<div class="discuss-top">
    			<span class="text-main">{{$data->user_name}}</span>于{{$data->time}}对<span class="text-red">{{$data->goods_name}}</span>发表评论
    		</div>
    		<div class="discuss-detail">
    			<p>{{$data->desc}}</p>
    			<input type="hidden" name="id" value="{{$data->id}}">
    			
    		</div>
    		<div class="text-center">
                    <button class="button bg-main">允许显示</button>
                    <a class="button border-main" href="/service/list"><span class="icon-eye"></span>不允许显示</a>
                </div>
    	</div>
  </div>
</form>
</body></html>