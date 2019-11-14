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

Route::get('/','TopController@index');
Route::get('/index','TopController@index');

// 会員登録
Route::get('/register','RegisterController@index')->name('Register');
Route::get('/register/index','RegisterController@index');
Route::post('/register','RegisterController@index');
Route::post('/register/check','RegisterController@check');
Route::get('/register/confirm', 'RegisterController@confirm');
Route::get('/register/return', 'RegisterController@return')->name('RegisterReturn');
Route::get('/register/error', 'RegisterController@error')->name('RegisterError');
Route::get('/register/complete', 'RegisterController@complete')->name('RegisterComplete');
Route::post('/register/end', 'RegisterController@end')->name('RegisterEnd');
Route::post('/api/getdata', 'Api/GetdataController@index');

// ログイン・ログアウト
Route::get('/login/index', 'LoginController@index')->name('Login');
Route::post('/login/check', 'LoginController@check')->name('LoginCheck');
Route::get('/login/error', 'LoginController@error')->name('LoginError');
Route::get('/login/logout', 'LoginController@logout')->name('Loginout');

// お問い合わせ
Route::get('/contact', 'ContactController@index')->name('Contact');
Route::get('/contact/index', 'ContactController@index');
Route::post('/contact/index', 'ContactCo  ntroller@index');
Route::post('/contact/check', 'ContactController@check')->name('ContactCheck');
Route::get('/contact/confirm', 'ContactController@confirm')->name('ContactConfirm');
Route::get('/contact/return', 'ContactController@return')->name('ContactReturn');
Route::get('/contact/error', 'ContactController@error')->name('ContactError');
Route::post('/contact/end', 'ContactController@end')->name('ContactEnd');
Route::get('/contact/complete', 'ContactController@complete')->name('ContactComplete');

// スライダー表示
Route::get('/cms/slider', 'SliderController@index');
  
//// 管理側
// トップ
Route::get('/manage','Manage\TopController@index');
Route::get('/manage/index','Manage\TopController@index');

// 会員一括登録：CSVアップロード
Route::get('/manage/register','Manage\RegisterController@index');
Route::get('/manage/register/index','Manage\RegisterController@index');
Route::post('/manage/register/store', 'Manage\RegisterController@store');
Route::post('/manage/register/download', 'Manage\RegisterController@download');


// CMS：スライダー登録
Route::get('/manage/cms/slider/index', 'Manage\SliderController@index');
Route::get('/manage/cms/slider/input', 'Manage\SliderController@input');
Route::post('/manage/cms/slider/check', 'Manage\SliderController@check');
Route::post('/manage/cms/slider/end', 'Manage\SliderController@end');
Route::get('/manage/cms/slider/complete', 'Manage\SliderController@complete');
Route::get('/manage/cms/slider/error', 'Manage\SliderController@error');
Route::get('/manage/cms/slider/return', 'Manage\SliderController@return');
Route::get('/manage/cms/slider/confirm', 'Manage\SliderController@confirm');
Route::get('/manage/cms/slider/show', 'Manage\SliderController@show');

// CMS：スライダー登録
Route::get('/manage/cms/slider/show', 'Manage\SliderController@show');
Route::get('/manage/cms/slider/edit', 'Manage\SliderController@edit');
Route::get('/manage/cms/slider/edit_check', 'Manage\SliderController@edit_check');
Route::get('/manage/cms/slider/sort', 'Manage\SliderController@sort');
Route::post('/manage/cms/slider/sort_check', 'Manage\SliderController@sort_check');