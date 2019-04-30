<?php

Route::get('/', 'Backend\HomeController@index')->name('home');

Auth::routes();

Route::group(
    [
        'prefix' => 'backend',
        'as' => 'backend.',
        'namespace' => 'Backend',
        'middleware' => ['auth','can:admin-panel'],
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('users', 'UsersController');
    }
);