<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix'=>'admin', 'namespace'=>'Admin','middleware'=>['auth']],
	function(){
	Route::get('/', 'DashboardController@dashboard')->name('admin.index');
	Route::resource('/category','CategoryController',['as'=>'admin']);
	Route::resource('/tag', 'TagController', ['as'=>'admin']);
	Route::resource('/article', 'ArticleController', ['as'=>'admin']);

});

Route::auth();
/*Route::get('/', function () {  return view('welcome');
});*/

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'AboutController@index');
