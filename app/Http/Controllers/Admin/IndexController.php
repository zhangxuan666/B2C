<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Models\MenuModel;

class IndexController extends Controller
{
    public function Index()
    {
      
       $menu=new MenuModel();
       $list=$menu->getTree();

       $data=$menu->fl($list,$pid=0);

      
// echo "<pre>";
// var_dump($data);die;
       return view('index.index',['data'=>$data]);
    }
    
    public function Info()
    {
      return view('index.info');
      
    }
}
?>