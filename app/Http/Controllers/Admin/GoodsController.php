<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\models\Goods;
use App\Http\models\MenuModel;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GoodsController extends Controller
{

    public function index()
    {
    	$menu=new MenuModel();
       $list=$menu->getTree();

       $data=$menu->fl($list,$pid=0);

      
// echo "<pre>";
// var_dump($data);die;
       return view('index.index',['data'=>$data]);
        //return view('goods.index');
    }

     public function info()
    {
        return view('goods.info');
    }

    public function product_list()
    {
    	return view('goods.product_list');
    }

    public function add_product()
    {
        $model = new Goods();
        $list=$model->selectType();
        $type=$model->selectType();
        $data=$model->type_Attribute();
        $checken=$model->type_Attribute();
        $check=$model->type_Attribute();
        $good=$model->select_Good();
    	return view('goods.add_product',['list'=>$list,'data'=>$data,'good'=>$good,'type'=>$type,'checken'=>$checken,'check'=>$check]);
    }

    public function cate_1()
    {
        $model = new Goods();
        $list=$model->selectType();
        
        foreach($list as $k=>$v){
            $list[$k]=(array)$v;
        }

        $arr=array();

        foreach($list as $k=>$v){
            $arr[$v['id']]=$v;
        }

        $tree=array();
        foreach($arr as $k=>$v){
            if(isset($arr[$v['parent_id']])){
                $arr[$v['parent_id']]['son'][] = &$arr[$k];
            }else{
                $tree[]=&$arr[$k];
            }
        }

        
      
    	return view('goods.cate_1',['tree'=>$tree]);
    }

    public function delType()
    {
        $model = new Goods();
        $id=$_POST['id'];
        $demo = $model->findType($id);
        
        if($demo){
          return 1;
          return false;
        }

        $res=$model->typeDel($id);
        if($res){
            return 2;
        }
       
        
    }

    public function brand_add()
    {
        $model = new Goods();
        $list=$model->brand_list();
        return view('goods.brand_add',['list'=>$list]);
    }

    public function brand_add_do()
    {
        $model = new Goods();
        $data=$_POST;
        // var_dump($data);die;
        $res=$model->brand_add($data);         
    }

    public function cateedit_2()
    {
    	return view('goods.cateedit_2');
    }

    public function welcome()
    {
        return view('goods.welcome');
    }

    public function brand_del()
    {
        $model = new Goods();
        $id=$_POST['id'];
        $res=$model->branddel($id);
        
    }


    public function cateedit_1()
    {
        $model = new Goods();
        $list=$model->selectType();
        return view('goods.cateedit_1', ['list' => $list]);
        
    }

    public function type_add()
    {
        $data=$_POST;
        $model = new Goods();
        $res=$model->type_Add_do($data);
        if($res){
            return redirect('/goods/cate_1');
        }
    }

    public function add_Type_Attribute()
    {
        $data=$_POST;
        $model = new Goods();
        $res=$model->add_typeattr($data);
        if($res){
            return redirect('/goods/add_product');
        }
    }


    public function add_sku()
    {
        $data=$_POST;
        $model = new Goods();
        $res=$model->sku_do($data);
        if($res){
            return redirect('/goods/add_product');
        }
    }


    public function goodsList()
    {
     
     $goods=new Goods();

     $data=$goods->getAll();

     //var_dump($data);die;

      return view('goods.list',['data'=>$data]);
    }

    public function goodsDel(Request $request)
    {

     $id=$request['id'];

     $goods=new Goods();

     $res=$goods->delDate($id);

     if(!$res)
       {
          return response()->json(array('status' => 0,'msg' => '删除失败'));

       }

       return response()->json(array('status' => 1));

    }
    
    public function goodsAdd()
    {

    $res=DB::table('type')->get()->toArray();
    $res1=DB::table('brand')->get()->toArray();
    $res2=DB::table('warehouse')->get()->toArray();

    return view('goods.add',compact('res','res1','res2'));

    }

    public function doAdd(Request $request)
    {
        $data=$request->post();
        array_shift($data);
         $this->Validator($data)->validate();

       if($request->file('goods_img')->isValid())
       {
          $path=$request->goods_img->path();
          $path=$request->goods_img->store('');
          $path="/image/".$path;
       }
        
        $data['add_time']=time();
        $data['goods_img']=$path;

       DB::table('goods')->insert($data);
       
       return redirect('/goods/list');
    }

    public function update(Request $request)
    {
        $id=$request->get('id');
       
        $res=DB::table('type')->get()->toArray();
        $res1=DB::table('brand')->get()->toArray();
        $res2=DB::table('warehouse')->get()->toArray();
        $res3=DB::table('goods')->where('id',$id)->first();

        return view('goods.update',compact('res','res1','res2','res3'));
    }

    public function doupdate(Request $request)
    {
      $data=$request->post();
      array_shift($data);
      $this->Validator($data)->validate();
      
       if($request->file('goods_img')->isValid())
       {
          $path=$request->goods_img->path();
          $path=$request->goods_img->store('');
          $path="/image/".$path;
       }

        $data['goods_img']=$path;

       DB::table('goods')->where('id',$data['id'])->update($data);
       
       return redirect('/goods/list');
     
    }

     protected function validator(array $data)
   {
     return Validator::make($data, [
        'goods_name' => 'required|regex:/\p{Han}/u',
         'goods_price' => 'required|numeric',
         'goods_intro' => 'required',
         'goods_num' => 'required|numeric',
       ]);

     
    }



}