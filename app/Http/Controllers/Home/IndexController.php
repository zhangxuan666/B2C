<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function Index()
    {
       $url=file_get_contents("http://www.B2C.com/api/index/carousel",'GET');
       $url1=file_get_contents("http://www.B2C.com/api/index/goodslist",'GET');
       $url2=file_get_contents("http://www.B2C.com/api/index/goods",'GET');
       $data=json_decode($url,true);
       $data2=json_decode($url2,true);
       $data1=json_decode($url1,true);
       $res1=$data1['data'];
       $res=$data['data'];
       $res2=$data2['data'];
       return view('home.index',compact('res','res1','res2'));
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


   









    
 
}