<?php


Route::get('/', function () {
    return view('login');
});

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');




Route::get('home', 'HomeController@index')->name('home');

