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

Route::get('/','FrontController@index')->name('front');
Route::post('/reservation','FrontController@reservation')->name('front.reservation');
Route::post('/contact','FrontController@contact')->name('front.contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin','middleware' => 'auth','namespace' => 'admin'],function(){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('slider','SliderController');
    Route::resource('category','CategoryController');
    Route::resource('item','ItemController');
    Route::get('reservation','ReservationController@index')->name('reservation.index');
    Route::put('reservation/{id}','ReservationController@confirm')->name('reservation.confirm');
    Route::delete('reservation/{id}','ReservationController@destroy')->name('reservation.destroy');
    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');
    
    Route::get('/setting','SettingController@index')->name('setting.index');
    Route::put('/setting/{id}/edit','SettingController@edit')->name('setting.edit');
    Route::put('/setting/logo','SettingController@logo')->name('setting.logo');
    Route::put('/setting/about','SettingController@about')->name('setting.about');


});