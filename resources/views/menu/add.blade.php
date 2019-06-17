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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span> 添加菜单</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/menu/doadd">   
     @csrf     
      <div class="form-group">
        <div class="label">
          <label>菜单名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="menu_name"/>
          <div class="tips"></div>
        </div>
      </div>        
      <div class="form-group">
        <div class="label">
          <label>菜单级别：</label>
        </div>
        <div class="field">
           <select name="pid">
             <option value="0">顶级菜单</option>
            @foreach($data as $v)
             <option value="{{$v->id}}">{{str_repeat("--",$v->le)}}{{$v->menu_name}}</option>
            @endforeach
           </select>
        </div>
      </div>
      <div class="form-group">s
        <div class="label">
          <label>URL：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="url" />
        </div>
      </div>
      <div class="form-group">
      	<div class="label">
          <label>菜单状态：</label>
        </div>
        <div class="field">
      		<div class="product-mulde product-mulde-a">
						      	<ul>
						      		<li><input type="radio" name="is_show" value="0" checked=""><label>显示</label><input type="radio" name="is_show" value="1"><label>隐藏</label>
						      		</li>
						      	</ul>
						      </div>
   			</div>
        </div>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
      <div class="form-group">
        <div class="text-center">
							      <div class="field">
							      <input class="button bg-main " type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
							      </div>
							    </div>
      </div>
    </form>
  </div>
</div>
</body></html>