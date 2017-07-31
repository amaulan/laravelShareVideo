<?php

<<<<<<< Updated upstream
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

Route::get('/login', 'UserController@login');

Route::get('/admin', 'AdminController@index');
Route::post('/inlogin','UserController@inlogin');
Route::get('/inregister', 'UserController@inregister');
=======
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
			Route::get('/add',								'Admin\LevelController@add')->name('level.add');
			Route::get('/create',							'Admin\LevelController@create')->name('level.create');
			Route::post('/store',							'Admin\LevelController@store')->name('level.store');
			Route::get('/edit/{id}',						'Admin\LevelController@index')->name('level.edit');
			Route::post('/update/{id}',						'Admin\LevelController@update')->name('level.update');
			Route::get('/destroy/{id}',						'Admin\LevelController@destroy')->name('level.destroy');

		});

		Route::group( ['prefix' => 'course'], function(){
			Route::get('/',									'Admin\CourseController@index');
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
>>>>>>> Stashed changes
