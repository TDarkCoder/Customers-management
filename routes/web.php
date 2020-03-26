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

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function(){
    return view('about');
});
Route::resource('customers', 'CustomerController');
Route::get('contacts', 'ContactFormController@create')->name('contact.create');
Route::post('contacts', 'ContactFormController@store')->name('contact.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
