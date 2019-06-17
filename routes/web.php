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

//首页
Route::get('/admin/index','Admin\IndexController@index');


//订单总计
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
