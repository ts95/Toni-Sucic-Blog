<?php

/*
|---------------------------------------------------------------------------
| General Routes
|---------------------------------------------------------------------------
*/

Route::get('/about', function() {
	return View::make('about');
});

/*
|---------------------------------------------------------------------------
| BlogController Routes
|---------------------------------------------------------------------------
*/

Route::get('/', [
	'as'	=> 'blog.posts',
	'uses'	=> 'BlogController@posts',
]);

Route::get('/blog/view/{slug}', [
	'as'	=> 'blog.view',
	'uses'	=> 'BlogController@view',
]);

Route::group(['before' => 'auth'], function() {
	Route::any('/blog/auth/create', [
		'as'		=> 'blog.auth.create',
		'uses'		=> 'BlogController@create',
	]);

	Route::any('/blog/auth/edit/{id}', [
		'as'		=> 'blog.auth.edit',
		'uses'		=> 'BlogController@edit',
	]);

	Route::get('/blog/auth/delete/{id}', [
		'as'		=> 'blog.posts',
		'uses'		=> 'BlogController@delete',
	]);
});

/*
|---------------------------------------------------------------------------
| AuthController Routes
|---------------------------------------------------------------------------
*/

Route::any('/auth/login', [
	'as'	=> 'auth.login',
	'uses'	=> 'AuthController@login',
]);

Route::get('/auth/logout', [
	'as'	=> 'auth.logout',
	'uses'	=> 'AuthController@logout',
]);

Route::any('/auth/register', [
	'as'	=> 'auth.register',
	'uses'	=> 'AuthController@register',
]);
