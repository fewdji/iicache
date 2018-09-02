<?php

Route::group(['namespace'=>'Fewdji\IICache\Http\Controllers', 'prefix' => config('ii-cache.images_path')], function() {
    Route::get('{path}/{preset}/{filename}','IICacheController@cache');
});