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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>新增状态</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/orders/add_do">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <div class="label">
          <label>状态名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="orders_static" />
          <div class="tips"></div>
        </div>
      </div>

      
        
      <div class="form-group">
        <div class="text-center">
						<div class="field">
                <button class="button bg-green" type="submit">添加</button>
                <button class="button bg-red" type="reset">重置</button>
						</div>
				</div>
      </div>
  </form>

  </div>
</div>
</body></html>