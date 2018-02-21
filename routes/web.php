<?php

Route::get('/', 'HomeController@index');

Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/{advert}', 'AdvertController@show')->name('advert.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/edit/{advert?}', 'AdvertController@create')->name('advert.create');
    Route::post('/edit/{advert?}', 'AdvertController@store');

    Route::delete('/{advert}/delete', 'AdvertController@delete')->name('advert.delete');
});
