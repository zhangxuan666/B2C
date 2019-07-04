<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Models\curl;
use DB;


class IndexController extends Controller
{
    public function Index()
    {
  $url=file_get_contents("http://www.home.com/api/index/typelist");
//      var_dump($url);die;
      $data=json_decode($url,true);
      $data1 = $this->getTherr($data['data'],0);
//       var_dump($data1);die;
//这里显示的是 购物车有多少产品，和产品的总价格
       if(!empty($request->session()->get("gwc")))
       {

           $ann=[];
           if(!empty($request->session()->get("gwc")))
           {
               $ann=$request->session()->get("gwc");
           }

           $sum=0;
           $num=0;
           $str='';
           foreach($ann as $k=>$v)
           {
//           var_dump($ann);
               $str.=",".$v['goodids'];
               $strid=substr($str,1);
               $strid = explode(",",$strid);
//       var_dump($strid);
               $goodsModel = new Goods();
               $info = $goodsModel->selectGoodss($strid);
               $info = $info->toArray();
               $count = count($info);
               foreach($info as $k=>$n)
               {
//           var_dump($n);
                   $sum=$sum + $n['goods_price']*$v['flog'];
                   $num=$v['flog'];
               }

           }

           $datas=[
               'info'=>$info,
               'sum'=>$sum,
               'count'=>$count,
               'num'=>$num,
           ];
           $request->session()->put("datas",$datas);
           //       return view('home.index',['data'=>$data1,'info'=>$info,'sum'=>$sum,'count'=>$count,'num'=>$num]);
           $url2=file_get_contents("http://www.home.com/api/index/carousel",'GET');
           $url3=file_get_contents("http://www.home.com/api/index/goodslist",'GET');
           $url4=file_get_contents("http://www.home.com/api/index/goods",'GET');

           $data2=json_decode($url2,true);
           $data3=json_decode($url3,true);
           $data4=json_decode($url4,true);

           return view('home.index',['data'=>$data1,'res'=>$data2['data'],'res1'=>$data3['data'],'res2'=>$data4['data'],'info'=>$info,'sum'=>$sum,'count'=>$count,'num'=>$num]);

       }
      
       
    }

    public function sell()
    {
       return view('home.sell');
    }

    public function brand()
    {
      
       return view('home.brand');
    }

    public function brandlist()
    {
      
       return view('home.brandlist');
    }

    public function buycar()
    {
      
       return view('home.buycar');
    }

    public function buycar_three()
    {
      
       return view('home.buycar_three');
    }

    public function buycar_two()
    {
      
       return view('home.buycar_two');
    }

    public function login()
    {
      
       return view('home.login');
    }

    public function product()
    {
      
       return view('home.product');
    }


    public function category()
    {
      
       return view('home.category');
    }

    public function categorylist()
    {
      
       return view('home.categorylist');
    }

    public function member(Request $request)
    {
     
      $id = $request->session()->get('id');
      // var_dump($id);die;

      $url = "www.home.com/api/index/ourlist?id=".$id;

      $res = curl::cl($url);
      // var_dump($res['data']);
      
       return view('home.member', ['res'=>$res['data']]);
    }

    public function member_update(Request $request)
    {
    	
      	$id = $request->session()->get('id');

    	$users = DB::table('users')->where('id', $id)->get();
    	// var_dump($users);
    	return view('home.member_update', ['users'=>$users]);
    }

    public function update_do(Request $request)
    {
    	$data = $request->input();
    	// var_dump($data);

    	unset($data['_token']);

    	$id = $data['id'];
    	unset($data['id']);

    	DB::table('users')->where('id', $id)->update($data);

    	return redirect('/home/member');
    }

    public function member_address(Request $request)
    {
      
      $id = $request->session()->get('id');
      // var_dump($id);die;

      $url = "www.home.com/api/index/address?id=".$id;

      $res = curl::cl($url);
      // var_dump($res);
      
       return view('home.member_address', ['res'=>$res['data']]);
    }


    public function address_del(Request $request)
    {
    	$id = $request->input('id');

    	$url = "www.home.com/api/index/address_del?id=".$id;

    	$res = curl::cl($url);

    	return redirect('/home/member_address');
    }

    public function member_addressadd()
    {
    	return view('home.member_addressadd');
    }

    public function address_adddo(Request $request)
    {
    	// echo 1;die;
    	$data = $request->input();
    	unset($data['_token']);

    	// var_dump($data);die;
    	$str='  ';
        foreach ($data['location'] as $key => $value) {
            $str.= DB::table('areas')->where(['area_id'=>$value])->value('area_name');

        }
      	unset($data['location']);
    	$data['area']=$str;

    	$url = "www.home.com/api/index/address_add";

    	$res = curl::cl($url,"POST",$data);
      
       	return redirect('/home/member_address');
    }

    public function address_update(Request $request)
    {
      	$id = $request->input('id');

      	$addr = DB::table('user_addr')->where('id', $id)->get();
      	// var_dump($addr);die;

    	return view('home.address_update', ['addr'=>$addr]);
    }

    public function address_updatedo(Request $request)
    {
    	$data = $request->input();
    	// var_dump($data);die;
    	unset($data['_token']);

    	$id = $data['id'];
    	unset($data['id']);

    	DB::table('user_addr')->where('id', $id)->update($data);

    	return redirect('/home/member_address');
    }

    public function member_cash()
    {
      
       return view('home.member_cash');
    }

    public function member_collect(Request $request)
    {
      
      $id = $request->session()->get('id');
      // var_dump($id);die;

      $url = "www.home.com/api/index/collectlist?id=".$id;

      $res = curl::cl($url);
      // var_dump($res);
      
       return view('home.member_collect', ['res'=>$res['data']]);
    }

    public function collect_del(Request $request)
    {
      	$data = $request->input();
      	// var_dump($data);die;

      	$url = "www.home.com/api/index/collectdel?id=".$data['id'];

      	$res = curl::cl($url,"GET", $data);
      
       	return redirect('/home/member_collect');
    }

    public function member_commission()
    {
      
       return view('home.member_commission');
    }

    public function member_links()
    {
      
       return view('home.member_links');
    }

    public function member_member()
    {
      
       return view('home.member_member');
    }

    public function member_member_list()
    {
      
       return view('home.member_member_list');
    }

    public function member_money()
    {
      
       return view('home.member_money');
    }

    public function member_money_charge()
    {
      
       return view('home.member_money_charge');
    }

    public function member_money_pay()
    {
      
       return view('home.member_money_pay');
    }

    public function member_msg()
    {
       return view('home.member_msg');
    }

    public function member_order(Request $request)
    {
      
      $id = $request->session()->get('id');

      $url = "www.home.com/api/index/order?id=".$id;

      $res = curl::cl($url);
      // var_dump($res);
      
       return view('home.member_order', ['res'=>$res['data']]);
    }

    public function member_packet(Request $request)
    {
    	
      	$id = $request->session()->get('id');
      	// var_dump($id);die;

      	$inte = DB::table('users')->where('id', $id)->value('inte');
      	// var_dump($inte);die;
      	$discount = DB::table('discount')->where('users_id', $id)->get();
      	// var_dump($discount);die;
      
       	return view('home.member_packet', ['inte'=>$inte, 'discount'=>$discount]);
    }


    public function member_results()
    {
      
       return view('home.member_results');
    }


    public function member_safe()
    {
      
       return view('home.member_safe');
    }


    public function member_user()
    {
      
       return view('home.member_user');
    }


    public function regist()
    {
      
       return view('home.regist');
    }


    public function selldetails()
    {
      
       return view('home.selldetails');
    }


    public function recommend()
    {
       return view('home.recommend');
    }

    public function region()
	{       


        $type = isset($_GET['type'])?$_GET['type']:0;//获取请求信息类型 1省 2市 3区
        
		$province_num = isset($_GET['pnum'])?$_GET['pnum']:'440000';//根据省编号查市信息
		
		$city_num = isset($_GET['cnum'])?$_GET['cnum']:'440100';//根据市编号查区信息
         
		switch ($type) {//根据请求信息类型，组装对应的sql
		    case 1://省


                $province = DB::table('areas')->where(['parent_id'=>0])->get();

                // var_dump($province);die;
                echo json_encode($province);//返回json数据
		        
		        break;
		    case 2://市
                 
		        $province = DB::table('areas')->where(['parent_id'=>$province_num])->get();


                echo json_encode($province);//返回json数据
		       
		        break;
		    case 3://区
		        $province = DB::table('areas')->where(['parent_id'=>$city_num])->get();


                echo json_encode($province);//返回json数据
		        break;
		    default:
		        die('no data');
		        break;
		}


	  }


   









    
 
}