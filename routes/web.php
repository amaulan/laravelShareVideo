<?php

//Router Admin Sobatdev v1
Route::get('/dummy',							'Admin\AdminManageController@dummy');

Route::group( [ 'middleware' => 'web' ], function(){
	Route::get('login',										'LoginController@showLogin')->name('login');
	Route::post('login',									'LoginController@doLogin');
	Route::get('logout',									'LoginController@doLogout');


	Route::group( ['prefix' => 'admin/manage' , 'middleware' => 'auth'], function(){

		Route::get('/', 									'Admin\DashboardController@index');
		Route::get('/dashboard', 							'Admin\DashboardController@index');


		Route::group( ['prefix' => 'category'], function(){
			Route::get('/',									'Admin\CategoryController@index');
			Route::get('/create',							'Admin\CategoryController@create');
			Route::post('/created',							'Admin\CategoryController@created');
			Route::get('/update',							'Admin\CategoryController@update');
			Route::get('/edit',								'Admin\CategoryController@edit');
			Route::post('/edited',							'Admin\CategoryController@edited');
		});

		Route::group( ['prefix' => 'comment'], function(){
			Route::get('/',									'Admin\CommentManageController@index');
			Route::get('/create',							'Admin\CommentManageController@create');
			Route::get('/detail/{id}',						'Admin\CommentManageController@detail');
			Route::get('/edit',								'Admin\CommentManageController@edit');
			Route::get('/update',							'Admin\CommentManageController@update');
			Route::post('/edited',							'Admin\CommentManageController@edited');
		});

		Route::group( ['prefix' => 'admin'], function(){
			Route::get('/',									'Admin\AdminManageController@index')->name('admin');
			Route::get('/create',							'Admin\AdminManageController@create')->name('admin.create');
			Route::post('/store',							'Admin\AdminManageController@store');
			Route::post('/update/{id}',						'Admin\AdminManageController@update');
			Route::get('/edit/{id}',						'Admin\AdminManageController@edit');
			Route::get('/destroy/{id}',						'Admin\AdminManageController@destroy');
		});

		Route::group( ['prefix' => 'users'], function(){
			Route::get('/',									'Admin\UserManageController@index');
			Route::get('/detail/{id}',						'Admin\UserManageController@detail');
			Route::post('/store',							'Admin\UserManageController@store');
			Route::get('/update',							'Admin\UserManageController@update');
			Route::get('/edit',								'Admin\UserManageController@edit');
			Route::get('/destroy',							'Admin\UserManageController@destroy');
		});

		Route::group( ['prefix' => 'subscribe'], function(){
			Route::get('/',									'Admin\SubscribeManageController@index');
			Route::get('/detail/{id}',						'Admin\SubscribeManageController@detail');
			Route::post('/store',							'Admin\SubscribeManageController@store');
			Route::get('/update',							'Admin\SubscribeManageController@update');
			Route::get('/edit',								'Admin\SubscribeManageController@edit');
			Route::get('/destroy',							'Admin\SubscribeManageController@destroy');
		});

		Route::group( ['prefix' => 'level'], function(){
			Route::get('/',									'Admin\LevelController@index')->name('level');
			Route::get('/create',							'Admin\LevelController@create')->name('level.create');
			Route::post('/store',							'Admin\LevelController@store')->name('level.store');
			Route::get('/edit/{id}',						'Admin\LevelController@edit')->name('level.edit');
			Route::post('/update/{id}',						'Admin\LevelController@update')->name('level.update');
			Route::get('/destroy/{id}',						'Admin\LevelController@destroy')->name('level.destroy');

		});

		Route::group( ['prefix' => 'course'], function(){
			Route::get('/',									'Admin\CourseController@index');
			Route::get('/me',								'Admin\CourseController@myCourse');
			Route::get('/all',								'Admin\CourseController@allCourse');
			Route::get('/create',							'Admin\CourseController@create');
			Route::post('/store',							'Admin\CourseController@store');

			Route::group( ['prefix' => '{course_id}/playlist'], function(){
				Route::get('/',								'Admin\PlaylistController@index');
				Route::get('/create',						'Admin\PlaylistController@create');
				Route::post('/store-video',					'Admin\PlaylistController@storeVideo');
				Route::post('/store',						'Admin\PlaylistController@store');
				Route::get('/delete/{playlist_id}',					'Admin\PlaylistController@destroy');
			});

		});

		Route::group( ['prefix' => 'email'], function(){
			Route::get('/compose',							'Admin\EmailController@create');

			Route::post('/store',							'Admin\EmailController@store');
			Route::get('/',									'Admin\EmailController@index');
			
			Route::get('/subscriber',						'Admin\EmailController@subscriberList');
			Route::get('/feedback',							'Admin\EmailController@feedbackList');
		});

		Route::group( ['prefix' => 'comments'], function(){

		});

		Route::group( ['prefix' => 'user'], function(){
			Route::get('/',									'Admin\UserController@index');
		});

		Route::group( ['prefix' => 'about'], function(){

		});
	});
});