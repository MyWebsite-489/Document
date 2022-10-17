<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'FrontEnd'], function () {
    Route::get('/', 'HomePageController@index')->name('homePage.index');
    Route::get('/document/{id}', 'DocumentController@index')->name('document.index');
    Route::post('/lien-he', 'HomePageController@createContact')->name('homePage.createContact');

    Route::get('/tin-tuc', 'NewsListController@index')->name('newslist.index');
    Route::get('/tin-tuc/{alias}', 'NewsDetailController@index')->name('newsdetail.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
