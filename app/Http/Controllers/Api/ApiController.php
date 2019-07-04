<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Api;
use Session;

class ApiController extends Controller
{
    public function login(Request $request){
      $data=$request->post();

       $api=new Api();
      
       return ($api->login($data));

    }

     //订单展示接口
    public function order(Request $request){
        $id=$request->input('id');
        $Api=new Api();
        return $Api->order($id);
    }
    
    //订单添加
    public function orderAdd(Request $request){

        $id=$request->session()->get('id');
        $data=$request->except('token');
        $data['orders_user_id']=$id;

        $Api=new Api();
        return $Api->orderadd($data);
    }

    //个人展示接口
    public function ourList(Request $request){
        $id=$request->input('id');
        // var_dump($id);die;
        $Api=new Api();
        return $Api->ourlist($id);
    }
   
    //个人修改
    public function ourUpdate(Request $request)
    {
        $id=$request->session()->get('id');

        $data=$request->post();

        $Api=new Api();

        return $Api->ourupdate($id,$data);
    }

    //商品分类
    public function typeList(){

        $Api=new Api();

        return $Api->typelist();
    }
//购物车展示
    public function shopList(Request $request){

        $id=$request->session()->get('id');

         $Api=new Api();

        return $Api->shoplist($id);
    }
    //购物车的删除
     public function shopDel(Request $request){

        $data=$request->except('token');

         $Api=new Api();

        return $Api->shopdel($data['id']);
    }
    //购物车修改数量
    public function shopUpdate(Request $request){

        $data=$request->except('token');

        $id=array_shift($data);

         $Api=new Api();

        return $Api->shopupdate($id,$data);
    }

    //购物车添加
    public function shopAdd(Request $request)
    {
      $id=$request->session()->get('id');
      $data=$request->except('token');
      $data['users_id']=$id;
      $data['shops_time']=time();

      $Api=new Api();

      return $Api->shopadd($data);
    }

     //注册接口
    public function reg(Request $request){
        $data = $request->post();
        if($request->file('img')->isValid())
       {
          $path=$request->img->path();
          $path=$request->img->store('');
          // var_dump($path);die;
          $path="/image/".$path;
       }
        $data['img']=$path;
        $Api=new Api();
        return $Api->reg($data);
    }
    //收藏展示接口
    public function collect(Request $request){
         $id=$request->input('id');
         $Api=new Api();
         return $Api->collect($id);
    }
    //收藏删除接口
     public function collectDel(Request $request){

        $data=$request->except('token');
        // var_dump($data);die;

         $Api=new Api();

        return $Api->collectdel($data['id']);
    }
    //收藏添加接口
    public function collectadd(Request $request){
     $data=$request->except('token');
      $Api=new Api();
      return $Api->collectadd($data);
    }

    //收货地址接口
    public function address(Request $request){
         $id=$request->input('id');
         $Api=new Api();
         return $Api->address($id);
    }

    //收货地址删除接口
     public function address_del(Request $request){

        $id=$request->input('id');
        // var_dump($id);die;

         $Api=new Api();

        return $Api->address_del($id);
    }


    //收货地址添加接口
    public function address_add(Request $request){

      $request->session()->put('id', 1);

      $data=$request->input();
      // var_dump($data);die;

      $Api=new Api();

      return $Api->address_add($data);
    }



}
