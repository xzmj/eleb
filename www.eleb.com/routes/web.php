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
//商家列表接口
Route::get('/api/businessList','ApiController@businessList');
//指定商户信息
Route::get('/api/business','ApiController@business');
//注册接口
Route::post('/api/regist','ApiController@regist');

//登录接口
Route::post('/api/loginCheck','ApiController@loginCheck');
//短信验证码
Route::get('/api/sms','ApiController@sms');
//地址接口列表
Route::get('/api/addressList','ApiController@addressList');
//保存添加地址接口列表
Route::post('/api/addAddress','ApiController@addAddress');
//指定地址接口
Route::get('/api/address','ApiController@address');
//保存修改后地址接口
Route::post('api/editAddress','ApiController@editAddress');
//结算按钮路由
Route::post('api/addCart','ApiController@addCart');
//购物车路由
Route::get('api/cart','ApiController@cart');
//添加订单路由
Route::post('api/addorder','ApiController@addorder');
//修改密码
Route::post('/api/changePassword','ApiController@changePassword');
//忘记密码  重置
Route::post('/api/forgetPassword','ApiController@forgetPassword');
//订单页面
Route::get('/api/order','ApiController@order');
