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
<form method="post" action="/service/add" class="form-x">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="panel admin-panel">
    	<div class="panel-head"><strong class="icon-reorder">回复详情</strong></div>
    	<div class="discuss">
    		
    		<div class="hf-dis">
    			<p>回复评论</p>
    			<div class="form-group">
    				<div class="label">
    					用户名：
    				</div>
    				<div class="field">
                        <input type="hidden" name="service_id" value="{{$data->id}}">
    					<input type="text" value="{{$data->user_name}}" name="user_name" readonly="readonly" class="input"/>
    				</div>
    			</div>
    			<div class="form-group">
    				<div class="label">
    					回复内容：
    				</div>
    				<div class="field">
    					<textarea class="input" name="desc"></textarea>
    				</div>
    			</div>
    			<div class="form-group text-center">
    				<div class="label">
    				</div>
    				<div class="field">
							      	<button class="button bg-main">确定</button>
							      	<!-- <a class="button bg-red">重置</a> -->
							      </div>
    			</div>
    		</div>
    	</div>
  </div>
</form>
</body></html>