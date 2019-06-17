<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Active;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ActiveController extends Controller
{
    //第一个活动展示页面
    public function one(Request $request)
    {
      if($request->isMethod('POST')){
       $active_name=isset($_POST['active_name'])?$_POST['active_name']:'';
      }
     
      $Active=new Active;
      if(empty($active_name)){
      $data=$Active->getAll();
      }else{
      $data=$Active->getSearch($active_name);
      } 
      $page=$data->links();
      return view('active.one',compact('data','page'));
    }
    //活动添加页面
    public function oneadd()
    {
    	return view('active.oneadd');
    }
    //添加执行页
    public function add(Request $request)
    {
        Validator::make($request->all(), [
        'user_name' => 'required',
        'desc' => 'required',
        'merchant_name' => 'required',
        'goods_name'=>'required',
        ])->validate();
        
    	$data=$request->input();
        $Active=new Active;
        $res=$Active->getAdd($data);
        if($res){
        	 return redirect('/active/one');
        }else{
        	 return redirect('/active/oneadd');
        }
    }
    //修改页面
    public function oneupdate(Request $request)
    {
    	$id=$request->input('id');
    	$Active=new Active;
    	$res=$Active->getOne($id);
    	return view('/active/oneupdate',compact('res'));
    }
    //执行修改页
    public function update(Request $request)
    {
    	$data=$request->input();
    	$Active=new Active;
    	$res=$Active->getUpdate($data);
        if($res){
        	 return redirect('/active/one');
        }else{
        	 return redirect('/active/oneupdate');
        }
    }
    //删除页面
    public function onedelete(Request $request)
    {
    	$id=$request->input('id');
    	$Active=new Active;
    	$res=$Active->getDelete($id);
    	if($res){
    		return redirect('/active/one');
    	}else{
        	 return redirect('/active/oneupdate');
        }   	
    }
    //搜索处理
    public function search()
    {
    	$name=$request->input('name');
    	$Active=new Active;
    	$res=$Active->getDelete($name);
        if($res){
    		return redirect('/active/one');
    	}else{
        	 return redirect('/active/oneupdate');
        }  
    } 
}
?>