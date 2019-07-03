<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//登陆
Route::post('index/login',"Api\ApiController@login");
//注册
Route::any('index/reg','Api\ApiController@reg');
//订单展示
Route::get('index/order',"Api\ApiController@order")->middleware('token');
//订单添加
Route::post('index/orderadd',"Api\ApiController@orderAdd")->middleware('token');
//个人展示
Route::get('index/ourlist',"Api\ApiController@ourList")->middleware('token');
//个人修改
Route::post('index/ourupdate',"Api\ApiController@ourUpdate")->middleware('token');
//商品分类
Route::get('index/typelist',"Api\ApiController@typeList")->middleware('token');
//购物车展示
Route::get('index/shoplist',"Api\ApiController@shopList")->middleware('token');
//购物车添加
Route::get('index/shopadd',"Api\ApiController@shopAdd")->middleware('token');
//购物车删除
Route::get('index/shopdel',"Api\ApiController@shopDel")->middleware('token');
//购物车修改
Route::get('index/shopupdate',"Api\ApiController@shopUpdate")->middleware('token');
//收藏展示
Route::any('index/collectlist','Api\ApiController@collect')->middleware('token');
//收藏删除
Route::any('index/collectdel','Api\ApiController@collectDel')->middleware('token');
//收藏添加
Route::any('index/collectadd','Api\ApiController@collectadd')->middleware('token');
//轮播图展示
Route::any('index/carousel','Api\ApiController@carousel');
//商品展示
Route::get('index/goodslist',"Api\ApiController@goodsList");
Route::get('index/goods',"Api\ApiController@goods");