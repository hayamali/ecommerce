<?php
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Config::set('auth.defaults', 'admin');
	Route::get('login', 'AuthAdmin@login');
	Route::post('login', 'AuthAdmin@dologin');
	Route::group(['middleware' => 'admin:admin'], function () {

		Route::resource('admin', 'AdminController');
		Route::resource('users', 'UserController');
		Route::resource('countries', 'CountriesController');

		Route::resource('cities', 'CitiesController');

		Route::resource('states', 'StatesController');
		Route::resource('departments', 'DepartmentsController');
		Route::resource('manufacturers', 'ManufacturersController');
		Route::resource('trademarks', 'TradeMarksController');
		Route::get('/', function () {
			return view('admin.home');
		});
		Route::get('settings', 'Settings@setting');
		Route::post('settings', 'Settings@setting_save');

		Route::any('logout', ' AuthAdmin@logout');
	});
	Route::get('lang/{lang}', function ($lang) {
		session()->has('lang') ? session()->forget('lang') : '';
		$lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
		return back();
	});

});