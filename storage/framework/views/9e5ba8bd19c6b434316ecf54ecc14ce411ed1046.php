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
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 分类管理</strong></div>
  <div class="padding border-bottom">
    <a class="button border-yellow" href="/goods/cateedit_1"><span class="icon-plus-square-o"></span> 添加分类</a>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th>分类名称</th>
     
      <th>是否显示</th>
     
      <th width="310">操作</th>
    </tr>


    <?php foreach($tree as $k=>$v): ?>
    <tr>
      <td><span class="icon-plus-square padding-right text-main zhankai"><?php echo $v['type_name'];?></span></td>
      <td><?php  if( $v['is_show']==1){ ?>
        <span>是</span>
    <?php    }else{ ?>
      <span>否</span>
   <?php }?></td>
      <td><div class="button-group"><a class="button border-green" href="cate-2.html"><span class="icon-exchange"></span>转移</a> <a class="button border-main" href="cateedit-1.html"><span class="icon-edit"></span> 编辑</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $v['id']?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>
    


    <?php foreach($v['son'] as $k=>$val): ?>

    <tr >
      <td><span class="icon-minus-square padding-right text-main"></span><?php echo $val['type_name']?></td>
      <td><?php  if( $val['is_show']==1){ ?>
        <span>是</span>
    <?php    }else{ ?>
      <span>否</span>
   <?php }?></td>
      <td><div class="button-group"> <a class="button border-green" href="cate-2.html"><span class="icon-exchange"></span>转移</a><a class="button border-main" href="cateedit-1.html"><span class="icon-edit"></span> 编辑</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $val['id']?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>

    <?php endforeach ?>
    <?php endforeach ?>
    
  </table>
 
 

</div>
<script type="text/javascript">
function del(id){
	if(confirm("您确定要删除吗?")){			
		$.ajax({
      url:'/goods/delType',
      data:{id:id,'_token':'<?php echo e(csrf_token()); ?>'},
      type:'post',
      success:function(res){
        if(res==1){
          alert('该类存在子类,不可删除sir');
        }else if(res==2){
          alert('山粗成工,sir');
        window.location.reload();
        }
        
      }
    })
	}
}

$(function(){
	$(".zhankai").click(function(){
		$(this).parent().parent().next(".hidden-tr").toggle();
	});
	
});
	

</script>

</body>
</html><?php /**PATH D:\PhpStudy20180211\PHPTutorial\WWW\Lxgw\resources\views/goods/cate_1.blade.php ENDPATH**/ ?>