<?php

Route::get('all', 'GooglemapController@index')
    ->name('googlemap.all');
Route::get('create', 'GooglemapController@create')
    ->name('googlemap.create');
Route::post('store', 'GooglemapController@store')
    ->name('googlemap.store');
Route::get('{id}/edit', 'GooglemapController@edit')
    ->name('googlemap.edit');
Route::put('update/{id}', 'GooglemapController@update')
    ->name('googlemap.update');
Route::delete('destroy/{id}', 'GooglemapController@destroy')
    ->name('googlemap.delete');
Route::get('/get/map-marker', 'GooglemapController@mapMarker');
Route::get('preview', 'GooglemapController@preview')
    ->name('googlemap.preview');
