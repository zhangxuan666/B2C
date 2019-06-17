<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<base href="/admin/">
<title>商品列表</title>
<link rel="stylesheet" href="css/pintuer.css">

<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script src="js/layer/layer.js"></script>
</head>
<body>

  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 优惠活动</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
			    <div class="border-b border-bno clearfix">
			      <a href="/active/oneadd" class="button bg-yellow button-small"><span class="icon-plus"></span> 添加优惠活动</a>
			     </div>
    <div class="padding border-bottom">
      <form action="/active/one" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <ul class="search" style="padding-left:10px;">
        <li>活动名称</li>
        <li>
          <input type="text" name="active_name"  class="input" style="width:250px; line-height:17px;display:inline-block" />
          
          <input type="submit" value="查询" class="button border-main icon-search">
        </li>
      </ul>
      </form>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">编号</th>
        <th>活动名称</th>
        <th>商家名称</th>
        <th>开始时间</th>
        <th>结束时间</th>
        <th width="180">操作</th>
      </tr>
      @foreach($data as $data)
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
           {{$data->id}}</td>
          <td>{{$data->active_name}}</td>
          <td>{{$data->merchant_name}}</td>
          <td>{{$data->begin_time}}</td>
          <td>{{$data->end_time}}</td>
          <td><div class="button-group"><a class="button border-yellow" href="/active/oneupdate?id={{$data->id}}"><span class="icon-edit (alias)"></span>编辑</a><a class="button border-red" href="/active/onedelete?id={{$data->id}}"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
       @endforeach 
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="10" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 批量删除</a> 
      </tr>
      <tr>
        <td colspan="10"><?php echo $page?></td>
      </tr>
    </table>
  </div>


<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
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

//批量删除
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
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body>
</html>