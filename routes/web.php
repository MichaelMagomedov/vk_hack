<?php

Route::post('/client', '\\App\\Clients\\Controllers\\ClientController@create');
Route::get('/test/{id}', '\\App\\Test\\Controllers\\TestController@getById');
