<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//张轩
Route::get('/goods/index','Admin\GoodsController@index');
Route::get('/goods/info','Admin\GoodsController@info');
Route::get('/goods/product_list','Admin\GoodsController@product_list');
Route::get('/goods/add_product','Admin\GoodsController@add_product');
Route::get('/goods/cate_1','Admin\GoodsController@cate_1');
Route::get('/goods/brand_add','Admin\GoodsController@brand_add');
Route::get('/goods/cateedit_2','Admin\GoodsController@cateedit_2');
Route::post('/goods/brand_add_do','Admin\GoodsController@brand_add_do');
Route::post('/goods/brand_del','Admin\GoodsController@brand_del');
Route::get('/goods/cateedit_1','Admin\GoodsController@cateedit_1');
Route::post('/goods/type_add','Admin\GoodsController@type_add');
Route::post('/goods/add_Type_Attribute','Admin\GoodsController@add_Type_Attribute');
Route::post('/goods/add_sku','Admin\GoodsController@add_sku');

//任鑫乐
Route::any('/active/one','Admin\ActiveController@one');
Route::any('/active/oneadd','Admin\ActiveController@oneadd');
Route::any('/active/add','Admin\ActiveController@add');
Route::any('/active/oneupdate','Admin\ActiveController@oneupdate');
Route::any('/active/update','Admin\ActiveController@update');
Route::any('/active/onedelete','Admin\ActiveController@onedelete');
Route::any('/active/search','Admin\ActiveController@search');
//客服中心的路由
Route::any('/service/list','Admin\ServiceController@list');
Route::any('/service/show','Admin\ServiceController@show');
Route::any('/service/update','Admin\ServiceController@update');
Route::any('/service/ask','Admin\ServiceController@ask');
Route::any('/service/add','Admin\ServiceController@add');
Route::any('/service/userask','Admin\ServiceController@userask');
Route::any('/service/test','Admin\ServiceController@test');
 

// 陈鹏飞
//菜单管理

Route::get('/menu/list','Admin\MenuController@menuList');
Route::get('/menu/add','Admin\MenuController@menuAdd');
Route::Any('/menu/doadd','Admin\MenuController@doAdd');
Route::get('/menu/del','Admin\MenuController@menuDel');

Route::get('/menu/update','Admin\MenuController@menuUpdate');
Route::Any('/menu/doupdate','Admin\MenuController@doUpdate');
Route::Any('/menu/zuoupdate','Admin\MenuController@zuoUpdate');

Route::get('/menu/submenu','Admin\MenuController@submenu');

//商品管理
Route::get('/goods/list','Admin\GoodsController@goodsList');
Route::get('/goods/del','Admin\GoodsController@goodsDel');
Route::any('/goods/add','Admin\GoodsController@goodsAdd');
Route::any('/goods/doadd','Admin\GoodsController@doAdd');
Route::any('/goods/update','Admin\GoodsController@update');
Route::any('/goods/doupdate','Admin\GoodsController@doupdate');


//闫郑宇

//订单总览
Route::get('/orders/orders','Admin\OrdersController@orders');
//订单详情
Route::get('/orders/ordersxq','Admin\OrdersController@ordersxq');
//订单处理
Route::get('/orders/deal','Admin\OrdersController@deal');
//订单删除
Route::get('/orders/del','Admin\OrdersController@del');
//订单编辑页面
Route::get('/orders/update','Admin\OrdersController@update');
//订单编辑修改
Route::post('/orders/update_do','Admin\OrdersController@update_do');
//订单状态列表
Route::get('/orders/status','Admin\OrdersController@status');
//订单状态删除
Route::get('/orders/status_del','Admin\OrdersController@status_del');


// 仓库管理
Route::get('/warehouse/list','Admin\WarehouseController@list');
//仓库添加
Route::get('/warehouse/add','Admin\WarehouseController@add');
//仓库添加入库
Route::post('/warehouse/add_do','Admin\WarehouseController@add_do');
//仓库删除
Route::get('/warehouse/del','Admin\WarehouseController@del');
//仓库编辑页面
Route::get('/warehouse/update','Admin\WarehouseController@update');
//仓库编辑修改
Route::post('/warehouse/update_do','Admin\WarehouseController@update_do');


//苏帅兵
//后台模板首页
Route::any("index/index","admin\indexController@index")->middleware("login");
//后台登陆
Route::any("/login/login","admin\loginController@login");
//退出登陆
Route::any("login/loginOut","admin\loginController@loginOut");

//查询管理员数据信息
Route::any("admin/personinfo","admin\AdminController@personInfo");
//管理员列表
Route::any("admin/adminlist","admin\AdminController@adminList")->middleware("rbac");
//添加管理员
Route::post("admin/addadmin","admin\AdminController@addAdmin")->middleware("rbac");
//删除管理员
Route::get("admin/deleteadmin","admin\AdminController@deleteAdmin")->middleware("rbac");
//批删管理员
Route::get("admin/deleteadminall","admin\AdminController@deleteAdminAll")->middleware("rbac");

//角色管理
Route::any("role/rolelist","admin\RoleController@roleList")->middleware("rbac");
//添加角色
Route::post("role/addrole","admin\RoleController@addRole")->middleware("rbac");
//删除角色
Route::get("role/deleterole","admin\RoleController@deleteRole")->middleware("rbac");
//批量删除角色
Route::get("role/deleteroleall","admin\RoleController@deleteRoleAll")->middleware("rbac");
//分配角色
Route::any("role/allotrole","admin\RoleController@allotRole")->middleware("rbac");
//管理员角色添加
Route::get("role/adduserrole","admin\RoleController@addUserRole");


//权限管理页面
Route::any("node/nodemange","admin\NodeController@nodeMange")->middleware("rbac");
//分配权限页面
Route::any("node/allotnode","admin\NodeController@allotNode");
//权限添加
Route::post("node/addnode","admin\NodeController@addNode")->middleware("rbac");
//角色权限添加
Route::post("node/addrolenode","admin\NodeController@addRoleNode");



//rbac控制器
Route::any("rbac/construct","admin\RbacController@__construct");