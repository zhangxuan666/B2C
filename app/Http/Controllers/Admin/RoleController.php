<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/12
 * Time: 8:46
 */
namespace App\Http\Controllers\Admin;

use App\Http\Models\Role;
use App\Http\Models\Userrole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //角色管理
    public function roleList(Request $request)
    {
        $RoleModel = new Role();
        $roleinfo = $RoleModel->selectRole();
        return view("admin.role.rolelist",['data'=>$roleinfo]);
    }

    //添加角色
    public function addRole(Request $request)
    {
        //角色添加
        $data = $request->post();
//        var_dump($data);
        unset($data['_token']);

        $RoleModel = new Role();
        //角色展示
        $roleinfo = $RoleModel->selectRole();
        //角色添加的返回值
        $res = $RoleModel->addRole($data);
        if ($res){
            echo ("<script>alert('添加成功！');location='/role/rolelist'</script>");
        }else{
            echo ("<script>alert('添加失败！');location='/role/rolelist'</script>");
        }
        return view("admin.role.rolelist",['data'=>$roleinfo]);
    }

    //删除角色
    public function deleteRole(Request $request)
    {
        $data = $request->input();
        $RoleModel = new Role();
        $res = $RoleModel->deleteRole($data['roleid']);
        if ($res){
            return json_encode(['name'=>"ok"]);
        }else{
            return json_encode(['name'=>"no"]);
        }
    }

    //批量删除角色
    public function deleteRoleAll(Request $request)
    {
        $data = $request->input();
//        var_dump($data['ids']);die;
        $RoleModel = new Role();
        $res = $RoleModel->deleteRoleAll($data['ids']);
        if ($res){
            return json_encode(['name'=>"ok"]);
        }else{
            return json_encode(['name'=>"no"]);
        }
    }

    //给管理员分配角色
    public function allotRole(Request $request)
    {
        $data = $request->input();
        $userid = $data['userid'];
        $RoleModel = new Role();
        $roleinfo = $RoleModel->selectRoleAll();
        return view("admin.role.allotrole",['data'=>$roleinfo,'userid'=>$userid]);
    }

    //管理员角色添加
    public function addUserRole(Request $request)
    {
        $data = $request->input();
        $UserroleModel = new Userrole();
        $res = $UserroleModel->addUserRole($data);
        if ($res){
            return 'ok';
        }else{
            return 'no';
        }
    }
}