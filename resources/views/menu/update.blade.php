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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span> 修改菜单页面</strong></div>
  <div class="body-content">
    <form action="/menu/zuoupdate" method="post" >
     @csrf
    <div class="form-group">
      <label class="form-label"><span class="c-red">*</span>菜单名称</label>
      <div class="formControls">
        <input type="text" class="input" value="{{$data->menu_name}}" placeholder="" id="user-name" name="menu_name" datatype="*2-16" nullmsg="用户名不能为空">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
  <input type="hidden"  name="id" value="{{$data->id}}">
    <div class="form-group">
      <label class="form-label "><span class="c-red">*</span>是否显示</label>
      <div class="formControls  skin-minimal">
       
            <label><input  type="radio" class="ace" value="0" name="is_show"><span class="lbl">显示</span></label>&nbsp;&nbsp;
        
            <label><input  type="radio" class="ace" value="1" name="is_show"><span class="lbl">隐藏</span></label>
       
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label "><span class="c-red">*</span>URL:</label>
      <div class="formControls ">
        <input type="text" class="input" value="{{$data->url}}" placeholder="" id="user-tel" name="url" datatype="m" nullmsg="手机不能为空">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
  
    <div class="text-center"> 
        <input class="button bg-main " type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
  
   </div>
   </form>
  </div>
</div>
</body></html>