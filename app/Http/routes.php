<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('admin.index');
});
//后台登录
Route::get('admin/login', 'Admin\LoginController@index');
Route::post('admin/doLogin', 'Admin\LoginController@doLogin');
Route::get('admin/logout', 'Admin\LoginController@doLogout');

// 后台路由群组 
Route::group(['prefix'=>'admin','namespace'=>'Admin'], function (){

	// 后台首页路由
	Route::get('index','IndexController@index');
    // 用户模块
    Route::get('user', 'UserController@index');
    // 搜索路由
    Route::get('user/index', 'UserController@index');
    // 用户删除
    Route::get('users', 'UserController@destroy');
	// 用户编辑
	Route::get('user/{id}/edit', 'UserController@edit');
	// 用户编辑后提交
	// Route::post('user','UserController@update');

	// Route::post('user/add', 'UserController@add');


	// 文章模块
	Route::resource('article','ArticleController');

	//图片列表页显示
	Route::get('particle','ArticleController@plist');
	//文章编辑页面
	//Route::get('article/wzbj','ArticleController');


	//栏目模块
	Route::resource('subject','SubjectController');

	//评论模块 
	Route::resource('comment','CommentController');

	//友情链接
	Route::resource('links','LinksController');
	


	// 网站配置
    Route::resource('config','ConfigController');
    // 修改路由
    Route::post('config/changecontent','ConfigController@changeContent');
	// 写入配置
    Route::get('putfile','ConfigController@putFile');


  //广告管理
	Route::resource('advert','AdvertisingController');
	

});


// 前台路由群组
Route::get('/home/index','Home\IndexController@index');
//前台列表页路由
Route::get('/cate/{id}','Home\IndexController@cate');
//前台详情页路由
Route::get('/a/{id}','Home\IndexController@article');


// 前台群组路由   @张彦写的
Route::group(['prefix'=>'home','namespace'=>'Home'], function (){

//详情
Route::get('datails','DatailsController@index');


});

