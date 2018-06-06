<?php
Route::group(['middleware' => ['web']], function () {
	
    Route::get('/demo','Home\IndexController@demo');
    Route::get('/demo2','Home\IndexController@demo2');
	
	
    Route::get('/','Home\IndexController@index');
	
    
    Route::any('admin/login','Admin\LoginController@login');
    Route::get('admin/code','Admin\LoginController@code');
});


Route::group(['prefix' => 'product','namespace' => 'Home\Product'],function(){
	Route::get('/','IndexController@index');
	
	
	Route::get('/{cate_name}','IndexController@cat');
	Route::get('/pro','IndexController@pro');
});


Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware'=>['web','admin.login']],function(){
	Route::get('/', 'IndexController@index');
	Route::get('info', 'IndexController@info');
	
	Route::get('quit', 'LoginController@quit');
	Route::any('pass', 'IndexController@pass');
	
	Route::post('cate/changeorder', 'CategoryController@changeOrder');
	Route::resource('category', 'CategoryController');
	
	Route::resource('article', 'ArticleController');
	
	Route::post('links/changeorder', 'LinksController@changeOrder');
	Route::resource('links', 'LinksController');
	
	
	
	Route::post('navs/changeorder', 'NavsController@changeOrder');
	Route::resource('navs','NavsController');
	
	Route::get('config/putfile', 'ConfigController@putFile');
	Route::post('config/changecontent','ConfigController@changeContent');
	Route::post('config/changeorder','ConfigController@changeOrder');
	Route::resource('config', 'ConfigController');
	
	Route::any('upload', 'CommonController@upload');
});