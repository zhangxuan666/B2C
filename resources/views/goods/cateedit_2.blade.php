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
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加品牌</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="{{url('goods/brand_add_do')}}">        
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <div class="label">
          <label>品牌中文名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="brand_name" value="" />
          <div class="tips"></div>
        </div>
      </div>        
   
    
      
      <div class="form-group">
        <div class="label">
          <label>品牌描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="brand_desc"></textarea>
        </div>
      </div>
      <div class="form-group">
      	<div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
      		<input type="text" class="input"  name="brand_sort" />
   			</div>
        </div>
        <div class="form-group">
      	<div class="label">
          <label>是否显示：</label>
        </div>
        <div class="field">
      		<div class="product-mulde product-mulde-a">
						      	<ul>
						      		<li><input type="radio" name="is_show" value="1"><label>是</label>
                        <input type="radio" name="is_show" value="0"><label>否</label>
						      		</li>
						      	</ul>
						      </div>
   			</div>
        </div>
       
      <div class="form-group">
        <div class="text-center">
							      <div class="field">
							      	
                      <input class="button bg-green"  type="submit" value="确定">
                      <input class="button bg-red" type="reset" value="重置">
							      </div>
							    </div>
      </div>
    </form>
  </div>
</div>
</body></html>