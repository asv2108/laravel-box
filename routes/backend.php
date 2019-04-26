<?php

Route::get('/', 'Backend\HomeController@index')->name('home');

Auth::routes();

Route::group(
    [
        'prefix' => 'backend',
        'as' => 'backend.',
        'namespace' => 'Backend',
        'middleware' => ['auth'],
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('users', 'UsersController');
    }
);