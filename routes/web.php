<?php

// Initializing
Route::get('/', function () {
    return view('login');
});

// Login Route
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('user', 'Auth\LoginController@user')->name('user');
Route::post('updateuser', 'Auth\LoginController@updateuser')->name('updateuser');
Route::post('updatesetting', 'Auth\LoginController@updatesetting')->name('updatesetting');

// 
Route::get('home', 'HomeController@index')->name('home');
Route::get('home/getrasxodi', 'HomeController@getrasxodasJson');
Route::get('home/getprixodi', 'HomeController@getprixodiJson');

// Delete all data tables
Route::post('deletemonthlydata', 'HomeController@deleteMonthlyData')->name('deletemonthlydata');

Route::get('all', 'HomeController@getAllDataJson');

// Income routes
Route::resource('income', 'IncomesController');
Route::get('income/deleteAjax/{id}', 'IncomesController@deleteAjax')->name('income.deleteAjax');
Route::get('incomeprintpdf', 'IncomesController@printIncome')->name('income.printpdf');

// Outgo routes
Route::resource('outgo', 'OutgoController');
Route::get('outgo/deleteAjax/{id}', 'OutgoController@deleteAjax')->name('outgo.deleteAjax');
Route::get('outgoprintpdf', 'OutgoController@printpdf')->name('outgo.printpdf');

// Sotrudniki
Route::resource('sotrudniki', 'SotrudnikiController');
Route::get('sotrudniki/deleteAjax/{id}', 'SotrudnikiController@deleteAjax')->name('sotrudniki.deleteAjax');

// Dolgi
Route::resource('dolgi', 'DolgiController');

// Prsorochniye
Route::resource('prosrochniye', 'ProsrochnieController');

// Ramz
Route::resource('ramz', 'RamzController');

// Klenty
Route::resource('klienty', 'KlientyController');
Route::get('klienty/deleteAjax/{id}', 'KlientyController@deleteAjax')->name('klienty.deleteAjax');


// Partner
Route::resource('partner', 'PartnerController');
Route::get('partner/deleteAjax/{id}', 'PartnerController@deleteAjax')->name('partner.deleteAjax');

// Plan
Route::resource('plan', 'PlanController');
Route::get('plan/deleteAjax/{id}', 'PlanController@deleteAjax')->name('plan.deleteAjax');
