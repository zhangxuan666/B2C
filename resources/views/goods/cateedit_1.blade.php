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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改分类</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="{{url('goods/type_add')}}">      
    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
      <div class="form-group">
        <div class="label">
          <label>分类名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="type_name" value="" />
          <div class="tips"></div>
        </div>
      </div>        
    
      <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select class="input" name="parent_id">
            <option value="0">顶级分类</option>
            <?php foreach($list as $key =>$val):?>
            <option value="<?php echo $val->id?>">---<?php echo $val->type_name?></option>
            <?php endforeach ?>
          </select>
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
       
      
        
     
      </div>
     
       
     
      <div class="form-group">
        <div class="text-center">
							      <div class="field">
							      	
                      <input class="button bg-green"  type="submit" value="添加">
                      <input class="button bg-red" type="reset" value="重置">
							      </div>
							    </div>
      </div>
    </form>
  </div>
</div>
</body></html>