<?php

namespace  App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Active extends Model
{
	//查询全部
    public function getAll()
    {
    	return DB::table('active')->paginate(5);
    }
    //搜索查询
    public function getSearch($active_name)
    {
    	return DB::table('active')->where('active_name',$active_name)->paginate(5);
    }
    //查询单条
    public function getOne($id)
    {
    	return DB::table('active')->where('id',$id)->first();
    }
    //添加方法
    public function getAdd($data)
    {
    	array_shift($data);
    	return DB::table('active')->insert($data);
    }
    //修改方法
    public function getUpdate($data)
    {
    	array_shift($data);
    	$id=$data['id'];
    	array_shift($data);
    	return DB::table('active')->where('id',$id)->update($data);
    }
    //删除方法
    public function getDelete($id)
    {
        return DB::table('active')->where('id',$id)->delete();
    }
}
