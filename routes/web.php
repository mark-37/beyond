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

Route::get('/', 'PagesController@index');

// Route::get('/register', 'PagesController@register');

// Route::get('/login', 'PagesController@login');

Route::resource('/posts', 'PostsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/disp', function(){
	return "This is Disp";
});

Route::get('/myContent', 'PagesController@myContent');
Route::get('/myPlaylist', 'PagesController@myPlaylist');
Route::get('/trending', 'PagesController@trending');
Route::get('/about', 'PagesController@about');
Route::get('/settings', 'PagesController@settings');

Route::post('/uploadfile','uploadFileController@showUploadFile');


// Some Tests Below

Route::get('ajax',function(){
   return view('tests.message');
});

Route::post('/getRequest', function(){
	if(Request::ajax()){
		return "This is a returned text";
	}
});



// Route::post('/categories', array('as' => 'categories' , 'uses' => 'AjaxController@categories'));
Route::post('/categories', 'AjaxController@categories');

Route::post('/uploadVideo', 'uploadFileController@uploadNow');


// update settings

Route::post('/updateName', 'usersController@updateUserName');

Route::post('/updateEmail', 'usersController@updateEmail');

Route::post('/updatePassword', 'usersController@updatePassword');

Route::post('/updateIp', 'usersController@updateIp');


// populating Data

Route::get('/populateData', 'AjaxController@populate');

// fetching videos through url

Route::post('/connectToServer', 'AjaxController@populateHome');

// FTP Scripts

Route::get('/ftplogin', 'sampleController@ftpl');
Route::get('/getmyip', 'sampleController@ip');

Route::post('/deleteData', 'uploadFileController@deleteData');