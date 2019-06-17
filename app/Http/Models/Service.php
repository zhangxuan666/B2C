<?php

namespace  App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Service extends Model
{
  //查询
	 public function getAll()
    {
    	return DB::table('service')->paginate(2);
    }
    //查询单条
    public function getOne($id)
    {
    	return DB::table('service')->where('id',$id)->first();
    }
    //修改方法
    public function getUpdate($id)
    {
    	return DB::table('service')->where('id',$id)->increment('static');
    }
    //添加方法
    public function getAdd($data)
    {
    	array_shift($data);
    	return DB::table('ask_comment')->insert($data);
    }

}