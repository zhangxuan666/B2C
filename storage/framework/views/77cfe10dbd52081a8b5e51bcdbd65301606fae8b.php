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
<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script src="js/layer/layer.js"></script>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 仓库列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
			    <div class="border-b border-bno clearfix">
			      <a href="/warehouse/add" class="button bg-yellow button-small"><span class="icon-plus"></span> 添加仓库</a>
			     </div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
      	<li>
      		<select class="input" style="width: 150px;">
      			<option>请选择</option>
      			<option>仓库名称</option>
            <option>仓库所在地</option>
      		</select>
      	</li>
        <li>
          <input type="text" placeholder=""  class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 查询</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th></th>
        <th width="100" style="text-align:left; padding-left:20px;">仓库编码</th>
        <th>仓库名称</th>
        <th>仓库所在地</th>
        <th>是否启用</th>
        <th>服务地区</th>
        <th width="200">操作</th>
      </tr>
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><input type="checkbox" name="id[]"/></td>
          <td style="text-align:left; padding-left:20px;"><?php echo e($data->zip); ?></td>
          <td><?php echo e($data->name); ?></td>
          <td><?php echo e($data->city_name); ?></td>

          <?php if(($data->is_open) == 1): ?>
          <td><span class="text-green">启用</span></td>
          <?php else: ?>
          <td><span class="text-red">未启用</span></td>
          <?php endif; ?>

          <?php if(($data->service_addr) == 1): ?>
          <td>全国</td>
          <?php else: ?>
          <td><?php echo e($data->city_name); ?></td>
          <?php endif; ?>

          <td><div class="button-group">
            <a class="button border-main" href="/warehouse/update?id=<?php echo e($data->id); ?>"><span class="icon-edit (alias)"></span>编辑</a>
            <a class="button border-red" href="/warehouse/del?id=<?php echo e($data->id); ?>"><span class="icon-trash-o"></span> 删除</a>
          </div></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="8" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 批量删除</a>
      </tr>


      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>

<!--编辑-->
<form action="/warehouse/update" method="post">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div id="Delivery_stop" style=" display:none">
    <div class=".container-layout">
    <div class="content_style-fh">

    <div class="form-group"><label class="bf25 " style="font-size: 16px" for="form-field-1">仓库所在地: </label>
        <br>
        <div class="bf75">
            <select class="form-control" id="form-field-select-1" name="city_name">
              <option value="">-----</option>
              <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($city->city_name); ?>"><?php echo e($city->city_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div class="form-group">
         <div class="label">
            <label>是否启用：</label>
          </div>
          <div class="field">
            <div class="product-mulde product-mulde-a">
                <ul>
                  <li>
                    <input type="radio" name="is_open" value="1"><label>是</label>
                    <input type="radio" name="is_open" value="0"><label>否</label>
                  </li>
                </ul>
            </div>
          </div>
        </div>

    <div class="form-group">
         <div class="label">
            <label>服务地区：</label>
          </div>
          <div class="field">
            <div class="product-mulde product-mulde-a">
                <ul>
                  <li>
                    <input type="radio" name="service_addr" value="1"><label>全国</label>
                    <input type="radio" name="service_addr" value="0"><label>仓库所在地</label>
                  </li>
                </ul>
            </div>
          </div>
        </div>

  </div>
<center>
  <input type="submit" class="button bg-green" value="提交">
  <input type="reset" class="button bg-red" value="重置">
</center>
    </div>
</div>

</form>




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

function Delivery_stop(id){
  layer.open({
        type: 1,
        title: '',
        maxmin: true, 
        shadeClose:false,
        area : ['500px' , ''],
        content:$('#Delivery_stop'),
       


    // yes: function(index, layero){
    // if($('#form-field-1').val()==""){
    //  layer.alert('快递号不能为空！',{
  //              title: '提示框',
    //    icon:0,
    //    })
      
    //  }else{      
    //   layer.confirm('提交成功！',function(index){
    // $(obj).parents("tr").find(".td-manage").prepend('<a style=" display:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="已发货"><i class="fa fa-cubes bigger-120"></i></a>');
    // $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发货</span>');
    // $(obj).remove();
    // layer.msg('已发货!',{icon: 6,time:1000});
    //  });  
    //  layer.close(index);         
    //   }
    
    // }
    })
  
}

</script>
</body>
</html><?php /**PATH E:\jichenghuanjing\PHPTutorial\WWW\Lxgw\resources\views/warehouse/list.blade.php ENDPATH**/ ?>