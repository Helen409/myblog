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
Route::group(['prefix'=>'/admin', 'namespace'=>'Admin','middleware'=>['auth']],
	function(){
	Route::get('/', 'DashboardController@dashboard')->name('admin.index');
	Route::resource('/category','CategoryController',['as'=>'admin']);
	Route::resource('/tag', 'TagController', ['as'=>'admin']);
	Route::resource('/article', 'ArticleController', ['as'=>'admin']);
	Route::resource('/comment', 'CommentController', ['as'=>'admin']);
	Route::resource('/page', 'PageController', ['as'=>'admin']);


});

Route::auth();
/*Route::get('/', function () {  return view('welcome');
});*/

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('contacts/send', 'MailController@send')->name('mailSend');
route::get('/{category_url}/{article_url}/{article}', 'Admin\ArticleController@show_my')->name('articleSingle');
route::get('/category/{category_id}', 'Admin\ArticleController@category_filter')->name('category_filter');
route::get('/tag/{tag_id}', 'Admin\ArticleController@tag_filter')->name('tag_filter');
route::get('/{page_name}','Admin\PageController@index')->name('page');

