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
    <div class="panel-head"><strong class="icon-reorder"> 管理员列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="amounts_style">
        <div class="border-b clearfix">
			      <span class="l_f">
			      <a href="javascript:;" id="administrator_add" class="button bg-yellow button-small"><span class="icon-plus"></span>添加管理员</a>
			       </span>
        </div>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="80" style="text-align:left; padding-left:20px;">编号</th>
            <th>登录名</th>
            <th>手机</th>
            <th>邮箱</th>
            <th width="10%">加入时间</th>
            <th width="210">操作</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="ids" value="<?php echo e($v->user_id); ?>" />
                    </td>
                <td><?php echo e($v->user_name); ?></td>
                <td><?php echo e($v->user_phone); ?></td>
                <td><?php echo e($v->user_email); ?></td>
                <td><?php echo e(date("Y-m-d",$v->create_time)); ?></td>
                <td><div class="button-group"><a class="button border-main" href="<?php echo e(url('/role/allotrole')); ?>?userid=<?php echo e($v->user_id); ?>"><span class="icon-edit (alias)"></span> 分配角色</a> <a class="button border-red" href="javascript:void(0)" onclick="Competence_del(this,'<?php echo e($v->user_id); ?>')"><span class="icon-trash-o"></span> 删除</a> </div></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
                    全选 </td>
                <td colspan="8" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 批量删除</a>
            </tr>
            <tr>
                <td colspan="8"><div class="pagelist"> <a href="<?php echo e($data->previousPageUrl()); ?>">上一页</a>

                        <?php for($i=1;$i<=($data->lastPage());$i++): ?>
                            <a href="http://www.b2c.com/admin/adminlist?page=<?php echo e($i); ?>"><?php echo e($i); ?></a>
                        <?php endfor; ?>

                        <a href="<?php echo e($data->nextPageUrl()); ?>">下一页</a>

                        <a href="<?php echo e($data->url($data->lastPage())); ?>">尾页</a>

                    </div></td>
            </tr>
    </table>
</div>


<!--添加管理员-->
<div id="add_administrator_style" class="add_menber" style="display:none">
    <form action="<?php echo e(url('/admin/addadmin')); ?>" method="post" id="form-admin-add">
        <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>管理员：</label>
            <div class="formControls">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="text" class="input" value="" placeholder="" id="user-name" name="user_name" datatype="*2-16" nullmsg="用户名不能为空">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>初始密码：</label>
            <div class="formControls">
                <input type="password" placeholder="密码" name="user_pwd" autocomplete="off" value="" class="input" datatype="*6-20" nullmsg="密码不能为空">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>

        <div class="form-group">
            <label class="form-label "><span class="c-red">*</span>性别：</label>
            <div class="formControls  skin-minimal">
                <label><input name="user_sex" type="radio" value="男" class="ace"><span class="lbl">男</span></label>&nbsp;&nbsp;
                <label><input name="user_sex" type="radio" value="女" class="ace"><span class="lbl">女</span></label>
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label "><span class="c-red">*</span>手机：</label>
            <div class="formControls ">
                <input type="text" class="input" value="" placeholder="" id="user-tel" name="user_phone" datatype="m" nullmsg="手机不能为空">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls ">
                <input type="text" class="input" placeholder="@" name="user_email" id="email" datatype="e" nullmsg="请输入邮箱！">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
       
        <div class="text-center">
            <input class="button bg-main " type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">

        </div>
    </form>
</div>
<script type="text/javascript">


    //全选
    $("#checkall").click(function(){
        $("input[name='ids']").prop("checked",true);
    })



    //批量删除
    function DelSelect(){
        var ids = [];
        var Checkbox=false;
        $("input[name='ids']").each(function(){
            if (this.checked==true) {
                ids.push( $(this).val());
                Checkbox=true;
            }
        });
        if (Checkbox){
            $.ajax({
                url:"/admin/deleteadminall",
                type:"get",
                data:{ids:ids},
                dataType:"json",
                success:function (msg) {
                    // console.log(msg.name);return false;
                    // $data = JSON.parse(msg);
                    // console.log($data);return false;

                    if(msg.name=='ok'){
                        $("input[name='ids']").each(function(){
                            if (this.checked==true) {
                                $(this).parent().parent().remove();
                                Checkbox=true;
                            }
                        });
                    }else if(msg.name=="error"){
                        alert("您没有权限！");
                    }

                },
                error:function (msg) {
                    console.log(123)
                }
            })

            var t=confirm("您确认要删除选中的内容吗？");
            if (t==false) return false;
            $("#listform").submit();
        }
        else{
            alert("请选择您要删除的内容!");
            return false;
        }
    }


    //删除
    function Competence_del(obj,id){
        $.ajax({
            url:"/admin/deleteadmin",
            type:"get",
            data:{userid:id},
            dataType:"json",
            success:function (msg) {
                // console.log(msg.name);return false;
                if(msg.name=="error"){
                    alert("您没有权限！");
                    return false;
                }else if(msg.name=="ok"){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }

            }
        })
        // layer.confirm('确认要删除吗？',function(index){
        //     $(obj).parents("tr").remove();
        //     layer.msg('已删除!',{icon:1,time:1000});
        // });
    }

    /*添加管理员*/
    $('#administrator_add').on('click', function(){
        layer.open({
            type: 1,
            title:'添加管理员',
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
</html><?php /**PATH E:\jichenghuanjing\PHPTutorial\WWW\Lxgw\resources\views/admin/admin/adminlist.blade.php ENDPATH**/ ?>