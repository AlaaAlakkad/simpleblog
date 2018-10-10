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
Route::get('blog/{slug}','BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('blog', 'BlogController@getIndex')->name('blog.index');
Route::get('/', ['uses'=>'PagesController@getIndex', 'as'=>'index']);
Route::get('about', 'PagesController@getAbout')->name('about');
Route::get('contact', ['uses'=>'PagesController@getContact', 'as'=>'contact.get']);
Route::post('contact', 'PagesController@postContact')->name('contact.post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');


//categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

//comments
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit', 'CommentsController@edit')->name('comments.edit');
Route::put('comments/{id}', 'CommentsController@update')->name('comments.update');
Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');

// test for json responses
Route::get('test', function(){
    return ['user1', 'user2', 'user3', 'user4'];
});


