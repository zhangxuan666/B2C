<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <base href="/admin/">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>权限管理</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
    <!--<link rel="stylesheet" href="css/ace.min.css">-->
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/layer/layer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 权限列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="amounts_style">
        <div class="border-b clearfix">
			      <span class="l_f">
			      <a href="javascript:;" id="administrator_add" class="button bg-yellow button-small"><span class="icon-plus"></span>添加权限</a>
			       </span>

        </div>
    </div>

    <table >
        <thead>
        <?php foreach($data as $v) {?>
        <tr>
            <th><hr><?php echo $v['node_desc']?><hr></th>
        </tr>


        <?php   if(!empty($v['item'])){

        foreach($v['item'] as $item){

        ?>
        <td><input type="checkbox" name="nodeIds[]" value="<?php echo $item['node_id'];?>"/><?php echo $item['node_desc'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <?php

           }
        }
        ?>
        </thead>
        <?php } ?>
    </table>
</div>


<!--添加权限-->
<div id="add_administrator_style" class="add_menber" style="display:none">
    <form action="<?php echo e(url('/node/addnode')); ?>" method="post" id="form-admin-add">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>权限名称：</label>
            <div class="formControls">
                <input type="text" class="input" value="" placeholder="例:indexcontroller@index！必须全部小写" id="user-name" name="node_name" datatype="*2-16" nullmsg="权限名称不能为空">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>权限描述：</label>
            <div class="formControls">
                <input type="text" placeholder="权限中文描述" name="node_desc" autocomplete="off" value="" class="input" datatype="*6-20" nullmsg="权限中文不能为空">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>

        <div class="form-group">
            <label class="form-label">权限层级：</label>
            <div class="formControls "> <span class="select-box" style="width:150px;">
				<select class="input" name="pid" size="1">
					<option value="0">顶级父级名称</option>
                    <?php $__currentLoopData = $datainfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($v->node_id); ?>"><?php echo e($v->node_desc); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				</span> </div>
        </div>

        <div class="text-center">
            <input class="button bg-main " type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">

        </div>
    </form>
</div>
<script type="text/javascript">




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

    function Competence_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }

    /*添加管理员*/
    $('#administrator_add').on('click', function(){
        layer.open({
            type: 1,
            title:'添加权限',
            area: ['700px',''],
            shadeClose: false,
            content: $('#add_administrator_style'),

        });
    })

    //字数限制
    function checkLength(which) {
        var maxChars = 100; //
        if(which.value.length > maxChars){
            layer.open({
                icon:2,
                title:'提示框',
                content:'您输入的字数超过限制!',
            });
            // 超过限制的字数了就将 文本框中的内容按规定的字数 截取
            which.value = which.value.substring(0,maxChars);
            return false;
        }else{
            var curr = maxChars - which.value.length; //250 减去 当前输入的
            document.getElementById("sy").innerHTML = curr.toString();
            return true;
        }
    };








</script>
</body>
</html><?php /**PATH D:\PhpStudy20180211\PHPTutorial\WWW\Lxgw\resources\views/admin/node/nodemange.blade.php ENDPATH**/ ?>