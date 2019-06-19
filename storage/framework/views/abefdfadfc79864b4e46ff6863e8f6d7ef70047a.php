<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <base href="/admin/">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>登录</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">
            </div>
            <form action="/login/login" method="post" onsubmit="return login1()">
                <div class="panel loginbox">
                    <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                    <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                        <div class="form-group">
                            <div class="field field-icon-right">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="text" class="input input-big" name="username" placeholder="登录账号" data-validate="required:请填写账号" />
                                <span class="icon icon-user margin-small"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field field-icon-right">
                                <input type="password" class="input input-big" name="password" placeholder="登录密码" data-validate="required:请填写密码" />
                                <span class="icon icon-key margin-small"></span>
                            </div>
                        </div>


                       <div id="vaptchaContainer" style="width: 350px;height: 200px;">
                            <div class="vaptcha-init-main">
                                <div class="vaptcha-init-loading">
                                    <a href="https://www.vaptcha.com" target="_blank">
                                        <img src="https://cdn.vaptcha.com/vaptcha-loading.gif" />
                                    </a>
                                    <span class="vaptcha-text">Vaptcha启动中...</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<script src="/admin/js/jquery-1.8.3.min.js"></script>
<script src="https://cdn.vaptcha.com/v2.js"></script>
<script>
    var str1;
    vaptcha({
        //配置参数
        vid: '5d098bfefc650ec47c9c694a', // 验证单元id
        type: 'embed', // 展现类型 点击式
        container: '#vaptchaContainer' // 按钮容器，可为Element 或者 selector
    }).then(function (vaptchaObj) {
        vaptchaObj.listen('pass', function() {
            // 验证成功， 进行登录操作
            str1=1;
        })
        vaptchaObj.render()// 调用验证实例 vaptchaObj 的 render 方法加载验证按钮
    })

    //判断动画是否验证，验证则登陆 否则不能登陆
    function login1(){
        if(str1==1){
            return true;
        }else{
            return false;
        }
    }
</script><?php /**PATH D:\PhpStudy20180211\PHPTutorial\WWW\Lxgw\resources\views/admin/login/login.blade.php ENDPATH**/ ?>