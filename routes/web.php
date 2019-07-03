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
//后台
Route::get('hou','Admin\LoginController@login');
//前台
Route::get('','Home\IndexController@index');


//张轩
Route::get('/goods/index','Admin\GoodsController@index')->middleware("login");
Route::get('/goods/info','Admin\GoodsController@info')->middleware("login");
Route::get('/goods/product_list','Admin\GoodsController@product_list')->middleware("login");
Route::get('/goods/add_product','Admin\GoodsController@add_product')->middleware("login");
Route::get('/goods/cate_1','Admin\GoodsController@cate_1')->middleware("login");
Route::get('/goods/brand_add','Admin\GoodsController@brand_add')->middleware("login");
Route::get('/goods/cateedit_2','Admin\GoodsController@cateedit_2')->middleware("login");
Route::post('/goods/brand_add_do','Admin\GoodsController@brand_add_do')->middleware("login");
Route::post('/goods/brand_del','Admin\GoodsController@brand_del')->middleware("login");
Route::get('/goods/cateedit_1','Admin\GoodsController@cateedit_1')->middleware("login");
Route::post('/goods/type_add','Admin\GoodsController@type_add')->middleware("login");
Route::post('/goods/add_Type_Attribute','Admin\GoodsController@add_Type_Attribute')->middleware("login");
Route::post('/goods/add_sku','Admin\GoodsController@add_sku')->middleware("login");

//任鑫乐
Route::any('/active/one','Admin\ActiveController@one')->middleware("login");
Route::any('/active/oneadd','Admin\ActiveController@oneadd')->middleware("login");
Route::any('/active/add','Admin\ActiveController@add')->middleware("login");
Route::any('/active/oneupdate','Admin\ActiveController@oneupdate')->middleware("login");
Route::any('/active/update','Admin\ActiveController@update')->middleware("login");
Route::any('/active/onedelete','Admin\ActiveController@onedelete')->middleware("login");
Route::any('/active/search','Admin\ActiveController@search')->middleware("login");
//客服中心的路由
Route::any('/service/list','Admin\ServiceController@list')->middleware("login");
Route::any('/service/show','Admin\ServiceController@show')->middleware("login");
Route::any('/service/update','Admin\ServiceController@update')->middleware("login");
Route::any('/service/ask','Admin\ServiceController@ask')->middleware("login");
Route::any('/service/add','Admin\ServiceController@add')->middleware("login");
Route::any('/service/userask','Admin\ServiceController@userask')->middleware("login");
Route::any('/service/test','Admin\ServiceController@test')->middleware("login");
 

// 陈鹏飞
//菜单管理

Route::get('/menu/list','Admin\MenuController@menuList')->middleware("login");
Route::get('/menu/add','Admin\MenuController@menuAdd')->middleware("login");
Route::Any('/menu/doadd','Admin\MenuController@doAdd')->middleware("login");
Route::get('/menu/del','Admin\MenuController@menuDel')->middleware("login");

Route::get('/menu/update','Admin\MenuController@menuUpdate')->middleware("login");
Route::Any('/menu/doupdate','Admin\MenuController@doUpdate')->middleware("login");
Route::Any('/menu/zuoupdate','Admin\MenuController@zuoUpdate')->middleware("login");

Route::get('/menu/submenu','Admin\MenuController@submenu')->middleware("login");

//商品管理
Route::get('/goods/list','Admin\GoodsController@goodsList')->middleware("login");
Route::get('/goods/del','Admin\GoodsController@goodsDel')->middleware("login");
Route::any('/goods/add','Admin\GoodsController@goodsAdd')->middleware("login");
Route::any('/goods/doadd','Admin\GoodsController@doAdd')->middleware("login");
Route::any('/goods/update','Admin\GoodsController@update')->middleware("login");
Route::any('/goods/doupdate','Admin\GoodsController@doupdate')->middleware("login");


//闫郑宇

//订单总览
Route::get('/orders/orders','Admin\OrdersController@orders')->middleware("login");
//订单详情
Route::get('/orders/ordersxq','Admin\OrdersController@ordersxq')->middleware("login");
//订单处理
Route::get('/orders/deal','Admin\OrdersController@deal')->middleware("login");
//订单删除
Route::get('/orders/del','Admin\OrdersController@del')->middleware("login");
//订单编辑页面
Route::get('/orders/update','Admin\OrdersController@update')->middleware("login");
//订单编辑修改
Route::post('/orders/update_do','Admin\OrdersController@update_do')->middleware("login");
//订单状态列表
Route::get('/orders/status','Admin\OrdersController@status')->middleware("login");
//订单状态删除
Route::get('/orders/status_del','Admin\OrdersController@status_del')->middleware("login");
//订单状态添加
Route::get('/orders/status_add','Admin\OrdersController@status_add')->middleware("login");

// 仓库管理
Route::get('/warehouse/list','Admin\WarehouseController@list')->middleware("login");
//仓库添加
Route::get('/warehouse/add','Admin\WarehouseController@add')->middleware("login");
//仓库添加入库
Route::post('/warehouse/add_do','Admin\WarehouseController@add_do')->middleware("login");
//仓库删除
Route::get('/warehouse/del','Admin\WarehouseController@del')->middleware("login");
//仓库编辑页面
Route::get('/warehouse/update','Admin\WarehouseController@update')->middleware("login");

//仓库编辑修改

Route::post('/warehouse/update_do','Admin\WarehouseController@update_do')->middleware("login");


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

// -----------------------------------------------------------------------------------------------------------


// 前台

Route::any('/home/index','Home\IndexController@index');
Route::any('/home/sell','Home\IndexController@sell');
Route::any('/home/brand','Home\IndexController@brand');
Route::any('/home/brandlist','Home\IndexController@brandlist');
Route::any('/home/buycar','Home\IndexController@buycar');
Route::any('/home/buycar_three','Home\IndexController@buycar_three');
Route::any('/home/buycar_two','Home\IndexController@buycar_two');
Route::any('/home/login','Home\IndexController@login');
Route::any('/home/product','Home\IndexController@product');
Route::any('/home/addgou','Home\IndexController@addgouwuche');

Route::any('/home/category','Home\IndexController@category');
Route::any('/home/member','Home\IndexController@member');
Route::any('/home/member_address','Home\IndexController@member_address');
Route::any('/home/member_cash','Home\IndexController@member_cash');
Route::any('/home/member_collect','Home\IndexController@member_collect');
Route::any('/home/member_commission','Home\IndexController@member_commission');
Route::any('/home/member_links','Home\IndexController@member_links');
Route::any('/home/member_member','Home\IndexController@member_member');
Route::any('/home/member_member_list','Home\IndexController@member_member_list');
Route::any('/home/member_money','Home\IndexController@member_money');
Route::any('/home/member_money_charge','Home\IndexController@member_money_charge');
Route::any('/home/member_money_pay','Home\IndexController@member_money_pay');
Route::any('/home/member_order','Home\IndexController@member_order');
Route::any('/home/member_packet','Home\IndexController@member_packet');
Route::any('/home/member_results','Home\IndexController@member_results');
Route::any('/home/member_safe','Home\IndexController@member_safe');
Route::any('/home/member_user','Home\IndexController@member_user');
Route::any('/home/regist','Home\IndexController@regist');
Route::any('/home/selldetails','Home\IndexController@selldetails');





