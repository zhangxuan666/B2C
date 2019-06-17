<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	//首页
     public function index(){
     	return view('admin.index');
     }
}



?>