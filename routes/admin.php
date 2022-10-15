<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'BackEnd','middleware' => 'auth'], function () {
    Route::get('/', 'DashBoardController@index')->name('dashboard');

    Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
        Route::get('/index', 'SlidersController@index')->name('index');
        Route::post('/create', 'SlidersController@create')->name('create');
        Route::get('/detail/{id}', 'SlidersController@detail')->name('detail');
        Route::post('/update', 'SlidersController@update')->name('update');
        Route::delete('/delete/{id}', 'SlidersController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'topic', 'as' => 'topic.'], function () {
        Route::get('/index', 'TopicController@index')->name('index');
        Route::post('/create', 'TopicController@create')->name('create');
        Route::get('/detail/{id}', 'TopicController@detail')->name('detail');
        Route::post('/update', 'TopicController@update')->name('update');
        Route::delete('/delete/{id}', 'TopicController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/posts', 'PostController@index')->name('posts');
        Route::get('/create', 'PostController@create')->name('create');
        Route::post('/create', 'PostController@store')->name('store');
        Route::get('/edit/{id}', 'PostController@edit')->name('edit');
        Route::post('/update/{id}', 'PostController@update')->name('update');
        Route::delete('/delete/{id}', 'PostController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::get('/index', 'ContactController@index')->name('index');
    });
    Route::group(['prefix' => 'topic-document', 'as' => 'topic-document.'], function () {
        Route::get('/index', 'TopicDocumentController@index')->name('index');
        Route::post('/store', 'TopicDocumentController@store')->name('store');
        Route::get('/{id}/edit', 'TopicDocumentController@edit')->name('edit');
        Route::post('/{id}/update', 'TopicDocumentController@update')->name('update');
        Route::delete('/{id}/delete', 'TopicDocumentController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'post-child', 'as' => 'post-child.'], function () {
        Route::get('/index', 'PostChildDocumentController@index')->name('index');
        Route::get('/create', 'PostChildDocumentController@create')->name('create');
        Route::post('/store', 'PostChildDocumentController@store')->name('store');
        Route::get('/{id}/edit', 'PostChildDocumentController@edit')->name('edit');
        Route::post('/{id}/update', 'PostChildDocumentController@update')->name('update');
        Route::delete('/{id}/delete', 'PostChildDocumentController@destroy')->name('destroy');
    });
});
