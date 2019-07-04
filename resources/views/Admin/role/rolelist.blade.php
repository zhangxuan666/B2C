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
    <div class="panel-head"><strong class="icon-reorder"> 角色列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="amounts_style">
        <div class="border-b clearfix">
			      <span class="l_f">
			      <a href="javascript:;" id="administrator_add" class="button bg-yellow button-small"><span class="icon-plus"></span>添加角色</a>
			       </span>
        </div>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="80" style="text-align:left; padding-left:20px;">编号</th>
            <th>角色名称</th>

            <th width="210">操作</th>
        </tr>


        @foreach($data as $v)
            <tr>
                <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="ids" value="{{$v->role_id}}" />
                    </td>
                <td>{{$v->role_name}}</td>

                <td><div class="button-group"><a class="button border-main" href="{{url('/node/allotnode')}}?roleid={{$v->role_id}}"><span class="icon-edit (alias)"></span> 分配权限</a> <a class="button border-red" href="javascript:void(0)" onclick="Competence_del(this,'{{$v->role_id}}')"><span class="icon-trash-o"></span> 删除</a> </div></td>
            </tr>
        @endforeach


        <tr>
            <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
                全选 </td>
            <td colspan="8" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 批量删除</a>
        </tr>
        <tr>
            <td colspan="8"><div class="pagelist"> <a href="{{$data->previousPageUrl()}}">上一页</a>

                    @for($i=1;$i<=($data->lastPage());$i++)
                    <a href="http://www.home.com/role/rolelist?page={{$i}}">{{$i}}</a>
                    @endfor

                    <a href="{{$data->nextPageUrl()}}">下一页</a>

                    <a href="{{$data->url($data->lastPage())}}">尾页</a>

                </div></td>
        </tr>

    </table>
</div>


<!--添加角色-->
<div id="add_administrator_style" class="add_menber" style="display:none">
    <form action="{{url('/role/addrole')}}" method="post" id="form-admin-add">
        <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>角色名称：</label>
            <div class="formControls">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="text" class="input" value="" placeholder="" id="user-name" name="role_name" datatype="*2-16" nullmsg="角色名不能为空">
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
                url:"/role/deleteroleall",
                type:"get",
                data:{ids:ids},
                dataType:"json",
                success:function (msg) {
                    console.log(msg);
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
            url:"/role/deleterole",
            type:"get",
            data:{roleid:id},
            dataType:"json",
            success:function (msg) {
                console.log(msg)
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

    /*添加角色*/
    $('#administrator_add').on('click', function(){
        layer.open({
            type: 1,
            title:'添加角色',
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
</html>