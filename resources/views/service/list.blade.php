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
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 用户评论</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">编号</th>
        <th>用户名</th>       
        <th>商家名称</th>
        <th width="25%">评论对象</th>
         <th width="160">评论时间</th>
         <th>状态</th>
        <th width="200">操作</th>       
      </tr>
      @foreach($data as $data)
      	<tr>
          <td><input type="checkbox" name="id[]" value="1" />
            {{$data->id}}</td>
          <td>{{$data->user_name}}</td>
          <td>{{$data->merchant_name}}</td>
           <td>{{$data->goods_name}}</td>         
          <td>{{$data->time}}</td>
          <td>@if($data->static==0)隐藏@else显示@endif</td>
          <td><div class="button-group"><a class="button border-main" href="/service/show?id={{$data->id}}"><span class="icon-eye"></span>评论审核</a> <a class="button border-main" href="/service/ask?id={{$data->id}}"><span class="icon-eye"></span>评论回复</a></div></td>
        </tr>
        @endforeach
      <tr>
        <td colspan="9"><div class="pagelist"></div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>