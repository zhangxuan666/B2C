<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <base href="/admin/">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>添加权限</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/layer/layer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 添加角色</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="Competence_add_style clearfix">
        <div class="left_Competence_add">
            <!--<div class="title_name">添加权限</div>-->
            <div class="Competence_add">
                <div class="form-group container"><label class="xs1 control-label no-padding-right" for="form-field-1"> 角色选择 </label>
                    <div class="xs4">
                        <input type="hidden" name="userid" value="{{$userid}}">
                        @foreach($data as $v)
                        <label class="middle"><input class="ace" type="checkbox"  name="roles"    id="id-disable-check" value="{{$v->role_id}}"><span class="lbl">{{$v->role_name}}</span></label>
                        @endforeach
                    </div>
                </div>
                <!--按钮操作-->
                <div class="Button_operation clear">
                    <button  class="button bg-main radius" type="submit" id="btn"><i class="fa fa-save "></i> 确认分配角色</button>
                </div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
    //初始化宽度、高度  
    $(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
    $(".Assign_style").width($(window).width()-500).height($(window).height()).val();
    $(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
    //当文档窗口发生改变时 触发  
    $(window).resize(function(){

        $(".Assign_style").width($(window).width()-500).height($(window).height()).val();
        $(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
        $(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
    });
    /*字数限制*/
    function checkLength(which) {
        var maxChars = 200; //
        if(which.value.length > maxChars){
            layer.open({
                icon:2,
                title:'提示框',
                content:'您出入的字数超多限制!',
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
    /*分配角色按钮*/
    $(document).on("click","#btn",function () {
        var ids = [];
            var userid = $("input[name='userid']").val();
            $("input[name='roles']").each(function () {
                if(this.checked==true){
                    ids.push($(this).val());
                }
            })
           $.ajax({
               url:"{{url('/role/adduserrole')}}",
               type:"get",
               data:{userid:userid,roles:ids},
               dataType:"html",
               success:function (msg) {
                   console.log(msg);
                   if (msg=='ok'){
                       window.location.href="{{url('/admin/adminlist')}}";
                   }
               },
               error:function(request) {
                   alert("系统错误！");
               }
           });
    })


</script>
</body>
</html>