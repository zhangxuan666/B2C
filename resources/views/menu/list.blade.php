<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<base href="/admin/">
<title>商品列表</title>

<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/style.css">
<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script src="js/layer/layer.js"></script>
</head>
<body>
<form method="post" action="" id="listform">
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">菜单ID</th>
        <th>菜单名称</th>
        
        <th>菜单是否展示</th>
        <th width="310">操作</th>
      </tr>
      @foreach($data as $v)

        <tr class="f_{{$v->id}}">
          <td style="text-align:left; padding-left:20px;">{{$v->id}}</td>

          <td>{{$v->menu_name}}</td>
          
          <td>@if ( $v->is_show==0 ) 是
              @else 否 
              @endif</td>
         <!-- href="add-product.html" -->
          <td><div class="button-group"><a class="button border-yellow"  href="javascript:void(0)" onclick="return update({{$v->id}})"><span class="icon-edit (alias)"></span>编辑</a><a class="button border-main" href="/menu/submenu?id={{$v->id}}"><span class="icon-eye"></span> 查看子菜单</a> <a class="button border-red" href="javascript:void(0)" onclick="return del({{$v->id}})"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
         @endforeach

        <td colspan="10"><nav aria-label="Page navigation">
         {{$data->links()}}</nav></td>
      </tr>
    </table>
  </div>
</form>

<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id){

	if(confirm("您确定要删除吗?")){

   $.ajax({
    url:'/menu/del',
    type:'GET',
    data:{id:id},
    dataType:'json',

    success:function(res)
    {
       if(res.status==1)
       {
         confirm(res.msg);
         return;
       }
       
       window.location.href="/menu/list";
      //confirm(res);
    }

   })
		
	}
}

//编辑

function update(id){

   $.ajax({
    url:'/menu/update',
    type:'GET',
    data:{id:id},
    dataType:'json',

    success:function(res)
    {
       if(res.status==1)
       {
         confirm(res.msg);
         return;
       }
       
        window.location.href='/menu/doupdate?id='+res.id;
    }

   })
}
</script>
</body>
</html>