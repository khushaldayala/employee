<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

	Route::group(['middleware'=>['has.permission','admin.permission']],
		function(){

	Route::get('/admin',function(){
		return view('/home');
	});
	Route::resource('/permission','PermissionController');
	Route::resource('/department','DepartmentController');
	Route::resource('/role','RoleController');
	Route::resource('/user','UserController');
	Route::resource('/leave','LeaveController');
	Route::get('/userleavelist','LeaveController@userleavelist')->name('userleavelist.list');
	Route::get('/leaves/{id}','LeaveController@leavestatus')->name('leaves.status');
	Route::get('/pendingleave/{id}','LeaveController@pendingleave')->name('pending.leave');
	Route::get('/updatestaus/{id}/status/{status}','LeaveController@updateleavestaus')->name('update.status');

});

});


// Route::group(['middleware'=>['admin.permission']],function(){

// Route::get('/admin',function(){
// 	return view('/home');
// });
// Route::resource('/department','DepartmentController');
// Route::resource('/role','RoleController');
// Route::resource('/user','UserController');
// Route::resource('/leave','LeaveController');


// });

