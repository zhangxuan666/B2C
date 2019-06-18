<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/10
 * Time: 17:16
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;

//use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //后台登陆
    public function Login(Request $request)
    {
        if($request->isMethod("post")){
            $data = $request->all();
            //查询管理员表是否有本管理员
            $UserModel = new User();
            $res = $UserModel->selectUser($data);
            if($res){
                 //将后台管理员登陆的信息存储到session
                $info=$res->toArray();
                $userid=$info['user_id'];
                $username=$info['user_name'];
                $request->session()->put('userid',$userid);
                $request->session()->put('username',$username);

                echo ("<script>alert('登陆成功'); location='/index/index'</script>  ");
            }else{
                echo ("<script>alert('用户名或密码不正确！'); location='/login/login'</script>  ");
            }
        }else{
            return view("admin.login.login");
        }
    }

    //退出登录
    public function loginOut(Request $request)
    {
        $request->session()->flush();
        echo ("<script>alert('退出成功'); location='/login/login'</script>  ");
    }
}