<?php

Route::group(['namespace' => 'Sagar\Usermaster\Http\Controllers', 'middleware' => ['web']], function () {
    Route::resource('usermaster', 'UsermasterController');
});
