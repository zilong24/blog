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
	// $data = \DB::table('stu')->paginate(10);
	// dd($data->items());
    //return view('welcome');
    
    return redirect('home/index/index');
});

//后台路由
Route::namespace('Admin')->prefix('admin')->group(function(){
	Route::get('/index','IndexController@index');

	//用户管理
	Route::get('/user/index','UserController@index');

	Route::get('/user/create','UserController@create');
	Route::post('/user/store','UserController@store');

	Route::get('/user/edit/{id}','UserController@edit');

	Route::post('/user/update/{id}','UserController@update');

	Route::get('/user/destroy/{id}/{token}','UserController@destroy');

	//分类管理
	Route::get('/cate/create','CatesController@create');

	Route::post('/cate/store','CatesController@store');

	Route::get('/cate/index','CatesController@index');

	Route::get('/cate/edit/{id}','CatesController@edit');

	Route::post('/cate/update/{id}','CatesController@update');

	Route::get('/cate/destroy/{id}','CatesController@destroy');

	//轮播图管理
	Route::get('/banner/create','BannerController@create');

	Route::post('/banner/store','BannerController@store');

	Route::get('/banner/index','BannerController@index');

	Route::get('/banner/edit/{id}','BannerController@edit');

	Route::post('/banner/update/{id}','BannerController@update');

	Route::get('/banner/destroy/{id}','BannerController@destroy');

	Route::post('/banner/active','BannerController@active');
	
	//标签云管理
	Route::get('/tagname/create','TagnameController@create');

	Route::post('/tagname/store','TagnameController@store');

	Route::get('/tagname/index','TagnameController@index');

	//文章管理
	Route::get('/article/create','ArticleController@create');

	Route::post('/article/store','ArticleController@store');

	Route::get('/article/index','ArticleController@index');

	Route::post('/article/show/{id}','ArticleController@show');


});
//========================================================================================================


Route::group(['namespace'=>'Home','prefix'=>'home'],function(){
	//前台首页
	Route::get('index/index','IndexController@index');
});
