<?php

Route::apiResource('users', 'Api\Users\UserController');
Route::apiResource('notifications', 'Api\Users\NotificationController');
Route::apiResource('countries', 'Api\Countries\CountryController');

Route::post('notifications/clear', 'Api\Users\NotificationController@destroy');

