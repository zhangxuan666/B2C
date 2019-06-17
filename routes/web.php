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

