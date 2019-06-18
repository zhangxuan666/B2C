<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/10
 * Time: 21:03
 */
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    //登陆查询 是否有该管理员
    public function selectUser($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $res = User::where('user_name', '=', $username)->where('user_pwd', '=', $password)->first();
        return $res;
    }

    //查询管理员信息
    public function getInfo($userid)
    {
        $data = User::where("user_id",$userid)->first();
        return $data;
    }

    //查询管理员
    public function getInfos()
    {
        $data=User::paginate(2);
        return $data;
    }

    //添加管理员
    public function addData($data)
    {
        $res = User::insert($data);
        return $res;
    }

    //删除管理员
    public function deleteAdmin($userid)
    {
        $res = User::where('user_id',$userid)->delete();
        return $res;
    }

    //批删管理员
    public function deleteAdminAll($ids)
    {
        $res = User::whereIn("user_id",$ids)->delete();
        return $res;
    }

    //查询管理员用户
    public function selectUserid($userid)
    {
        $data = User::where("user_id",$userid)->first();
        return $data;
    }
}