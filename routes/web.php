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

//ログイン前トップの検索画面のルート
Route::get('/','TabiController@searchIndex');
Route::get('/result', 'TabiController@search');

//ログイン後の検索画面のルート
Route::get('/admin/news', 'AdminController@adminSearchIndex');
Route::get('/admin/news/result', 'AdminController@adminSearch');

/*使わない*/
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
/**/
//3/14以下をコメントアウト。tabiコントローラーにはadminindexはない。
/*Route::group(['prefix' => 'admin'], function() {
    Route::get('index', 'TabiController@adminIndex')->middleware('auth');
});*/
//メール認証付き会員登録
Route::post('register/pre_check', 'Auth\RegisterController@pre_check')->name('register.pre_check');
Route::get('register/verify/{token}', 'Auth\RegisterController@showForm');
Route::post('register/main_check', 'Auth\RegisterController@mainCheck')->name('register.main.check');
Route::post('register/main_register', 'Auth\RegisterController@mainRegister')->name('register.main.registered');

//会員情報修正、退会
Route::get('admin/news/mydata', 'AdminController@showMydata');
Route::get('admin/news/delete_conformation', 'AdminController@deleteConform');
Route::get('admin/news/delete_completed', 'AdminController@delete');
Route::get('admin/news/delete', 'AdminController@delete')->middleware('auth');
Route::get('admin/news/change_mail', 'AdminController@showChangeMail');
Route::post('admin/change_mail', 'AdminController@changeMail');
Route::get('admin/passwordReset', 'AdminController@passwordReset');
Route::post('/admin/password/update', 'AdminController@passwordUpdate');


//お問い合わせ
Route::get('contact', 'ContactsController@index');
Route::post('contact/confirm', 'ContactsController@confirm');
Route::post('contact/complete', 'ContactsController@complete');


Route::post('/browsinghistoriy/create', 'BrownsingHistoryController@create')->middleware('auth');
// Route::get('/browsinghistoriy', 'BrownsingHistoryController@index')->middleware('auth');


/*スクレイピングテスト
Route::get('/test',"TestsController@search");*/
