<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ServiceController extends Controller
{
	//商品评论审核
	public function  list()
	{
		$Service=new Service;
		$data=$Service->getAll();
		$page=$data->links();
		return view('service.list',compact('data','page'));
	}
	//查看评论详情
	public function show(Request $request)
	{
		$id=$request->input('id');
		$Service=new Service;
		$data=$Service->getOne($id);
		return view('service.show',compact('data'));
	}
	//评论回复
	public function  ask(Request $request)
	{
		$id=$request->input('id');
		$Service=new Service;
		$data=$Service->getOne($id);
		return view('service.ask',compact('data'));
	}
	//执行修改
	public function update(Request $request)
	{
		$id=$request->input('id');
		$Service=new Service;
		$data=$Service->getUpdate($id);
		return redirect('service/list');
	}
	//执行添加
	public function add(Request $request)
	{
		Validator::make($request->all(), [
        'user_name' => 'required',
        'desc' => 'required',
        ])->validate();
		$data=$request->input();
		$Service=new Service;
		$data=$Service->getAdd($data);
		return redirect('service/list');
	}
	

}