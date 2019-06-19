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
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script src="js/layer/layer.js"></script>
</head>
<body>

  <div class="panel admin-panel">
   
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">编号</th>
        <th>商品名称</th>
        <th>所属仓库</th>
        <th>所属品牌</th>
        <th>所属分类</th>
        <th>基本信息</th>
         <th>商品价格</th>
        <th>图片</th>
        <th>添加时间</th>
        <th width="310">操作</th>
      </tr>
     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td style="text-align:left; padding-left:20px;">
           <?php echo e($v->id); ?></td>
          <td><?php echo e($v->goods_name); ?></td>
          <td><?php echo e($v->name); ?></td>
          <td><?php echo e($v->brand_name); ?></td>
          <td><?php echo e($v->type_name); ?></td>
          <td><?php echo e($v->goods_intro); ?></td>
          <td><?php echo e($v->goods_price); ?></td>
          <td><img src="<?php echo e($v->goods_img); ?>" alt="" width="50" height="50"></td>
          <td><?php echo e(date("Y-m-d",$v->add_time)); ?></td>
          <td><div class="button-group"><a class="button border-yellow" href="/goods/update?id=<?php echo e($v->id); ?>"><span class="icon-edit (alias)"></span>编辑</a><a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo e($v->id); ?>)"><span class="icon-trash-o"></span> 删除</a></div></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <tr>
        <td colspan="10"><nav aria-label="Page navigation">
         <?php echo e($data->links()); ?></nav></td>
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
    url:'/goods/del',
    type:'GET',
    data:{id:id},
    dataType:'json',

    success:function(res)
    {
       if(res.status==0)
       {
         confirm(res.msg);
         return;
       }
       
       window.location.href="/goods/list";
      
    }

   })
	}
}



</script>
</body>
</html><?php /**PATH E:\jichenghuanjing\PHPTutorial\WWW\Lxgw\resources\views/goods/list.blade.php ENDPATH**/ ?>