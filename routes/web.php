<?php

// Initializing
Route::get('/', function () {
    return view('login');
});

// Login Route
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 
Route::get('home', 'HomeController@index')->name('home');

// Income routes
Route::resource('income', 'IncomesController');
Route::get('income/deleteAjax/{id}', 'IncomesController@deleteAjax')->name('income.deleteAjax');
Route::get('incomeprintpdf', 'IncomesController@printIncome')->name('income.printpdf');

// Outgo routes
Route::resource('outgo', 'OutgoController');
Route::get('outgo/deleteAjax/{id}', 'OutgoController@deleteAjax')->name('outgo.deleteAjax');

// Sotrudniki
Route::resource('sotrudniki', 'SotrudnikiController');
Route::get('sotrudniki/deleteAjax/{id}', 'SotrudnikiController@deleteAjax')->name('sotrudniki.deleteAjax');


