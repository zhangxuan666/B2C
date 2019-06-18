<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/11
 * Time: 21:09
 */
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Userrole extends Model
{
    protected $table = "userrole";
    public function addUserRole($data)
    {
        $userid = $data['userid'];
        foreach ($data['roles'] as $v){
            $info[] =
                [
                'user_id'=>$userid,
                'role_id'=>$v,
                ];
        }
        $res = Userrole::insert($info);
        return $res;
    }

    public function selectRole($userid)
    {
        $data = Userrole::where("user_id",$userid)->get();
        return $data;
    }

}