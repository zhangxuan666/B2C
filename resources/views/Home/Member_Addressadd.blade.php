<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="/home/">

	<link type="text/css" rel="stylesheet" href="css/style.css" />
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->
        
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>    
   
        
	<script type="text/javascript" src="js/select.js"></script>
        
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
@include('public.header')


		<div class="m_right">
            

            <div class="mem_tit">
            	<p><span style="font-size: 17px">新增地址：</span></p>
            </div>

            <form class="form-x" action="/home/address_adddo" method="post">
              @Csrf
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
              <tr>
                <td width="135" align="right">配送地区</td>
                <td colspan="3" style="font-family:'宋体';">
                	<select class="select" name="location[]" id="provinces">
                   <option>选择省份  </option>
                   
                  </select>
                  <select class="select" name="location[]" id="citys">
                   <option>选择城市  </option>
                 
                  </select>
                  <select class="select" name="location[]" id="countys">
                   <option>选择区/县  </option>
                  
                  </select>
                    （必填）
                </td>
              </tr>
              <tr>
                <td align="right">收货人姓名</td>
                <td style="font-family:'宋体';"><input type="text"  class="add_ipt" name="name" />（必填）</td>
                <td align="right">地址标签</td>
                <td>
                  <select name="tag" style="width: 130px">
                    <option value="其他">其他</option>
                    <option value="学校">学校</option>
                    <option value="家">家</option>
                    <option value="公司">公司</option>
                  </select>（选填）
                </td>
                
              </tr>
              <tr>
                <td align="right">详细地址</td>
                <td style="font-family:'宋体';"><input type="text" class="add_ipt" name="address" />（必填）</td>
                <td align="right">邮政编码</td>
                <td style="font-family:'宋体';"><input type="text" class="add_ipt" name="code" />（选填）</td>
              </tr>
              <tr>
                <td align="right">手机号</td>
                <td style="font-family:'宋体';"><input type="text" class="add_ipt" name="phone" />（必填）</td>
                <td align="right">标志性建筑</td>
                <td style="font-family:'宋体';"><input type="text" class="add_ipt" name="symbol" />（选填）</td>
              </tr>
              </table>
              <div>
                <tr><br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <td><input type="reset" name="" value="重置"></td>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <td><input type="submit" name="" value="添加"></td>
                </tr>
              </div>
            </form>

           	
           

            
        </div>
    </div>
	<!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
			<table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
    	<dl>                                                                                            
        	<dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
        	<a href="#" class="b_sh1">新浪微博</a>            
        	<a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="images/er.gif" width="118" height="118" /></div>
            <img src="images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
		<div class="btm">
        	备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="images/b_1.gif" width="98" height="33" /><img src="images/b_2.gif" width="98" height="33" /><img src="images/b_3.gif" width="98" height="33" /><img src="images/b_4.gif" width="98" height="33" /><img src="images/b_5.gif" width="98" height="33" /><img src="images/b_6.gif" width="98" height="33" />
        </div>    	
    </div>
    <!--End Footer End -->    
</div>

</body>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript">

$(function() {  
  // alert(1);
    //页面初始，加载所有的省份  
    $.ajax({  
        type: "get",  
        url: "/region",  
        data: {"type":1},  
        dataType: "json",  
        success: function(data) {  


            //遍历json数据，组装下拉选框添加到html中
            $("#provinces").html("<option value=''>请选择省</option>");  
            $.each(data, function(i, item) {  
                $("#provinces").append("<option value='" + item.area_id + "'>" + item.area_name + "</option>");  
            });
        }  
    });  


    //监听省select框
    $("#provinces").change(function() {  
        $.ajax({  
            type: "get",  
            url: "/region",
            data: {"pnum": $(this).val(),"type":2},
            dataType: "json",  
            success: function(data) {  
                //遍历json数据，组装下拉选框添加到html中
                $("#citys").html("<option value=''>请选择市</option>");  
                $.each(data, function(i, item) {  
                    $("#citys").append("<option value='" + item.area_id + "'>" + item.area_name + "</option>");  
                });  
            }  
        });  
    });  


    //监听市select框
    $("#citys").change(function() {  
        $.ajax({  
            type: "get",  
            url: "/region",
            data: {"cnum": $(this).val(),"type":3},  
            dataType: "json",  
            success: function(data) {  
                //遍历json数据，组装下拉选框添加到html中
                $("#countys").html("<option value=''>请选择区</option>");  
                $.each(data, function(i, item) {  
                    $("#countys").append("<option value='" + item.area_id + "'>" + item.area_name + "</option>");  
                });  
            }  
        });  
    });  
});  


</script>

<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
