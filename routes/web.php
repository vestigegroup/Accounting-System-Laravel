<?php


Route::get('/', function () {
    return view('login');
});

Route::get('user', 'UserController@index')->name('user');
Route::post('user/edit', 'UserController@edituser')->name('user.edit');

Route::get('/login', 'Auth\LoginController@showLoginForm');
// Route::any('login', 'Auth\LoginController@login')->name('login');
// Route::any('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('home', 'HomeController@index')->name('home');

Route::get('home/getrasxodi/{id}', 'HomeController@getrasxodasJson');

// Settings
Route::get('setting', 'SettingController@index')->name('setting');
Route::post('setting/addproject', 'SettingController@addProject')->name('setting.addproject');
Route::post('setting/editproject', 'SettingController@editProject')->name('setting.editProject');
Route::get('setting/delete/{id}', 'SettingController@deleteProject');

// Rasxod
Route::get('{project_id}/rasxodi', 'RasxodController@index')->name('rasxodi');
// Delete zarplati with ajax
Route::get('rasxodi/delete/{id}', 'RasxodController@deletezarplata')->name('rasxodi.deleterasxodi');
// Edit zarplata
Route::post('rasxodi/editzarplata', 'RasxodController@editzarplata')->name('rasxodi.editrasxodi');
// PDF save
Route::get('{project_id}/rasxodi/printzarplata', 'RasxodController@printzarplata')->name('rasxodi.printrasxodi');

// Zarplata
Route::get('{project_id}/rasxodi/zarplata', 'ZarplataController@index')->name('zarplatas');
// Add
Route::post('{project_id}/rasxodi/zarplata/addzarplata', 'ZarplataController@addzarplata')->name('zarplatas.addzarplata');
// Delete zarplati with ajax
Route::get('rasxodi/zarplata/delete/{id}', 'ZarplataController@deletezarplata')->name('zarplatas.deletezarplata');
// Edit zarplata
Route::post('rasxodi/zarplata/editzarplata', 'ZarplataController@editzarplata')->name('zarplatas.edit');
// PDF save
Route::get('{project_id}/rasxodi/zarplata/printzarplata', 'ZarplataController@printzarplata')->name('zarplatas.printzarplata');

// Materials
Route::get('{project_id}/rasxodi/materials', 'MaterialController@index')->name('materials');
// Add
Route::post('{project_id}/rasxodi/materials/addmaterial', 'MaterialController@addmaterial')->name('materials.addmaterials');
// Delete Materials with ajax
Route::get('rasxodi/materials/delete/{id}', 'MaterialController@deletematerial')->name('materials.deletematerials');
// Edit Materials
Route::post('rasxodi/materials/editmaterial', 'MaterialController@editmaterial')->name('materials.editmaterials');
// PDF save Materials
Route::get('{project_id}/rasxodi/materials/printmaterial', 'MaterialController@printmaterial')->name('materials.printmaterials');

// Transport
Route::get('{project_id}/rasxodi/transport', 'TransportController@index')->name('transport');
// Add
Route::post('{project_id}/rasxodi/transport/addtransport', 'TransportController@addtransport')->name('transports.addtransports');
// Delete transports with ajax
Route::get('rasxodi/transport/delete/{id}', 'TransportController@deletetransport')->name('transports.deletetransports');
// Edit transports
Route::post('rasxodi/transport/edittransport', 'TransportController@edittransport')->name('transports.edittransports');
// PDF save transports
Route::get('{project_id}/rasxodi/transports/printtransport', 'TransportController@printtransport')->name('transports.printtransports');

// Other rasxodi
Route::get('{project_id}/rasxodi/otherrasxodi', 'OtherRasxodiController@index')->name('otherrasxodi');
// Add Other rasxodi
Route::post('{project_id}/rasxodi/otherrasxodi/addotherrasxodi', 'OtherRasxodiController@addotherrasxodi')->name('otherrasxodis.addotherrasxodis');
// Delete Other rasxodi with ajax
Route::get('rasxodi/otherrasxodi/delete/{id}', 'OtherRasxodiController@deleteotherrasxodi')->name('otherrasxodis.deleteotherrasxodis');
// Edit Other rasxodi
Route::post('rasxodi/otherrasxodi/editotherrasxodi', 'OtherRasxodiController@editotherrasxodi')->name('otherrasxodis.editotherrasxodis');
// PDF save Other rasxodi
Route::get('{project_id}/rasxodi/otherrasxodis/printotherrasxodi', 'OtherRasxodiController@printotherrasxodi')->name('otherrasxodis.printotherrasxodis');



// Prixod
Route::get('prixodi', 'PrixodController@index')->name('prixodi');
// Delete zarplati with ajax
Route::get('prixodi/delete/{id}', 'PrixodController@deleteprixodi')->name('prixodi.deleteprixodi');
// Edit zarplata
Route::post('prixodi/editprixodi', 'PrixodController@editprixodi')->name('prixodi.editprixodi');
// PDF save
Route::get('prixodi/printprixodi', 'PrixodController@printprixodi')->name('prixodi.printprixodi');

// Bank
Route::get('prixodi/bank', 'BankPrixodController@index')->name('bankprixodi');
// Add
Route::post('prixodi/bank/addbankprixodi', 'BankPrixodController@addbankprixodi')->name('bankprixodi.addbankprixodi');
// PDF save transports
Route::get('prixodi/bank/printprixodi', 'BankPrixodController@printprixodi')->name('bank.printprixodi');

// Karz Prixodi
Route::get('prixodi/karz', 'KarzPrixodController@index')->name('karzprixodi');
// Add Prixodi
Route::post('prixodi/karz/addkarzprixodi', 'KarzPrixodController@addkarzprixodi')->name('karzprixodi.addkarzprixodi');
// PDF save Prixodi
Route::get('prixodi/karz/printprixodi', 'KarzPrixodController@printprixodi')->name('karzprixodi.printprixodi');

// Other Prixodi
Route::get('prixodi/otherprixodi', 'OtherPrixodController@index')->name('otherprixodi');
// Add Prixodi
Route::post('prixodi/otherprixodi/addotherprixodi', 'OtherPrixodController@addotherprixodi')->name('otherprixodi.addotherprixodi');
// PDF save Prixodi
Route::get('prixodi/otherprixodi/printprixodi', 'OtherPrixodController@printprixodi')->name('otherprixodi.printprixodi');
