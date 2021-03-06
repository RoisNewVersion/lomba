<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('test', function () {
    return view('layout.contoh');
});

Route::group(['middleware'=>['auth']], function() {
    //

	Route::get('/', ['uses'=>'HomeCtrl@index', 'as'=>'home']);
	Route::get('home', ['uses'=>'HomeCtrl@index', 'as'=>'home']);
	// Auth::routes();
	Route::get('logout', ['uses'=>'AuthCtrl@logout', 'as'=>'logout']);

	// Route::group(['middleware'=>'acl', 'is'=>'administrator'], function() {
	    // resource for rw
		Route::resource('rw', 'RwCtrl');
		// resource for rt
		Route::resource('rt', 'RtCtrl');
		// resource for lomba
		Route::resource('lomba', 'lombaCtrl');
		// resource for pendaftaran
		Route::resource('pendaftaran', 'pendaftaranCtrl');
		Route::get('ajax_pendaftaran', ['as'=>'ajax_pendaftaran', 'uses'=>'pendaftaranCtrl@ajax_pendaftaran']);
	// });
	
	// resource for peserta
	Route::resource('peserta', 'pesertaCtrl');
	Route::get('ajax_peserta', ['as'=>'ajax_peserta', 'uses'=>'pesertaCtrl@ajax_peserta']);
});
// Route::get('/home', 'HomeController@index');
// halaman login
Route::get('login', ['as'=>'login', 'uses'=>'AuthCtrl@getLogin']);
// post Login
Route::post('login', ['as'=>'postlogin', 'uses'=>'AuthCtrl@postLogin']);

Route::get('test', function() {
    return Auth::user()->id;
});