<?php

use Illuminate\Support\Facades\Route;

//User Route

Route::group(['namespace' => 'User'], function()
{

	Route::get('/', 'HomeController@index');
	Route::get('post/{post?}', 'PostController@post')->name('post');
	Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
	Route::get('post/tag/{category}', 'HomeController@category')->name('category');
});

//Admin Route
Route::group(['namespace' =>'Admin'], function()
{
	Route::get('admin/home', 'HomeController@index')->name('admin.home');
	//superuser routes
	Route::resource('admin/user', 'UserController');
	//Roles routes
	Route::resource('admin/role', 'RoleController');
	//Permission openssl_random_pseudo_bytes(length)
	Route::resource('admin/permission', 'PermissionController');
	//post routes
	Route::resource('admin/post', 'PostController');
	//tag routes
	Route::resource('admin/tag', 'TagController');
	//Category routes
	Route::resource('admin/category', 'CategoryController');
	//Admin auth route
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');

	Route::post('admin-login', 'Auth\LoginController@login');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
