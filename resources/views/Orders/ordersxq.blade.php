<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<base href="/admin/">
<title>订单详情</title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>交易订单</strong></div>
  <div class="body-content">

<div class="margin clearfix">
<div class="Order_Details_style">

<div class="Numbering">订单编号:<b>{{$orders->orders_serial}}</b></div>

</div>
 <div class="detailed_style">


 <!--收件人信息-->
    <div class="Receiver_style">
     <div class="title_name">收件人信息</div>
     <div class="Info_style clearfix">
        <div class="info_width">  
         <label class="label_name" for="form-field-2"> 收件人名称： </label>
         <div class="o_content">{{$orders->orders_user_name}}</div>
        </div>
        <div class="info_width">  
         <label class="label_name" for="form-field-2"> 收件人电话： </label>
         <div class="o_content">{{$orders->orders_user_phone}}</div>
        </div>
         <div class="info_width">  
         <label class="label_name" for="form-field-2"> 收件地邮编： </label>
         <div class="o_content">{{$orders->orders_user_postal}}</div>
        </div>
        <div class="info_width_q">  
         <label class="label_name" for="form-field-2"> 收件人地址： </label>
         <div class="o_content">{{$orders->orders_user_address}}</div>
        </div>
     </div>
    </div>


    <!--订单信息-->
    <div class="product_style">
    <div class="title_name">商品信息</div>
    <div class="Info_style clearfix">
    @foreach($cart as $cart)
      <div class="product_info clearfix">
      <a href="#" class="img_link"><img src="images/p_3.jpg" /></a>
      <span>
        <br>
      <a href="#" class="name_link" style="font-size: 28px;">{{$cart->cart_goods_name}}</a>
      <br>
      <b>{{$cart->cart_goods_intro}}</b>
      <br>
      <p>类型：{{$cart->cart_goods_class}}</p>
      <p>规格：{{$cart->cart_goods_size}} / {{$cart->cart_goods_color}}</p>
      <p>数量：{{$cart->cart_goods_sum}}</p>
      <p>单价：<b class="price"><i>￥</i>{{$cart->cart_goods_price}}</b></p>  
      <p>总额：<b class="price"><i>￥</i>{{$cart->cart_sum}}</b>(店铺活动：满500减30)</p>
      </span>
      </div>
    @endforeach
    </div>
    </div>
    


    <!--总价-->
    <div class="Total_style">
     <div class="Info_style clearfix">
      <div class="info_width">  
         <label class="label_name" for="form-field-2"> 支付方式： </label>
         <div class="o_content">{{$orders->orders_pay}}</div>
        </div>
        <div class="info_width">  
         <label class="label_name" for="form-field-2"> 支付状态： </label>
            @if (($orders->orders_status) == 1)
            <td><span>未付款</span></td>
            @elseif(($orders->orders_status) == 2)
            <td><span>已付款</span></td>
            @elseif(($orders->orders_status) == 3)
            <td><span>已付款</span></td>
            @else
            <td><span>已付款</span></td>
            @endif
        </div>
        <div class="info_width">
         <label class="label_name" for="form-field-2"> 订单生成日期： </label>
         <div class="o_content">{{date('Y-m-d H:m:s', $orders->orders_time)}}</div>
        </div>
         <div class="info_width">
         <label class="label_name" for="form-field-2"> 快递名称： </label>
         <div class="o_content">{{$orders->orders_express}}</div>
        </div>
         <div class="info_width">  
         <label class="label_name" for="form-field-2"> 发货日期： </label>
         <div class="o_content">{{date('Y-m-d H:m:s', $orders->orders_date)}}</div>
        </div>
        </div>
      <div class="Total_m_style"><span class="Total">商品数：<b>{{$orders->orders_num}}</b>件</span><span class="Total_price">总价格：<b>{{$orders->orders_sum}}</b>元</span></div>
    </div>
    
    <!--物流信息-->
    <div class="Logistics_style clearfix">
     <div class="title_name">物流信息</div>
      <!--<div class="prompt"><img src="images/meiyou.png" /><p>暂无物流信息！</p></div>-->
       <div data-mohe-type="kuaidi_new" class="g-mohe " id="mohe-kuaidi_new">
        <div id="mohe-kuaidi_new_nucom">
            <div class="mohe-wrap mh-wrap">
                <div class="mh-cont mh-list-wrap mh-unfold">
                    <div class="mh-list">
                        <ul>
                            <li class="first">
                                <p>2015-04-28 11:23:28</p>
                                <p>妥投投递并签收，签收人：他人收 他人收</p>
                                <span class="before"></span><span class="after"></span><i class="mh-icon mh-icon-new"></i></li>
                            <li>
                                <p>2015-04-28 07:38:44</p>
                                <p>深圳市南油速递营销部安排投递（投递员姓名：蔡远发<a href="tel:18718860573"></a>;联系电话：18718860573）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-28 05:08:00</p>
                                <p>到达广东省邮政速递物流有限公司深圳航空邮件处理中心处理中心（经转）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-28 00:00:00</p>
                                <p>离开中山市 发往深圳市（经转）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-27 15:00:00</p>
                                <p>到达广东省邮政速递物流有限公司中山三角邮件处理中心处理中心（经转）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-27 08:46:00</p>
                                <p>离开泉州市 发往中山市</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-26 17:12:00</p>
                                <p>泉州市速递物流分公司南区电子商务业务部已收件，（揽投员姓名：王晨光;联系电话：<a href="tel:13774826403">13774826403</a>）</p>
                                <span class="before"></span><span class="after"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
            
 </div>
</div>
  </div>
</div>

</body></html>