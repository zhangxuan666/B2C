<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/13
 * Time: 17:07
 */
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Rolenode extends Model
{
    protected $table = "rolenode";
    public function  addRoleNode($data)
    {

        $roleid = $data['roleid'];
        foreach ($data['nodeIds'] as $v){
            $info[]=[
                'role_id'=>$roleid,
                'node_id'=>$v,
            ];
        }
        $res = Rolenode::insert($info);
        return $res;
    }

//     //这个是权限表
//    public function node()
//    {
//        return $this->hasOne('App\Model\Node',"node_id","node_id");
//    }

    public function selectNode($roleids)
    {
        $data = Rolenode::whereIn("role_id",$roleids)->get();
        return $data;
    }

}