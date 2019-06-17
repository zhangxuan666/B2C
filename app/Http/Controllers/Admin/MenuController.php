<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\MenuModel;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function menuList()
    {
    
    $menu=new MenuModel();

    $data=$menu->getAll();
    // echo "<pre>";
    // var_dump($data);die;

      return view('menu.list',compact('data'));
    }
    
    public function menuAdd()
    {
      
      $menu=new MenuModel();
      $list=$menu->getTree();
      $data=$menu->fl($list,$pid=0);

      return view('menu.add',['data'=>$data]);
    }

    public function doAdd(Request $request)
    {
        $data=$request->post();
         
         $this->Validator($data)->validate();

        $menu=new MenuModel();
        
        $res=$menu->addData($data);

        if($res)
        {
             return redirect('/menu/list');
        }

        return redirect('/menu/menuAdd');
    }

    public function menuDel(Request $request)
    {
       $id=$request['id'];

       $menu=new MenuModel();

       $res=$menu->getDel($id);

       if(!$res)
       {
          return response()->json(array('status' => 1,'msg' => '存在子菜单'));

       }

       return response()->json(array('status' => 2));

    }

    public function submenu(Request $request)
    {
        $id=$request->get('id');

        $menu=new MenuModel();

       $data=$menu->getSubmenuAll($id);

       return view('menu.submenu',compact('data'));
    }

    public function menuUpdate(Request $request)
    {
        $id=$request->get('id');

        $menu=new MenuModel();

        $res=$menu->getUpdate($id);

        if(!$res)
       {
          return response()->json(array('status' => 1,'msg' => '请先删除全部子菜单'));

       }

       return response()->json(array('status' => 2,'id'=>$res));
    }

    public function doUpdate(Request $request)
    {
        $id=$request->get('id');

        $menu=new MenuModel();

        $data=$menu->getUpdateAll($id);

        return view('menu.update',['data'=>$data]);
    }

    public function zuoUpdate(Request $request)
    {
         $data=$request->post();

        $menu=new MenuModel();

        $res=$menu->doUpdate($data);

        if($res)
        {
            return redirect('/menu/list');
        }

         return redirect('/menu/doUpdate');
    }
//添加验证规则
    protected function validator(array $data)
   {
     return Validator::make($data, [
        'menu_name' => 'required|regex:/\p{Han}/u',
         'url' => 'required',
         'is_show' => 'required',
       ]);

     
    }
}
?>