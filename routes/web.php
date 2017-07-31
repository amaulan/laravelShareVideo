<?php

//Router Admin Sobatdev v1

Route::group( [ 'middleware' => 'web' ], function(){
	Route::get('login',										'LoginController@showLogin');
	Route::post('login',										'LoginController@doLogin');
	Route::get('logout',										'LoginController@doLogout');


	Route::group( ['prefix' => 'admin/manage'], function(){

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

		Route::group( ['prefix' => 'level'], function(){
			Route::get('/',									'Admin\LevelController@index')->name('level');
			Route::get('/create',							'Admin\LevelController@create')->name('level.create');
			Route::post('/store',							'Admin\LevelController@store')->name('level.store');
			Route::get('/edit/{id}',						'Admin\LevelController@index')->name('level.edit');
			Route::post('/update/{id}',						'Admin\LevelController@update')->name('level.update');
			Route::get('/destroy/{id}',						'Admin\LevelController@destroy')->name('level.destroy');

		});

		Route::group( ['prefix' => 'course'], function(){
			Route::get('/',									'Admin\CourseController@index');
			Route::get('/me',								'Admin\CourseController@myCourse');
			Route::get('/all',								'Admin\CourseController@allCourse');
			Route::get('/create',							'Admin\CourseController@create');
			Route::post('/store',							'Admin\CourseController@store');

		});

		Route::group( ['prefix' => 'email'], function(){
			Route::get('/subscribe',						'Admin\EmailController@subscriberEmailList');

			Route::get('/compose',							'Admin\EmailController@compose');
			Route::get('/',									'Admin\EmailController@index');
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