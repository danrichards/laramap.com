<?php

Route::apiResource('users', 'Api\Users\UserController');
Route::apiResource('notifications', 'Api\Users\NotificationController');
Route::post('notifications/clear', 'Api\Users\NotificationController@destroy');
