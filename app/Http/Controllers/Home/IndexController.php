<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Goods;
use Session;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreRegistPost;


class IndexController extends Controller
{

  
   public function Index(Request $request)
    {
      //哈哈1212
//      var_dump($token);die;
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


    public function regist_do(Request $request)
    {
      
      $data = $request->post();

      $this->Validator($data)->validate();
      
      $url=file_get_contents("http://www.home.com/api/index/reg?users_name=".$data['users_name'].'&users_pwd='.$data['users_pwd'].'&email='.$data['email']);
     
      $data=json_decode($url,true);

      if($data['code']==200){
        return redirect('home/login');
      }else{
         return back()->withErrors('注册失败');
         //注册失败
      }


    }

    public function login_out(Request $request)
    {
          $request->session()->forget('name');
          $request->session()->forget('id');
     return redirect('home/index');
    }

    //父级找他的儿子  递归展示
    public function getTherr($data,$parentid=0)
    {
        $arr=[];
         foreach ($data as $v)
         {
                if($v['parent_id']==$parentid)
                {
                    $v['son'] = $this->getTherr($data,$v['id']);
                    $arr[]=$v;
                }
         }
         return $arr;
    }

    public function sell()
    {
      
       return view('home.sell');
    }

    public function brand()
    {
      
       return view('home.brand');
    }

    public function brandlist(Request $request)
    {
      $goodid = $request->input("goodid");
//      var_dump($goodid);die;

        $goodsModel = new Goods();
        $data =  $goodsModel->selectGood($goodid);
//        var_dump($data);die;

//        $data2 = $request->session()->get("gwc");
//        var_dump($data2);die;




       return view('home.brandlist',['data'=>$data]);
    }

    public function buycar(Request $request)
    {

         $datas= $request->session()->get("datas");
//         var_dump($datas['info']);die;

       return view('home.buycar',['data'=>$datas]);
    }

    public function buycar_three()
    {
      
       return view('home.buycar_three');
    }

    public function buycar_two(Request $request)
    {
//      echo 111;die;
        if (!empty($request->session()->get("datas")))
        {
            $datas = $request->session()->get("datas");
            return view('home.buycar_two',['datas'=>$datas]);
        }
        return view('home.buycar_two');
    }

    public function login()
    {
      
       return view('home.login');
    }

    public function product(Request $request)
    {
       $goodsid = $request->input("goodsid");
//       var_dump($goodsid);die;
        $goodsModel = new Goods();
        $data =  $goodsModel->selectGoods($goodsid);
//        var_dump($data);die;

       return view('home.product',['data'=>$data]);
    }


    //加入购物车
    public function addgouwuche(Request $request)
    {
        $goodid = $request->input("goodid");

        if(empty($request->session()->get('gwc'))){
            $arr= [
                [
                'goodids'=>$goodid,
                'flog'=>1,
               ]
            ];
//            var_dump($arr);die;
            $request->session()->put('gwc',$arr);
        }else{
//            session::flush();
//            var_dump(111);die;
            $arr = $request->session()->get("gwc");

            $bs = false;
//           var_dump($arr);die;
            foreach ($arr as $v)
            {
//                var_dump($v['goodids']);die;
                if($v['goodids']==$goodid)
                {
                    $bs = true;
                }
            }

            if($bs)
            {
                //如果购物车由此商品，那就数量加一
                foreach ($arr as $k=>$v){
                         if ($v['goodids']==$goodid)
                         {
                             $arr[$k]['flog']+=1;
                         }
                }
//                var_dump($arr);die;
                $request->session()->put("gwc",$arr);
            }else{
                $attr = [
                    'goodids'=>$goodid,
                    'flog'=>1
                ];
                $arr[] = $attr;
//                var_dump($arr);die;
                $request->session()->put("gwc",$arr);
            }

        }

//        return json_encode(['code'=>200,'msg'=>添加成功]);

    }





    public function category()
    {
      
       return view('home.category');
    }

    public function categorylist()
    {
      
       return view('home.categorylist');
    }

    public function member()
    {
      
       return view('home.member');
    }

    public function member_address()
    {
      
       return view('home.member_address');
    }

    public function member_cash()
    {
      
       return view('home.member_cash');
    }

    public function member_collect()
    {
      
       return view('home.member_collect');
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

    public function member_order()
    {
      
       return view('home.member_order');
    }

    public function member_packet()
    {
      
       return view('home.member_packet');
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


   

 protected function validator(array $data)
   {
     return Validator::make($data, [
        'users_name' => 'required|regex:/\p{Han}/u',
         'users_pwd' => 'required|regex:/^[a-zA-Z0-9]{6,10}$/',
         'users_pwd_two'=>'required|same:users_pwd',
         'email'=>'required|email',
       ]);

     
    }








    
 
}
