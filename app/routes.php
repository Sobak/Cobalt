<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PostController@getList');
Route::get('install/', 'InstallController@getInstall');

/* Admin panel */
Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function() {
	Route::get('/', array('as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@getIndex'));

	Route::get('posts/', 'PostController@getManage');
	Route::get('post/new', 'PostController@getCreate');
	Route::post('post/new', 'PostController@postCreate');
	Route::get('post/edit/{id}', 'PostController@getEdit');
	Route::post('post/edit/{id}', 'PostController@postEdit');
	Route::get('post/delete/{id}', 'PostController@getDelete');
});

/* Posts module */
Route::get('post/{slug}', 'PostController@getShow');

/* User module */
Route::group(array('prefix' => 'user'), function() {
	Route::get('login', array('as' => 'user.login', 'uses' => 'UserController@getLogin'));
	Route::post('login', 'UserController@postLogin');
	Route::get('register', 'UserController@getRegister');
	Route::post('register', 'UserController@postRegister');
	Route::get('logout', 'UserController@getLogout');
});
