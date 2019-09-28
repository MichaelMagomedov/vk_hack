<?php

Route::post('/client', '\\App\\Clients\\Controllers\\ClientController@create');
Route::get('/test/{id}', '\\App\\Test\\Controllers\\TestController@getById');
Route::post('/answer', '\\App\\Test\\Controllers\\AnswerController@save');
Route::get('/',function (){
    return view('welcome');
});
