<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@showMain')->name('welcome');

Route::get('post', 'PostController@index')->name('post.index'); // Hiển thị danh sách bài viết

Route::get('post/{id}/detail','PostController@show')->name('post.detail');
Route::post('post/{id}/detail','PostController@show')->name('post.detail'); //Hiển thị chi tiết 1 bài viết

Route::get('post/{category}', 'PostController@showCategory')->name('post.category');

// Route::get('/','PostController@showCategory', function () {
//     return view('templates.master');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cre-session', 'PostController@createSession');

Route::get('/get-session', 'PostController@getSession');