<?php
namespace  App\Http\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;

class Api extends Model
{
    public function login($data)
    {
        $res=DB::table('users')->where($data)->first();

        if(!$res)
        {
            return response()->json(['code'=>201,'msg'=>"账号或密码错误"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $list=get_object_vars($res);

        $token=md5($list['users_name'].$list['users_name'].time());

        $data['token']=$token;
        $data['token_time']=time();
        
       Session::put('id',$list['id']);
       Session::put('token',$token);
       Session::put('time',time());

        Session::put('name',$list['users_name']);

        //return Session::get('token');

      //Session::flush('token',$token);
        DB::table('users')->where('id',$list['id'])->update($data);

        return response()->json(['code'=>200,'msg'=>"登陆成功",'token'=>$token])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }


   //商品展示
    public function goodslist(){

        $res=DB::table('goods')->orderBy('id','desc')->select('goods_name','goods_img','goods_price','goods_intro','id')->limit(10)->get();

        if($res){
        return  response()->json(['code'=>200,'msg'=>"商品展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return  response()->json(['code'=>216,'msg'=>"商品展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }
   //商品展示
    public function goods(){

        $res=DB::table('goods')->select('goods_name','goods_img','goods_price','goods_intro','id')->get();

        if($res){
        return  response()->json(['code'=>200,'msg'=>"商品展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return  response()->json(['code'=>216,'msg'=>"商品展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }
    public function activelist(){
        $res=DB::table('active')->get()->toArray();
        return response()->json(['code'=>200,'msg'=>"展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function ourlist($id){
        $res=DB::table('users')->where('id',$id)->first();
        if($res){
        return response()->json(['code'=>200,'msg'=>"个人信息展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        } else{
            return response()->json(['code'=>202,'msg'=>"个人信息展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }

    public function ourupdate($id,$data){

        $res=DB::table('users')->where('id',$id)->update($data);

          if($res){
         return response()->json(['code'=>200,'msg'=>"修改信息展示成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        } else{
            return response()->json(['code'=>203,'msg'=>"修改信息展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }

    public function order($id){
        $res=DB::table('orders')->where('id',$id)->get();
        if($res){
        return  response()->json(['code'=>200,'msg'=>"订单展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return  response()->json(['code'=>204,'msg'=>"订单展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }

    public function orderadd($data){

        $res=DB::table('orders')->insert($data);

        if($res){
        return  response()->json(['code'=>200,'msg'=>"订单添加成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return  response()->json(['code'=>205,'msg'=>"订单添加失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }

    public function typelist(){

        $res=DB::table('type')->get();

        if($res){
        return  response()->json(['code'=>200,'msg'=>"订单展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return  response()->json(['code'=>206,'msg'=>"订单展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }

    public function shoplist($id){

         $res=DB::table('shops')->join('goods', function($join)
            {
                $join->on('shops.goods_id','=','goods.id');
            })->select('goods.goods_name','goods.goods_price','goods.goods_img','shops.shops_num','shops.shops_time')->where('users_id',$id)->get();

        if($res){
        return  response()->json(['code'=>200,'msg'=>"购物车展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return  response()->json(['code'=>207,'msg'=>"购物车展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }

    public function shopdel($id){

        $res=DB::table('shops')->where('goods_id',$id)->delete();

        if($res){
        return  response()->json(['code'=>200,'msg'=>"购物车删除成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return  response()->json(['code'=>208,'msg'=>"购物车删除失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

    }

    public function shopupdate($id,$data){

        $res=DB::table('shops')->where('goods_id',$id)->update($data);

        if($res){
        return  response()->json(['code'=>200,'msg'=>"购物车修改数量成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return  response()->json(['code'=>209,'msg'=>"购物车修改数量失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

    }

    public function shopadd($data){
        $res=DB::table('shops')->insert($data);

         if($res){
        return  response()->json(['code'=>200,'msg'=>"购物车添加成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return  response()->json(['code'=>210,'msg'=>"购物车添加失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }

    //收藏展示
    public function collect($id){
        $res=DB::table('collect')->where('users_id',$id)
                                ->join('goods', 'collect.goods_id', '=', 'goods.id')
                                ->get();

        if($res){
        return response()->json(['code'=>200,'msg'=>"收藏展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
        return response()->json(['code'=>211,'msg'=>"收藏展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }
//收藏删除
    public function collectdel($id){
        $res=DB::table('collect')->where('id',$id)->delete();
        if($res){
            return response()->json(['code'=>200,'msg'=>"收藏删除成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json(['code'=>212,'msg'=>"收藏删除失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);     
        }
    }
//收藏添加
    public function collectadd($data){
        $ids=session::get('id');
        $data['users_id']=$ids;
        $data['collect_time']=time();
        $res=DB::table('collect')->insert($data);
        if($res){
            return response()->json(['code'=>200,'msg'=>"添加收藏成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json(['code'=>213,'msg'=>"添加收藏失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);     
        }
        
    }
//注册
    public function reg($data){
        unset($data['_token']);
        $data['add_time'] = time();
        $res=DB::table('users')->insert($data);
         if($res){
           return response()->json(['code'=>200,'msg'=>"注册接口成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json(['code'=>214,'msg'=>"注册失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);     
        }
        
    }
    //轮播图
    public function carousel(){
        $res=DB::table('carousel')->get()->toArray();
        if($res){
           return response()->json(['code'=>200,'msg'=>"轮播图展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json(['code'=>214,'msg'=>"轮播图展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);     
        }

    }

    //收货地址展示
    public function address($id){
        $res=DB::table('user_addr')->where('user_id',$id)->get();
        if($res){
        return response()->json(['code'=>200,'msg'=>"收藏展示成功",'data'=>$res])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
        return response()->json(['code'=>211,'msg'=>"收藏展示失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }


    //收货地址删除
    public function address_del($id){
        $res=DB::table('user_addr')->where('id',$id)->delete();
        if($res){
            return response()->json(['code'=>200,'msg'=>"收货地址删除成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json(['code'=>212,'msg'=>"收货地址删除失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);     
        }
    }


    //收货地址添加
    public function address_add($data){
        $res=DB::table('user_addr')->insert($data);
        if($res){
            return response()->json(['code'=>200,'msg'=>"添加收货地址成功"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json(['code'=>213,'msg'=>"添加收货地址失败"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);     
        }
        
    }




}
