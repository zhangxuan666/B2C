<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/13
 * Time: 19:40
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Symfony\Component\HttpFoundation\Session\Session;
//use Illuminate\Support\Facades\DB;
use App\Http\Model\Userrole;
use App\Http\Model\Rolenode;
use App\Http\Model\Node;

class RbacController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $userid = $request->session()->get("userid");
            $Userrole = new Userrole();
            //查询此管理员有什么样的角色
            $roleid = $Userrole->selectRole($userid);
            $roleiddata = $roleid->toArray();
            $roleids='';
            foreach ($roleiddata as $v){
                $roleids.=",".$v['role_id'];
            }
            $roleids = substr($roleids,1);
            $roleids = explode(",",$roleids);

             //查询角色都有什么样的管理权限
            $Rolenode = new Rolenode();
            $datanodeids = $Rolenode->selectNode($roleids);
            $nodeids='';
            foreach ($datanodeids as $v){
                $nodeids.=",".$v['node_id'];
            }
            $nodeids = substr($nodeids,1);
            $nodeids = explode(",",$nodeids);

            //去拿权限名称
            $NodeModel = new Node();
            $nodenames = $NodeModel->selectNodeName($nodeids);

            $nodename = [];
            foreach ($nodenames as $v)
            {
                $nodename[]=$v['node_name'];
            }
                var_dump($nodename);
                echo "<pre>";
               //获取的整个地址路由   例子: App\Http\Controllers\admin\indexController@index
               $controlleraction = \Route::current()->getActionName();
               $controlleraction= substr($controlleraction,27);


//            $controlleraction = $request->route()->getAction();
            #获取路由类和方法名
//            $controlleraction=$request->route()->getActionName();
               var_dump( $controlleraction);


            return $next($request);
        });

    }
}