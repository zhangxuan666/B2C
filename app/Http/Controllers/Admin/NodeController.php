<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/13
 * Time: 11:21
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Node;
use App\Http\Models\Rolenode;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    //权限管理页面
    public function nodeMange()
    {
        $NodeModel = new Node();
        $data = $NodeModel->selectNode();
        $data = $data->toArray();
        $data1 = $this->getson($data);
        //查询权限
        $datainfo = $NodeModel->selectAll();

        return view("admin.node.nodemange",['data'=>$data1,'datainfo'=>$datainfo]);
    }

    //分配权限信息展示
    public function allotNode(Request $request)
    {
        $info = $request->input();
        $roleid = $info['roleid'];
        $NodeModel = new Node();
        $data = $NodeModel->selectNode();
        $data = $data->toArray();
        $data1 = $this->getson($data);
        return view("admin.node.allotnode",['data'=>$data1,'roleid'=>$roleid]);
    }

    //权限添加
    public function addNode(Request $request)
    {
        $data = $request->input();
        unset($data['_token']);
        $NodeModel = new Node();
        $res = $NodeModel->addNode($data);
        if ($res){
            echo ("<script>alert('添加成功！');location='/node/nodemange'</script>");
        }else{
            echo ("<script>alert('添加失败！');location='/node/nodemange'</script>");
        }


    }

    //角色权限添加
    public function addRoleNode(Request $request)
    {
        $data = $request->input();
        unset($data['_token']);
       $RoleModel = new Rolenode();
       $res = $RoleModel->addRoleNode($data);
        if ($res){
            echo ("<script>alert('添加成功！');location='/role/rolelist'</script>");
        }else{
            echo ("<script>alert('添加失败！');location='/role/rolelist'</script>");
        }

    }


    //权限层级展示
     public function getson($data){
         $res=[];
         foreach($data as $obj){
             if($obj['pid']==0){
                 $res[$obj['node_id']]=$obj;
             }else{
                 if(isset($res[$obj['pid']]) && $res[$obj['pid']]['node_id']==$obj['pid']){
                     $res[$obj['pid']]['item'][]=$obj;
                 }
             }
         }
         return $res;
     }
}