<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Frontend\Http\Controllers'], function()
{
    Route::get('/', 'HomeController@index');
    Route::get('/login', 'LoginController@index')->name('login');
});
