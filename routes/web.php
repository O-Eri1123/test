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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

Route::get('added', function(){
    return view('added');
});


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');
Route::get('/post_update/{id}','PostsController@post_update');
Route::post('/update','PostsController@update');
Route::get('/post_delete/{id}','PostsController@post_delete');
Route::post('/create','PostsController@create');


Route::post('/myupdate','UsersController@my_update');
Route::get('/my_update','UsersController@myprofile');
Route::get('/logout','UsersController@logout');


Route::get('/search','UsersController@user_search');
Route::post('/search','UsersController@user_search');
Route::get('/sloth/{id}','UsersController@create');
Route::get('/pc/{id}','UsersController@delete');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');
Route::get('/profile/{id}','UsersController@profile');

Route::get('/other_profile/{id}','OtherprofileController@other_profile');
Route::get('/follow/{id}','OtherprofileController@create');
Route::get('/un_follow/{id}','OtherprofileController@delete');
