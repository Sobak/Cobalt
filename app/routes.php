<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PostController@getList');
Route::get('install/', 'InstallController@getInstall');

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
