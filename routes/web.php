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
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);
Route::get('contact', 'PagesController@getContact'); 
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex'); 
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Auth::routes();

Route::get('/home', 'HomeController@index');
