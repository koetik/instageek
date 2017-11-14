<?php

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



Auth::routes();

Route::group(['middleware' => ['auth']], function () {
	//home
	Route::get('/', 'HomeController@index')->name('home');

	//comment
	Route::post('/comment', 'CommentController@store')->name('comment.store');

	//like
	Route::post('/like', 'LikeController@store')->name('like.insert');
	Route::delete('/like/{uid}/{id}', 'LikeController@destroy')->name('like.destroy');
	
});

