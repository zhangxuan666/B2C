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

<form method="post" class="form-x" action="/orders/update_do">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="panel admin-panel margin-top">
  			<div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>用户编辑</strong></div>
  		<div class="body-content">
    
	      	<div>
	        	<input type="hidden" name="id" value="{{$orders->orders_user_id}}">
	      	</div>

	      	<div class="form-group">
		        <div class="label">
		          	<label>用户名称：</label>
		        </div>
		        <div class="field">
		        	<p><span class="text-yellow" style="font-size: 16px;">{{$orders->orders_user_name}}</span></p>
		          	<div class="tips"></div>
		        </div>
		    </div>

		    <div class="form-group">
		        <div class="label">
		          	<label>用户收货地址：</label>
		        </div>
		        <div class="field">
		          	<input type="text" class="input" name="orders_user_address" value="{{$orders->orders_user_address}}" />
		          	<div class="tips"></div>
		        </div>
		    </div>

		    <div class="form-group">
		        <div class="label">
		          	<label>用户手机号：</label>
		        </div>
		        <div class="field">
		          	<input type="text" class="input" name="orders_user_phone" value="{{$orders->orders_user_phone}}" />
		          	<div class="tips"></div>
		        </div>
		    </div>

		</div>
		</div>

		<div class="panel admin-panel margin-top">
  			<div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>商品编辑</strong></div>
  		@foreach($cart as $cart)
  		<div class="body-content">
    		
  			<!-- <div>
	        	<input type="hidden" name="cart_id[]" value="{{$cart->id}}">
	      	</div> -->


	      	<div class="form-group">
		        <div class="label">
		          	<label>商品名称：</label>
		        </div>
		        <div class="field">
		        	<p><span class="text-yellow" style="font-size: 16px;">{{$cart->cart_goods_name}}</span></p>
		          	<div class="tips"></div>
		        </div>
		        <div class="label">
		          	<label>商品介绍：</label>
		        </div>
		        <div class="field">
		        	<p><span style="font-size: 12px;">{{$cart->cart_goods_intro}}</span></p>
		          	<div class="tips"></div>
		        </div>
		    </div>

		    <div class="form-group">
	        <div class="label">
	          <label>规格参数：</label>
	        </div>
	        <div class="bf75">
	            <select class="form-control" id="form-field-select-1" name="cart_goods_size">
	              	<option value="{{$cart->cart_goods_size}}">{{$cart->cart_goods_size}}</option>

	            	@foreach($type_attr as $type)
	              	<option value="{{$type->type_size}}">{{$type->type_size}}</option>
	           		@endforeach

	            </select>
	            <select class="form-control" id="form-field-select-1" name="cart_goods_color">
	              	<option value="{{$cart->cart_goods_color}}">{{$cart->cart_goods_color}}</option>

	            	@foreach($type_attr as $type)
	              	<option value="{{$type->type_color}}" >{{$type->type_color}}</option>
	            	@endforeach

		             <option value="黑白经典">黑白经典</option>
		             <option value="高邦潮流">高邦潮流</option>
	              
	            </select>
	        </div>
	      </div>

		    <div class="form-group">
		        <div class="label">
		          	<label>购买数量：</label>
		        </div>
		        <div class="field">
		          	<input type="text" class="input" name="cart_goods_sum" value="{{$cart->cart_goods_sum}}" />
		          	<div class="tips"></div>
		        </div>
		    </div>
		    <hr>

		</div>
		@endforeach
		</div>
		

		<div class="panel admin-panel margin-top">
  			<div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>订单状态编辑</strong></div>
  		<div class="body-content">

		    <div class="form-group">
		        <div class="label">
		          <label>订单状态：</label>
		        </div>
		        <div class="bf75">
		            <select class="form-control" id="form-field-select-1" name="orders_status">

		            	@if (($orders->orders_status) == 1)
		            	<option value="1">待付款</option>
			            @elseif(($orders->orders_status) == 2)
			            <option value="2">待发货</option>
			            @elseif(($orders->orders_status) == 3)
			            <option value="3">待收货</option>
			            @else
			            <option value="4">已完成</option>
			            @endif

			            <option value="1">待付款</option>
			            <option value="2">待发货</option>
			            <option value="3">待收货</option>
			            <option value="4">已完成</option>
		              	
		              
		            </select>  
		        </div>
	      	</div>

		    

		</div>
		</div>

	<div class="form-group">
	    <div class="text-center">
	        <div class="field">
	            <button class="button bg-green" type="submit">修改</button>
	            <button class="button bg-red" type="reset">重置</button>
	        </div>
	    </div>
    </div>
</form>
</body>
</html>