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

////Route::resource('users', 'UsersController');
//Route::get('/users', 'UsersController@index')->name('users.index');//用户列表
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');//查看单个用户信息
//Route::get('/users/create', 'UsersController@create')->name('users.create');//显示添加表单
//Route::post('/users', 'UsersController@store')->name('users.store');//接收添加表单数据
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');//修改用户表单
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');//更新用户信息
//Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');//删除用户信息
// 商家分类路由
//Route::resource('shop_category', 'ShopCategoryController');
//Route::resource('shop', 'ShopController');
//////审核路由
//Route::get('/shop/{shop}/start','ShopController@start')->name('shop.start');
//Route::get('shop/{shop}/down','ShopController@down')->name('shop.down');



//商家账号修改密码路由
Route::get('user/pwd','UserController@pwd')->name('user.pwd');
Route::patch('user/savepwd','UserController@savepwd')->name('user.savepwd');
//商户账号路由
Route::resource('user', 'UserController');


//登录和注销
Route::get('login','LoginController@create')->name('login');
Route::post('login','LoginController@store')->name('login');
Route::get('logout','LoginController@destroy')->name('logout');
Route::get('menu/showgoods/{menu_category}','MenuController@showgoods')->name('showgoods.category');
//商户账号修改密码
Route::get('user/pwd','UserController@pwd')->name('user.pwd');
Route::patch('user/savepwd','UserController@savepwd')->name('user.savepwd');
//菜品分类路由
Route::resource('menu_category', 'MenuCategoryController');
//菜谱路由
Route::resource('menu', 'MenuController');

//活动路由
Route::resource('activity', 'ActivityController');


//查看菜品分类下的菜品
