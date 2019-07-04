@if(empty($count)&&empty($Info))
    <div class="i_car">
        <div class="car_t">购物车 [ <span>0</span> ]</div>
    </div>
    </div>
@else

    <div class="i_car">
        <div class="car_t">购物车 [ <span>{{$count}}</span> ]</div>
        <div class="car_bg">
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
                <?php foreach ($info as $v) {?>
                <li>
                    <div class="img"><a href="#"><img src="<?php echo $v['goods_img']?>" width="58" height="58" /></a></div>
                    <div class="name"><a href="#"><?php echo $v['goods_name']?></a></div>
                    <div class="price"><font color="#ff4e00">￥<?php echo $v['goods_price']?>x{{$num}}</font> </div>
                </li>
                <?php } ?>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>{{$sum}}</span></div>
            <div class="price_a"><a href="{{url('/home/buycar')}}">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
    </div>
@endif
@yield('content')