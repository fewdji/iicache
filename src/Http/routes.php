<?php

Route::group(['namespace'=>'Fewdji\Iicache\Http\Controllers', 'prefix' => config('iicache.image_path')], function() {
    Route::get('{path}/{preset}/{filename}','IicacheController@index');
});