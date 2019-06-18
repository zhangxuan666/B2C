<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/11
 * Time: 17:05
 */
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    public function selectRole()
    {
        $data = Role::paginate(2);
        return $data;
    }

    public function selectRoleAll()
    {
        $data = Role::get();
        return $data;
    }

    public function addRole($data)
    {
        $res = Role::insert($data);
        return $res;
    }

    public function deleteRole($roleid)
    {
        $res = Role::where('role_id',$roleid)->delete();
        return $res;
    }

    public function deleteRoleAll($ids)
    {
        $res = Role::whereIn("role_id",$ids)->delete();
        return $res;
    }
}