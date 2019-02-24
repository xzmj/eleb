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
Route::resource('shop_category', 'ShopCategoryController');
Route::resource('shop', 'ShopController');


////商家审核路由
Route::get('/shop/{shop}/start','ShopController@start')->name('shop.start');
Route::get('shop/{shop}/down','ShopController@down')->name('shop.down');


//管理员修改密码
Route::get('admin/pwd','AdminController@pwd')->name('admin.pwd');
Route::patch('admin/savepwd','AdminController@savepwd')->name('admin.savepwd');


//管理员路由
Route::resource('admin', 'AdminController');


//商户账号路由
Route::resource('user', 'UserController');

////商家账号审核路由
Route::get('/user/{user}/start','UserController@start')->name('user.start');
Route::get('user/{user}/down','UserController@down')->name('user.down');



//登录和注销
Route::get('login','LoginController@create')->name('login');
Route::post('login','LoginController@store')->name('login');
Route::get('logout','LoginController@destroy')->name('logout');