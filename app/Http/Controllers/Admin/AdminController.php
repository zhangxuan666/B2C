<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/11
 * Time: 14:58
 */
namespace App\Http\Controllers\admin;

use App\Http\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\RbacController;
use App\Http\Models\User;

class AdminController extends Controller
{
    //个人信息
    public function personInfo(Request $request)
    {
        $userid = $request->session()->get("userid");
        $UserModel = new User();
        $data = $UserModel->getInfo($userid);
        return view("admin.admin.person", ['data'=>$data]);
    }

    //管理员列表
    public function adminList()
    {
        $UserModel = new User();
        $data = $UserModel->getInfos();

        $RoleModel = new Role();
        $roleinfo = $RoleModel->selectRole();

        //查询所有角色
        $roleinfos = $RoleModel->selectRoleAll();

        return view("admin.admin.adminlist", ['data'=>$data,'roleinfo'=>$roleinfo,'roleinfos'=>$roleinfos]);
    }

    //添加管理员
    public function addAdmin(Request $request)
    {
        $data = $request->post();
        unset($data['_token']);
        $UserModel = new User();
        $data['create_time'] = time();
        $res = $UserModel->addData($data);
        if($res){
            echo ("<script>alert('添加成功'); location='/admin/adminlist'</script>  ");
        }else{
            echo ("<script>alert('添加失败'); location='/admin/adminlist'</script>  ");
        }
    }

    //删除管理员
    public function deleteAdmin(Request $request)
    {
        $data = $request->input();
//        var_dump($data['userid']);die;
        $UserModel = new User();
        $res = $UserModel->deleteAdmin($data['userid']);
        if ($res){
            return json_encode(['name'=>"ok"]);
        }else{
            return json_encode(['name'=>"no"]);
        }

    }



    //批量删除管理员
    public function deleteAdminAll(Request $request)
    {
        $data = $request->input();
        $UserModel = new User();
        $res = $UserModel->deleteAdminAll($data['ids']);
        if ($res){
            return json_encode(['name'=>"ok"]);
        }else{
            return json_encode(['name'=>"no"]);
        }
    }
}