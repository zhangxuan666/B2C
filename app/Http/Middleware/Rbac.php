<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Models\Userrole;
use App\Http\Models\Rolenode;
use App\Http\Models\Node;
use App\Http\Models\User;

class Rbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userid = $request->session()->get("userid");
        //查询是否是admin管理员  是的话 不用验证权限
        $User = new User();
        $userinfo = $User->selectUserid($userid);
//        var_dump($userinfo);die;
        $userinfo = $userinfo->toArray();
        $username = $userinfo['user_name'];
//        var_dump($username);die;
         if($username=='admin'){
             return $next($request);
         }

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

//        $nodename[]="/index/index";
//        var_dump($nodename);
//        echo "<pre>";
        //获取的整个地址路由   例子: App\Http\Controllers\admin\indexController@index
        $controlleraction = \Route::current()->getActionName();
        $controlleraction= substr($controlleraction,27);
        $controlleraction = strtolower($controlleraction);

//        var_dump( $controlleraction);die;

            if (!in_array($controlleraction, $nodename) ){
                if($request->ajax()){
                    return response()->json([
                        'name' => 'error',
                        'state' => 'out',
                    ]);

                }else{

                    echo ("<script>alert('没权限！');location='/index/index'</script>");die;
                }
            }








//            $controlleraction = $request->route()->getAction();
        #获取路由类和方法名
//            $controlleraction=$request->route()->getActionName();
//        var_dump( $controlleraction);die;

        return $next($request);
    }
}
